@extends('layouts.public')

@section('title', 'Application Form')

@section('content_header')
    <h1>Create Application</h1>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <p class="mb-1">{{ session('success') }}</p>

            <div class="mt-2 p-2 bg-light border rounded">
                <small class="text-muted">Please save this reference number for future use</small>
                <div class="fw-bold fs-5">
                    {{ session('reference_no') }}
                </div>
            </div>
        </div>
    @else
        <form action="{{ route('public.application.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-body">

                    <h5 class="mb-3">Student Details</h5>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Student Name</label>
                            <input type="text" name="student_name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Father Name</label>
                            <input type="text" name="father_name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Mother Name</label>
                            <input type="text" name="mother_name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Student Aadhar</label>

                            <input type="text" name="student_aadhar" value="{{ old('student_aadhar') }}"
                                class="form-control aadhar-input @error('student_aadhar') is-invalid @enderror"
                                maxlength="14" placeholder="XXXX XXXX XXXX">

                            @error('student_aadhar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label>Father Aadhar</label>

                            <input type="text" name="father_aadhar" value="{{ old('father_aadhar') }}"
                                class="form-control aadhar-input @error('father_aadhar') is-invalid @enderror"
                                maxlength="14" placeholder="XXXX XXXX XXXX">

                            @error('father_aadhar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label>Mother Aadhar</label>

                            <input type="text" name="mother_aadhar" value="{{ old('mother_aadhar') }}"
                                class="form-control aadhar-input @error('mother_aadhar') is-invalid @enderror"
                                maxlength="14" placeholder="XXXX XXXX XXXX">

                            @error('mother_aadhar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>



                    <hr>
                    <h5 class="mb-3">Address Details</h5>
                    <div class="row">

                        <div class="mb-3">
                            <label class="form-label">Home</label>
                            <select name="home_type" class="form-select">
                                <option value="">Select</option>
                                <option value="own">Own</option>
                                <option value="rent">Rent</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">

                            <label class="form-label">Village</label>
                            <input type="text" name="village" class="form-control">
                        </div>

                        <div class="col-md-4">

                            <label class="form-label">District</label>
                            <input type="text" name="district" class="form-control">
                        </div>

                        <div class="col-md-4">

                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                    </div>

                    <hr>

                    <h5>Contact & Family</h5>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control phone-input" required maxlength="11"
                                placeholder="XXXXX XXXXX">
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Total Family Members</label>
                            <input type="number" name="total_family_members" class="form-control" min="1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Business</label>
                            <input type="text" name="business" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Income</label>
                            <input type="text" name="income" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Parent's Illness</label>
                            <input type="text" name="illness" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <h5>School Information</h5>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" name="school_name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Standard</label>
                            <input type="number" name="standard" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Phone No</label>
                            <input type="text" name="school_phone" class="form-control phone-input" required
                                maxlength="11" placeholder="XXXXX XXXXX">
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <label>Address</label>
                            <textarea name="school_address" class="form-control"></textarea>
                        </div>
                    </div>

                    <hr>

                    <h5>Documents Upload</h5>

                    @php
                        $docs = [
                            'student_aadhar_doc' => 'Student Aadhar',
                            'father_aadhar_doc' => 'Father Aadhar',
                            'mother_aadhar_doc' => 'Mother Aadhar',
                            'passport_photo' => 'Passport Photo',
                            'school_letterhead' => 'School Letterhead',
                            'electricity_bill' => 'Electricity Bill',
                            'death_certificate' => 'Death Certificate',
                            'last_year_marksheet' => 'Last Year Marksheet',
                            'other_document' => 'Other Document',
                        ];
                    @endphp

                    <div class="row">
                        @foreach ($docs as $name => $label)
                            <div class="col-md-4 mb-3">
                                <label>{{ $label }}</label>
                                <input type="file" name="{{ $name }}" class="form-control">
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </div>
            </div>

        </form>
    @endif

@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.aadhar-input').forEach(input => {
            input.addEventListener('input', function() {
                // Remove all non-digits
                let value = this.value.replace(/\D/g, '');

                // Limit to 12 digits
                value = value.substring(0, 12);

                // Add space after every 4 digits
                value = value.replace(/(\d{4})(?=\d)/g, '$1 ');

                this.value = value;
            });
        });

        document.querySelectorAll('.phone-input').forEach(input => {
            input.addEventListener('input', function() {
                // Remove all non-digits
                let value = this.value.replace(/\D/g, '');

                // Limit to 12 digits
                value = value.substring(0, 10);

                // Add space after every 4 digits
                value = value.replace(/(\d{5})(?=\d)/g, '$1 ');

                this.value = value;
            });
        });
    </script>
@endsection
