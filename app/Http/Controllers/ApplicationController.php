<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationSearchRequest;

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
                    ->orWhere('student_aadhar', 'like', "%{$filters['search']}%");
                // add more searchable columns if needed
            });
        }

        // 📌 Status filter
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
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
        if($request->status){
            $application->status = $request->status;
        }
        $application->remarks = $request->remarks;
        $application->save();
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function export($id)
    {
    }
}
