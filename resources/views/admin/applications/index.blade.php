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
    </style>
@endsection

@section('content_header')
    <h1>Applications</h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <form id="searchForm" method="GET" action="{{ route('admin.applications.index') }}">
                <div class="row align-items-end">

                    {{-- Global Search --}}
                    <div class="col-md-3">
                        <label>Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search anything..."
                            value="{{ request('search') }}">
                    </div>

                    {{-- Status Filter --}}
                    <div class="col-md-2">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">All</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                            </option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
                    </div>

                    {{-- From Date --}}
                    <div class="col-md-2">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                    </div>

                    {{-- To Date --}}
                    <div class="col-md-2">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-3 d-flex">
                        <button type="submit" class="btn btn-primary mr-2">
                            Search
                        </button>

                        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                            Reset
                        </a>

                        {{-- Export Excel --}}
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
                        <th>Name</th>
                        <th>Village</th>
                        <th>School</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->reference_no }}</td>
                            <td>{{ $application->student_name }}</td>
                            <td>{{ $application->village }}</td>
                            <td>{{ $application->school_name }}</td>
                            <td>{{ $application->created_at->format('Y-m-d') }}</td>
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No applications found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- <div class="mt-3"> --}}
                {{-- {{ $applications->links() }} --}}
                {{-- {{ $applications->withQueryString()->links() }} --}}
            {{-- </div> --}}
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="status"], input[name="from_date"], input[name="to_date"]').on('change', function() {
                $('#searchForm').submit();
            });

            $('#applications-table').DataTable({
                "paging": true,
                "pageLength": 10,
                "searching": false,
                "info": false,
                "lengthChange": false
            });
        });
    </script>
@stop
