<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\ApplicationsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationExportController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->only([
            'search',
            'status',
            'from_date',
            'to_date',
        ]);

        return Excel::download(
            new ApplicationsExport($filters),
            'applications_' . now()->format('Ymd_His') . '.xlsx'
        );
    }
}
