<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApplicationDocument;
use App\Http\Requests\ApplicationStoreRequest;
use App\Models\Cities;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublicApplicationController extends Controller
{
    // ─── Page: Home ───────────────────────────────────────────────────────────

    public function homePage()
    {
        return view('public.home-page');
    }

    // ─── Lifetime Form ────────────────────────────────────────────────────────

    public function createLifetime(Request $request)
    {
        $cities   = Cities::where('is_active', 1)->pluck('name');
        $formType = Application::FORM_TYPE_LIFETIME;
        $fee      = Application::PAYMENT_FEE_LIFETIME;
        $showForm = false;

        if ($request->agree == 1 || session()->has('showForm') || $request->session()->getOldInput()) {
            $showForm = true;
            session(['showForm' => true]);
        }

        return view('public.lifetime-application-form', compact('showForm', 'cities', 'formType', 'fee'));
    }

    public function storeLifetime(ApplicationStoreRequest $request)
    {
        return $this->processStore($request, Application::FORM_TYPE_LIFETIME);
    }

    // ─── One-Time Form ────────────────────────────────────────────────────────

    public function createOneTime(Request $request)
    {
        $cities   = Cities::where('is_active', 1)->pluck('name');
        $formType = Application::FORM_TYPE_ONE_TIME;
        $fee      = Application::PAYMENT_FEE_ONE_TIME;
        $showForm = false;

        if ($request->agree == 1 || session()->has('showForm') || $request->session()->getOldInput()) {
            $showForm = true;
            session(['showForm' => true]);
        }

        return view('public.onetime-application-form', compact('showForm', 'cities', 'formType', 'fee'));
    }

    public function storeOneTime(ApplicationStoreRequest $request)
    {
        return $this->processStore($request, Application::FORM_TYPE_ONE_TIME);
    }

    // ─── Payment Pending Page ─────────────────────────────────────────────────

    public function paymentPending(Request $request)
    {
        $referenceNo = $request->query('ref') ?: session('payment_reference_no');

        if (!$referenceNo) {
            return redirect()->route('public.application.homePage');
        }

        $application = Application::where('reference_no', $referenceNo)->first();

        if (!$application) {
            return redirect()->route('public.application.homePage')->with('error', 'Application not found.');
        }

        // If already paid, redirect to success screen directly
        if ($application->payment_status === Application::PAYMENT_PAID) {
            return redirect()->route('public.application.payment.success', ['ref' => $application->reference_no]);
        }

        $orderId = $application->payment_reference;

        // If we don't have a valid order ID yet, create one
        if (!$orderId || !str_starts_with($orderId, 'order_')) {
            try {
                $amountInPaise = intval($application->payment_amount * 100);
                
                $response = Http::withBasicAuth(
                    config('services.razorpay.key_id'),
                    config('services.razorpay.key_secret')
                )->post('https://api.razorpay.com/v1/orders', [
                    'amount'   => $amountInPaise,
                    'currency' => 'INR',
                    'receipt'  => $application->reference_no,
                ]);

                if ($response->successful()) {
                    $orderId = $response->json('id');
                    $application->update(['payment_reference' => $orderId]);
                } else {
                    Log::error('Razorpay order creation failed: ' . $response->body());
                    $orderId = null;
                }
            } catch (\Exception $e) {
                Log::error('Razorpay API exception: ' . $e->getMessage());
                $orderId = null;
            }
        }

        $paymentAmount = $application->payment_amount;
        $formType      = $application->form_type;

        return view('public.payment-pending', compact('application', 'referenceNo', 'paymentAmount', 'formType', 'orderId'));
    }

    public function paymentCallback(Request $request)
    {
        $razorpayPaymentId = $request->input('razorpay_payment_id');
        $razorpayOrderId   = $request->input('razorpay_order_id');
        $razorpaySignature = $request->input('razorpay_signature');
        $referenceNo       = $request->input('reference_no');

        if (!$razorpayPaymentId || !$razorpayOrderId || !$razorpaySignature || !$referenceNo) {
            return redirect()->route('public.application.homePage')->with('error', 'Invalid payment callback parameters.');
        }

        // Find the application
        $application = Application::where('reference_no', $referenceNo)
            ->where('payment_reference', $razorpayOrderId)
            ->first();

        if (!$application) {
            Log::error('Application not found for Razorpay Order ID: ' . $razorpayOrderId);
            return redirect()->route('public.application.homePage')->with('error', 'Application not found for this transaction.');
        }

        // Verify Signature
        $keySecret = config('services.razorpay.key_secret');
        $expectedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, $keySecret);

        if ($expectedSignature === $razorpaySignature) {
            // Payment verified successfully
            $application->update([
                'payment_status'    => Application::PAYMENT_PAID,
                'payment_reference' => $razorpayPaymentId, // update reference to actual payment ID
            ]);

            // Flash details to session for display
            session([
                'success_reference_no' => $application->reference_no,
                'success_amount'       => $application->payment_amount,
                'success_payment_id'   => $razorpayPaymentId,
                'success_form_type'    => $application->form_type,
            ]);

            return redirect()->route('public.application.payment.success', ['ref' => $application->reference_no]);
        } else {
            Log::error('Razorpay signature verification failed for application ' . $referenceNo);
            
            $application->update([
                'payment_status' => Application::PAYMENT_FAILED,
            ]);

            return redirect()->route('public.application.payment.pending', ['ref' => $referenceNo])
                ->with('error', 'Payment verification failed. If amount was deducted, please contact support.');
        }
    }

    public function paymentSuccess(Request $request)
    {
        // Try getting reference from session or query param
        $referenceNo = $request->query('ref') ?: session('success_reference_no');

        if (!$referenceNo) {
            return redirect()->route('public.application.homePage');
        }

        $application = Application::where('reference_no', $referenceNo)->first();

        if (!$application || $application->payment_status !== Application::PAYMENT_PAID) {
            return redirect()->route('public.application.homePage');
        }

        $paymentAmount = $application->payment_amount;
        $paymentId     = $application->payment_reference; // contains transaction ID now
        $formType      = $application->form_type;

        return view('public.payment-success', compact('application', 'referenceNo', 'paymentAmount', 'paymentId', 'formType'));
    }

    // ─── Shared Store Logic ───────────────────────────────────────────────────

    protected function processStore(ApplicationStoreRequest $request, string $formType)
    {
        $prefix     = $formType === Application::FORM_TYPE_LIFETIME ? 'LTM' : 'OTM';
        $fee        = Application::feeForType($formType);

        $application = Application::create([
            'reference_no'     => $prefix . '-' . strtoupper(Str::random(8)),
            'form_type'        => $formType,
            'payment_status'   => Application::PAYMENT_PENDING,
            'payment_amount'   => $fee,

            // Student Details
            'student_name'  => $request->student_name,
            'father_name'   => $request->father_name,
            'surname'       => $request->surname,
            'mother_name'   => $request->mother_name,

            // Aadhar Details
            'student_aadhar' => str_replace(' ', '', $request->student_aadhar),
            'father_aadhar'  => str_replace(' ', '', $request->father_aadhar),
            'mother_aadhar'  => str_replace(' ', '', $request->mother_aadhar),

            // Address Details
            'home_type' => $request->home_type,
            'address'   => $request->address,
            'village'   => $request->village,
            'district'  => $request->district,
            'state'     => $request->state,
            'pincode'   => $request->pincode,

            // Contact & Family Details
            'phone'                => $request->phone,
            'email'                => $request->email,
            'total_family_members' => $request->total_family_members,
            'parents_business'     => $request->business,
            'monthly_income'       => $request->income,
            'parents_illness'      => $request->illness,

            // School Info
            'school_name'    => $request->school_name,
            'standard'       => $request->standard,
            'school_phone'   => $request->school_phone,
            'school_address' => $request->school_address,
            'school_ac_name' => $request->school_account_holder_name,
            'school_ac_number' => $request->school_account_number,
            'school_ifsc'    => $request->school_ifsc,
            'school_bank_name' => $request->school_bank_name,

            'status' => 'pending',
        ]);

        // Store uploaded documents
        $docs = [
            'student_aadhar_doc',
            'father_aadhar_doc',
            'mother_aadhar_doc',
            'passport_photo',
            'school_letterhead',
            'electricity_bill',
            'death_certificate',
            'last_year_marksheet',
            'cancelled_cheque',
            'other_document',
        ];

        foreach ($docs as $doc) {
            if ($request->hasFile($doc)) {
                $path = $request->file($doc)
                    ->store("applications/{$application->id}", 'public');

                ApplicationDocument::create([
                    'application_id' => $application->id,
                    'type'           => $doc,
                    'file_path'      => $path,
                ]);
            }
        }

        session()->flush();

        // Store payment info in session for the payment-pending page
        session([
            'payment_reference_no' => $application->reference_no,
            'payment_amount'       => $fee,
            'payment_form_type'    => $formType,
        ]);

        return redirect()->route('public.application.payment.pending');
    }
}
