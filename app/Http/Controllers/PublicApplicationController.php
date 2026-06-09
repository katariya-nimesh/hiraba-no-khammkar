<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApplicationDocument;
use App\Http\Requests\ApplicationStoreRequest;
use App\Models\Cities;

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
        $referenceNo   = session('payment_reference_no');
        $paymentAmount = session('payment_amount');
        $formType      = session('payment_form_type');

        if (!$referenceNo) {
            return redirect()->route('public.application.homePage');
        }

        return view('public.payment-pending', compact('referenceNo', 'paymentAmount', 'formType'));
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
