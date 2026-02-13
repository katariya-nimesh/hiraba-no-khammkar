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
            'Pincode',

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
            'School Account Holder Name',
            'School Account Number',
            'School Bank IFSC',
            'School Bank Name',

            'Installment 1 Status',
            'Installment 1 Note',
            'Installment 1 Paid Date',

            'Installment 2 Status',
            'Installment 2 Note',
            'Installment 2 Paid Date',

            'Installment 3 Status',
            'Installment 3 Note',
            'Installment 3 Paid Date',

            'Remarks',
            'Created Date',
        ];
    }

    public function map($application): array
    {
        $inst1 = $application->installments->firstWhere('installment_no', 1);
        $inst2 = $application->installments->firstWhere('installment_no', 2);
        $inst3 = $application->installments->firstWhere('installment_no', 3);

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
            $application->pincode,

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
            $application->school_ac_name,
            $application->school_ac_number,
            $application->school_ifsc,
            $application->school_bank_name,

            // Installment 1
            $inst1?->is_paid ? 'Paid' : 'Pending',
            $inst1?->note,
            optional($inst1?->paid_at)->format('d-m-Y'),

            // Installment 2
            $inst2?->is_paid ? 'Paid' : 'Pending',
            $inst2?->note,
            optional($inst2?->paid_at)->format('d-m-Y'),

            // Installment 3
            $inst3?->is_paid ? 'Paid' : 'Pending',
            $inst3?->note,
            optional($inst3?->paid_at)->format('d-m-Y'),

            $application->remarks,
            $application->created_at->format('d-m-Y'),
        ];
    }

    public function chunkSize(): int
    {
        return 500; // safe for large exports
    }
}
