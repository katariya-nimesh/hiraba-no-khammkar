<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ApplicationsExport implements
    FromQuery,
    WithHeadings,
    WithMapping,
    WithChunkReading
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function query()
    {
        $query = Application::query();

        // 🔍 Global search
        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('student_aadhar', 'like', "%{$search}%");
            });
        }

        // Status
        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }

        // Date range
        if (!empty($this->filters['from_date'])) {
            $query->whereDate('created_at', '>=', $this->filters['from_date']);
        }

        if (!empty($this->filters['to_date'])) {
            $query->whereDate('created_at', '<=', $this->filters['to_date']);
        }

        return $query->latest();
    }

    public function headings(): array
    {
        return [
            'Reference No',
            'Status',

            'Student Name',
            'Father Name',
            'Surname',
            'Mother Name',
            'Student Aadhar',
            'Father Aadhar',
            'Mother Aadhar',

            'Home Type',
            'Address',
            'Village',
            'District',
            'State',

            'Phone',
            'Email',
            'Total Family Members',
            'Parent\'s Illness',
            'Parent\'s Business',
            'Monthly Income',

            'School Name',
            'Standard',
            'School Phone',
            'School Address',

            'Remarks',
            'Created Date',
        ];
    }

    public function map($application): array
    {
        return [
            $application->reference_no,
            ucfirst($application->status),

            $application->student_name,
            $application->father_name,
            $application->surname,
            $application->mother_name,
            $application->student_aadhar,
            $application->father_aadhar,
            $application->mother_aadhar,

            $application->home_type,
            $application->address,
            $application->village,
            $application->district,
            $application->state,

            $application->phone,
            $application->email,
            $application->total_family_members,
            $application->parents_illness,
            $application->parents_business,
            $application->monthly_income,

            $application->school_name,
            $application->standard,
            $application->school_phone,
            $application->school_address,

            $application->remarks,
            $application->created_at->format('d-m-Y'),
        ];
    }

    public function chunkSize(): int
    {
        return 500; // safe for large exports
    }
}
