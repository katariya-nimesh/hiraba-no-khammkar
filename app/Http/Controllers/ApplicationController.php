<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationSearchRequest;
use App\Models\ApplicationInstallment;

use function Symfony\Component\Clock\now;

class ApplicationController extends Controller
{
    public function index(ApplicationSearchRequest $request)
    {
        $filters = $request->validatedData();

        $query = Application::query();

        // 🔍 Global search (all fields)
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('student_name', 'like', "%{$filters['search']}%")
                    ->orWhere('email', 'like', "%{$filters['search']}%")
                    ->orWhere('phone', 'like', "%{$filters['search']}%")
                    ->orWhere('village', 'like', "%{$filters['search']}%")
                    ->orWhere('district', 'like', "%{$filters['search']}%")
                    ->orWhere('state', 'like', "%{$filters['search']}%")
                    ->orWhere('pincode', 'like', "%{$filters['search']}%")
                    ->orWhere('student_aadhar', 'like', "%{$filters['search']}%");
                // add more searchable columns if needed
            });
        }

        // 📌 Status filter
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        // 📌 Installment payment filter - show records where selected installment is paid
        if (!empty($filters['installment_no'])) {
            $query->whereHas('installments', function ($q) use ($filters) {
                $q->where('installment_no', $filters['installment_no'])
                  ->where('is_paid', true);
            });
        }

        // 📅 Date range filter
        if (!empty($filters['from_date'])) {
            $query->whereDate('created_at', '>=', $filters['from_date']);
        }

        if (!empty($filters['to_date'])) {
            $query->whereDate('created_at', '<=', $filters['to_date']);
        }

        $applications =  $query->latest()->get();


        return view('admin.applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);

        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        if ($request->status) {
            $application->status = $request->status;
        }
        $application->remarks = $request->remarks;
        if (!empty($request->remarks)) {
            $application->remark_updated_at = now();
        }
        $application->save();
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function export($id) {}

    public function update(Request $request, ApplicationInstallment $installment)
    {
        $request->validate([
            'is_paid' => 'required|boolean',
            'note' => 'nullable|string|max:2000',
        ]);

        $data = [
            'is_paid' => $request->is_paid,
            'note' => $request->note,
        ];

        if ($request->is_paid && !$installment->paid_at) {
            $data['paid_at'] = now();
        }

        if (!$request->is_paid) {
            $data['paid_at'] = null;
        }

        $installment->update($data);

        return back()->with('success', 'Installment updated successfully.');
    }
}
