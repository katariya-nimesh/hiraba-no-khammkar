@extends('adminlte::page')

@section('title', 'Application Details')

@section('content_header')
    <h1>Application Details</h1>
@stop

@section('css')
    <style>
        /* Base */
        .status-select {
            font-weight: 600;
            color: #fff;
            border: none;
        }

        /* Status colors */
        .status-pending {
            background-color: #f0ad4e;
            /* yellow */
        }

        .status-approved {
            background-color: #28a745;
            /* green */
        }

        .status-rejected {
            background-color: #dc3545;
            /* red */
        }

        /* Fix arrow visibility */
        .status-select option {
            color: #000;
        }
    </style>
@endsection

@section('content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong>Reference No:</strong> {{ $application->reference_no }}
                </div>
                <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $application->phone) }}" target="_blank"
                    class="btn btn-sm btn-success">
                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                </a>

                <form method="POST" action="{{ route('admin.applications.updateStatus', $application->id) }}"
                    class="d-inline">
                    @csrf
                    @method('POST')

                    <select name="status" id="statusDropdown" class="form-control form-control-sm status-select"
                        onchange="this.form.submit()" style="width: 140px;">
                        <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>
                            Approved
                        </option>
                        <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>
                            Rejected
                        </option>
                    </select>

                </form>
            </div>
        </div>
    </div>



    {{-- Student Details --}}
    <div class="card mb-3">
        <div class="card-header">Student Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><strong>Name:</strong> {{ $application->student_name }}</div>
                <div class="col-md-6"><strong>Surname:</strong> {{ $application->surname }}</div>
                <div class="col-md-6 mt-2"><strong>Father Name:</strong> {{ $application->father_name }}</div>
                <div class="col-md-6 mt-2"><strong>Mother Name:</strong> {{ $application->mother_name }}</div>
            </div>
        </div>
    </div>

    {{-- Aadhar Details --}}
    <div class="card mb-3">
        <div class="card-header">Aadhar Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <strong>Student:</strong>
                    {{ $application->student_aadhar
                        ? preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1 $2 $3', $application->student_aadhar)
                        : '-' }}
                </div>

                <div class="col-md-4">
                    <strong>Father:</strong>
                    {{ $application->father_aadhar
                        ? preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1 $2 $3', $application->father_aadhar)
                        : '-' }}
                </div>

                <div class="col-md-4">
                    <strong>Mother:</strong>
                    {{ $application->mother_aadhar
                        ? preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1 $2 $3', $application->mother_aadhar)
                        : '-' }}
                </div>
            </div>
        </div>
    </div>


    {{-- Address Details --}}
    <div class="card mb-3">
        <div class="card-header">Address Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4"><strong>Home:</strong> {{ ucfirst($application->home_type) }}</div>
                <div class="col-md-4"><strong>Village:</strong> {{ $application->village }}</div>
                <div class="col-md-4"><strong>District:</strong> {{ $application->district }}</div>
                <div class="col-md-4 mt-2"><strong>State:</strong> {{ $application->state }}</div>
                <div class="col-md-4 mt-2"><strong>Pincode:</strong> {{ $application->pincode }}</div>
                <div class="col-md-8 mt-2"><strong>Address:</strong> {{ $application->address }}</div>
            </div>
        </div>
    </div>

    {{-- Contact & Family --}}
    <div class="card mb-3">
        <div class="card-header">Contact & Family Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4"><strong>Phone:</strong> {{ $application->phone }}</div>
                <div class="col-md-4"><strong>Email:</strong> {{ $application->email }}</div>
                <div class="col-md-4"><strong>Total Members:</strong> {{ $application->total_family_members }}</div>
                <div class="col-md-6 mt-2"><strong>Parents Business:</strong> {{ $application->parents_business }}</div>
                <div class="col-md-6 mt-2"><strong>Monthly Income:</strong> {{ $application->monthly_income }}</div>
                <div class="col-md-12 mt-2"><strong>Parents Illness:</strong> {{ $application->parents_illness }}</div>
            </div>
        </div>
    </div>

    {{-- School Info --}}
    <div class="card mb-3">
        <div class="card-header">School Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><strong>School Name:</strong> {{ $application->school_name }}</div>
                <div class="col-md-3"><strong>Standard:</strong> {{ $application->standard }}</div>
                <div class="col-md-3"><strong>Phone:</strong> {{ $application->school_phone }}</div>
                <div class="col-md-12 mt-2"><strong>Address:</strong> {{ $application->school_address }}</div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-light">
            <strong>School Bank Information</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong>Account Holder Name:</strong><br>
                    {{ $application->school_ac_name ?? 'N/A' }}
                </div>

                <div class="col-md-6">
                    <strong>Bank Name:</strong><br>
                    {{ $application->school_bank_name ?? 'N/A' }}
                </div>

                <div class="col-md-6 mt-3">
                    <strong>Account Number:</strong><br>
                    {{ $application->school_ac_number ?? 'N/A' }}
                </div>

                <div class="col-md-6 mt-3">
                    <strong>IFSC Code:</strong><br>
                    {{ $application->school_ifsc ?? 'N/A' }}
                </div>
            </div>

            @if ($application->documents->firstWhere('type', 'cancelled_cheque'))
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <strong>Cancelled Cheque:</strong><br>
                        <a href="{{ asset('storage/' . $application->documents->firstWhere('type', 'cancelled_cheque')->file_path) }}"
                            target="_blank" class="btn btn-sm btn-primary">
                            View Cheque
                        </a>
                        <a href="{{ asset('storage/' . $application->documents->firstWhere('type', 'cancelled_cheque')->file_path) }}"
                            download class="btn btn-sm btn-primary">
                            Download Cheque
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <strong>Scholarship Installments</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="10%">#</th>
                        <th width="15%">Status</th>
                        <th width="45%">Note (Cheque No / Remarks)</th>
                        <th width="15%">Paid Date</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($application->installments as $installment)
                        <tr>
                            <form method="POST" action="{{ route('admin.installments.update', $installment->id) }}">
                                @csrf
                                @method('PUT')

                                <td>
                                    <strong>{{ $installment->installment_no }}</strong>
                                </td>

                                <td>
                                    <select name="is_paid" class="form-select form-select-sm">
                                        <option value="0" {{ !$installment->is_paid ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                        <option value="1" {{ $installment->is_paid ? 'selected' : '' }}>
                                            Paid
                                        </option>
                                    </select>
                                </td>

                                <td>
                                    <textarea name="note" rows="2" class="form-control form-control-sm"
                                        placeholder="Enter cheque no or remarks...">{{ $installment->note }}</textarea>
                                </td>

                                <td>
                                    @if ($installment->paid_at)
                                        <span class="badge bg-success">
                                            {{ $installment->paid_at->format('d M Y') }}
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Save
                                    </button>
                                </td>

                            </form>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Remarks</strong>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.applications.updateStatus', $application->id) }}"
                id="remarkForm">
                @csrf
                @method('POST')

                <textarea name="remarks" class="form-control" rows="3" placeholder="Enter remark...">{{ $application->remarks }}</textarea>
                <div class="align-items-center d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-sm mt-2">
                        Save Remark
                    </button>
                    @if ($application->remark_updated_at)
                        <span class="text-mute">
                            Last Updated at: {{ $application->remark_updated_at->format('d M Y') }}

                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Documents --}}
    <div class="card">
        <div class="card-header">Uploaded Documents</div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Document</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $docs = [
                            'Student Aadhar Card' => 'student_aadhar_doc',
                            'Father Aadhar Card' => 'father_aadhar_doc',
                            'Mother Aadhar Card' => 'mother_aadhar_doc',
                            'Passport Photo' => 'passport_photo',
                            'School Letterhead' => 'school_letterhead',
                            'Electricity Bill' => 'electricity_bill',
                            'Death Certificate' => 'death_certificate',
                            'Last Year Marksheet' => 'last_year_marksheet',
                            'Other Document' => 'other_document',
                        ];
                    @endphp

                    @foreach ($docs as $label => $type)
                        @php
                            $doc = $application->documents->firstWhere('type', $type);
                        @endphp

                        <tr>
                            <td>{{ $label }}</td>
                            <td>
                                @if ($doc)
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                        class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <a href="{{ asset('storage/' . $doc->file_path) }}" download
                                        class="btn btn-sm btn-primary">
                                        Download
                                    </a>
                                @else
                                    <span class="text-muted">Not uploaded</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            function applyStatusColor() {
                const select = $('#statusDropdown');
                select
                    .removeClass('status-pending status-approved status-rejected')
                    .addClass('status-' + select.val());
            }

            applyStatusColor(); // on page load

            $('#statusDropdown').on('change', function() {
                applyStatusColor();
            });
        });
    </script>
@endsection
