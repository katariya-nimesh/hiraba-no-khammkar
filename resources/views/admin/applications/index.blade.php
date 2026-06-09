@extends('adminlte::page')

@section('title', 'Applications')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0 !important;
            margin: 0 2px;
            border: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .page-link {
            padding: 0.375rem 0.75rem;
            font-size: 14px;
        }

        .badge-lifetime {
            background-color: #1d6fa4;
            color: #fff;
        }

        .badge-onetime {
            background-color: #2c6e49;
            color: #fff;
        }
    </style>
@endsection

@section('content_header')
    <h1>Applications <small class="text-muted fs-6">(Paid only)</small></h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <form id="searchForm" method="GET" action="{{ route('admin.applications.index') }}">
                <div class="row align-items-end g-2">

                    {{-- Global Search --}}
                    <div class="col-md-3">
                        <label>Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Name, Ref No, Aadhar..."
                            value="{{ request('search') }}">
                    </div>

                    {{-- Form Type Filter --}}
                    <div class="col-md-2">
                        <label>Form Type</label>
                        <select name="form_type" class="form-control" id="filterFormType">
                            <option value="">All Types</option>
                            <option value="lifetime"  {{ request('form_type') == 'lifetime'  ? 'selected' : '' }}>Lifetime</option>
                            <option value="one_time"  {{ request('form_type') == 'one_time'  ? 'selected' : '' }}>One-Time</option>
                        </select>
                    </div>

                    {{-- Status Filter --}}
                    <div class="col-md-2">
                        <label>Status</label>
                        <select name="status" class="form-control" id="filterStatus">
                            <option value="">All</option>
                            <option value="pending"  {{ request('status') == 'pending'  ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    {{-- Installment Filter --}}
                    <div class="col-md-2">
                        <label>Installment</label>
                        <select name="installment_no" class="form-control" id="filterInstallment">
                            <option value="">All</option>
                            <option value="1" {{ request('installment_no') == '1' ? 'selected' : '' }}>Installment 1</option>
                            <option value="2" {{ request('installment_no') == '2' ? 'selected' : '' }}>Installment 2</option>
                            <option value="3" {{ request('installment_no') == '3' ? 'selected' : '' }}>Installment 3</option>
                        </select>
                    </div>

                    {{-- From Date --}}
                    <div class="col-md-2">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control" id="filterFromDate"
                            value="{{ request('from_date') }}">
                    </div>

                    {{-- To Date --}}
                    <div class="col-md-2">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control" id="filterToDate"
                            value="{{ request('to_date') }}">
                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-3 d-flex mt-2 gap-2">
                        <button type="submit" class="btn btn-primary mr-2">Search</button>

                        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary mr-2">Reset</a>

                        {{-- Export preserves all active filters --}}
                        <a href="{{ route('admin.applications.export', request()->query()) }}"
                            class="btn btn-success ml-2">
                            Export
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped" id="applications-table">
                <thead>
                    <tr>
                        <th>Reference No</th>
                        <th>Form Type</th>
                        <th>Name</th>
                        <th>Village</th>
                        <th>School</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>
                                <span class="fw-semibold">{{ $application->reference_no }}</span>
                            </td>
                            <td>
                                @if ($application->form_type === 'lifetime')
                                    <span class="badge badge-lifetime">Lifetime</span>
                                @else
                                    <span class="badge badge-onetime">One-Time</span>
                                @endif
                            </td>
                            <td>{{ $application->student_name }}</td>
                            <td>{{ $application->village }}</td>
                            <td>{{ $application->school_name }}</td>
                            <td>{{ $application->created_at->format('d-m-Y') }}</td>
                            <td>
                                <span
                                    class="badge badge-{{ $application->status == 'approved' ? 'success' : ($application->status == 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.applications.show', $application->id) }}"
                                    class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Auto-submit on dropdown / date changes
            $('#filterFormType, #filterStatus, #filterInstallment, #filterFromDate, #filterToDate')
                .on('change', function() {
                    $('#searchForm').submit();
                });

            $('#applications-table').DataTable({
                "paging": true,
                "pageLength": 25,
                "searching": false,
                "info": false,
                "lengthChange": false,
                "language": {
                    "emptyTable": "No paid applications found"
                }
            });
        });
    </script>
@stop
