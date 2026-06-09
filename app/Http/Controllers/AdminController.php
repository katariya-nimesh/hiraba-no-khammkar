<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalApplications = Application::paid()->count();
        $pendingApplications = Application::paid()->where('status', 'pending')->count();
        $approvedApplications = Application::paid()->where('status', 'approved')->count();
        $rejectedApplications = Application::paid()->where('status', 'rejected')->count();

        return view('admin.dashboard', compact(
            'totalApplications',
            'pendingApplications',
            'approvedApplications',
            'rejectedApplications'
        ));
    }
}
