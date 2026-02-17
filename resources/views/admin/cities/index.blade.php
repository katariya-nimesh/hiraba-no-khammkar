@extends('adminlte::page')

@section('title', 'Cities')

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
    <h1>Cities</h1>
@stop

@section('content')
    {{-- <div class="card mb-3">
        <div class="card-body">
            <form id="searchForm" method="GET" action="{{ route('admin.cities.index') }}">
                <div class="row align-items-end">

                    <div class="col-md-3">
                        <label>Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search anything..."
                            value="{{ request('search') }}">
                    </div>

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

                    <div class="col-md-2">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                    </div>

                    <div class="col-md-2">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                    </div>

                    <div class="col-md-3 d-flex">
                        <button type="submit" class="btn btn-primary mr-2">
                            Search
                        </button>

                        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                            Reset
                        </a>

                    <a href="{{ route('admin.applications.export', request()->query()) }}"
                       class="btn btn-success ml-2">
                        Export
                    </a>
                    </div>

                </div>
            </form>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped" id="cities-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td>{{ $city->name }}</td>
                            <td>
                                <span style="display:none;">{{ $city->is_active ? 1 : 0 }}</span>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input toggle-city" id="toggle{{ $city->id }}"
                                        data-id="{{ $city->id }}" {{ $city->is_active ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="toggle{{ $city->id }}"></label>
                                </div>
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

            $('#cities-table').DataTable({
                "paging": true,
                "pageLength": 10,
                "searching": false,
                "info": false,
                "lengthChange": false
            });

            // Handle city toggle
            $(document).on('change', '.toggle-city', function() {
                const cityId = $(this).data('id');
                const isActive = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route("admin.cities.updateStatus", "") }}/' + cityId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        is_active: isActive
                    },
                    success: function(response) {
                        // Show success message
                        location.reload();
                    },
                    error: function(xhr) {
                        // Show error message and revert checkbox
                        alert('Error updating city status');
                        location.reload();
                    }
                });
            });
        });
    </script>
@stop
