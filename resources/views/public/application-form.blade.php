@extends('layouts.public')

@section('title', 'Application Form')

@section('content_header')
    <h1>
        Create Application</h1>
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
        {{-- NORMS SECTION --}}
        @if (!$showForm)

            <div class="form-section">
                <div class="form-section-header">
                    Scholarship Rules & Norms
                </div>

                <div class="p-3">
                    <ol>
                        <li>કોઈપણ પ્રકારની લાગવગ કે ભલામણ સ્વીકારવામાં આવશે નહિ.</li>
                        <li>આ ફોર્મ ધો. ૧ થી ૧૨ ધોરણમાં ભણતા વિદ્યાર્થીઓ માટે છે.</li>
                        <li>આ યોજનાની ૫૦૦૦/- રકમ ત્રણ હપ્તામાં જમા થશે.</li>
                        <li>આ યોજનાની રકમ શાળાના બેંક એકાઉન્ટમાં જમા થશે.</li>
                        <li>એક વાર ફોર્મ ભરી આપ્યા બાદ બીજી વાર ફોર્મ ભરવું નહિ.</li>
                        <li>આ યોજનાની રકમ ફોર્મ ચકાસણી કર્યા બાદ આપવામાં આવશે.</li>
                        <li>શાળામાં જયારે વાર્ષિક ફી ભરવા જાઓ ત્યારે જ વિદ્યાર્થીના A/C હોલ્ડર નામ લખાવીને આવવું અને A/C
                            હોલ્ડર નામ નહિ હોય તો ફોર્મ સ્વીકારવામાં આવશે નહિ.</li>
                        <li>જો કોઈ બીમારી હોય અથવા વાલીની ઘર જર્જરીત હોય તો તેના પુરાવા જરૂરી ફોર્મ સાથે લગાવવાના.</li>
                        <li>આ યોજનામાં ફી સરકાર, અર્ધસરકારી, RTE, માટે માન્ય ગણાશે નહિ.</li>
                        <li>આ યોજનામાં ખોટી માહિતી આપવામાં આવશે તો ફોર્મ રદ કરવામાં આવશે.</li>
                    </ol>

                    <div class="mt-3 text-center">
                        <form method="GET">
                            <input type="hidden" name="agree" value="1">
                            <div class="text-center mb-3">
                                <button type="submit" class="btn submit-button">
                                    I Agree
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @else
            <form id="formSection" action="{{ route('public.application.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-3 form-section-header">Student Details</h5>
                        <div class="form-section">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Student Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="student_name" value="{{ old('student_name') }}"
                                        class="form-control" required>
                                    @error('student_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Father Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="father_name" value="{{ old('father_name') }}"
                                        class="form-control" required>
                                    @error('father_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Surname <span class="text-danger">*</span></label>
                                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control"
                                        required>
                                    @error('surname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Mother Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                                        class="form-control" required>
                                    @error('mother_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Student Aadhar <span
                                            class="text-danger">*</span></label>

                                    <input type="text" name="student_aadhar" value="{{ old('student_aadhar') }}"
                                        class="form-control aadhar-input @error('student_aadhar') is-invalid @enderror"
                                        maxlength="14" placeholder="XXXX XXXX XXXX" required>

                                    @error('student_aadhar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Father Aadhar <span
                                            class="text-danger">*</span></label>

                                    <input type="text" name="father_aadhar" value="{{ old('father_aadhar') }}"
                                        class="form-control aadhar-input @error('father_aadhar') is-invalid @enderror"
                                        maxlength="14" placeholder="XXXX XXXX XXXX" required>

                                    @error('father_aadhar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Mother Aadhar <span
                                            class="text-danger">*</span></label>

                                    <input type="text" name="mother_aadhar" value="{{ old('mother_aadhar') }}"
                                        class="form-control aadhar-input @error('mother_aadhar') is-invalid @enderror"
                                        maxlength="14" placeholder="XXXX XXXX XXXX" required>

                                    @error('mother_aadhar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3 form-section-header">Address Details</h5>
                        <div class="form-section">

                            <div class="row">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Home <span class="text-danger">*</span></label>
                                    <select name="home_type" class="form-select">
                                        <option value="">Select</option>
                                        <option value="own" @if (old('home_type') == 'own') selected @endif>Own
                                        </option>
                                        <option value="rent" @if (old('home_type') == 'rent') selected @endif>Rent
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Address <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">Village <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="village" value="{{ old('village') }}"
                                        class="form-control" required>
                                    @error('village')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">District <span
                                            class="text-danger">*</span></label>
                                    <select name="district" class="form-select @error('district') is-invalid @enderror" required>
                                        <option value="">Select District</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city }}" @if (old('district') == $city) selected @endif>
                                                {{ $city }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('district')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">State <span class="text-danger">*</span></label>
                                    <input type="text" name="state" value="{{ old('state') }}"
                                        class="form-control" required>
                                    @error('state')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Pincode <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" name="pincode" value="{{ old('pincode') }}"
                                        class="form-control @error('pincode') is-invalid @enderror" maxlength="6"
                                        placeholder="Enter 6-digit Pincode">

                                    @error('pincode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <hr>

                        <h5 class="mb-3 form-section-header">Contact & Family</h5>
                        <div class="form-section">

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control phone-input" required maxlength="11"
                                        placeholder="XXXXX XXXXX">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Total Family Members <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="total_family_members"
                                        value="{{ old('total_family_members') }}" class="form-control" min="1"
                                        required>
                                    @error('total_family_members')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Business <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="business" value="{{ old('business') }}"
                                        class="form-control" required>
                                    @error('business')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Income <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="income" value="{{ old('income') }}"
                                        class="form-control" required>
                                    @error('income')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Parent's Illness</label>
                                    <input type="text" name="illness" value="{{ old('illness') }}"
                                        class="form-control">
                                    @error('illness')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h5 class="mb-3 form-section-header">School Information</h5>
                        <div class="form-section">

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="school_name" value="{{ old('school_name') }}"
                                        class="form-control" required>
                                    @error('school_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Standard <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="standard" value="{{ old('standard') }}"
                                        class="form-control" min="5" max="12" required>
                                    @error('standard')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Phone No <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="school_phone" value="{{ old('school_phone') }}"
                                        class="form-control phone-input" required maxlength="11"
                                        placeholder="XXXXX XXXXX">
                                    @error('school_phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="">
                                    <label class="form-label fw-semibold">Address <span
                                            class="text-danger">*</span></label>
                                    <textarea name="school_address" class="form-control" required>{{ old('school_address') }}</textarea>
                                    @error('school_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="border-0 card mt-4"> --}}
                                {{-- <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">School Bank Details</h5>
                            </div> --}}

                                {{-- <div class="card-body border"> --}}
                                <div class="row g-2">
                                    <h5>School Bank Details:</h5>
                                </div>

                                <div class="row">

                                    <!-- Account Holder Name -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Account Holder Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="school_account_holder_name"
                                            value="{{ old('school_account_holder_name') }}"
                                            class="form-control @error('school_account_holder_name') is-invalid @enderror"
                                            placeholder="Enter Account Holder Name">

                                        @error('school_account_holder_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Bank Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="school_bank_name"
                                            value="{{ old('school_bank_name') }}"
                                            class="form-control @error('school_bank_name') is-invalid @enderror"
                                            placeholder="Enter Bank Name">

                                        @error('school_bank_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Account Number <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="school_account_number"
                                            value="{{ old('school_account_number') }}"
                                            class="form-control @error('school_account_number') is-invalid @enderror"
                                            placeholder="Enter Account Number">

                                        @error('school_account_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- IFSC -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            IFSC Code <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="school_ifsc" value="{{ old('school_ifsc') }}"
                                            class="form-control text-uppercase @error('school_ifsc') is-invalid @enderror"
                                            placeholder="Example: SBIN0001234">

                                        @error('school_ifsc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Cancelled Cheque Upload -->
                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-semibold">
                                            Upload Cancelled Cheque <span class="text-danger">*</span>
                                        </label>

                                        <input type="file" name="cancelled_cheque"
                                            class="form-control @error('cancelled_cheque') is-invalid @enderror"
                                            accept=".jpg,.jpeg,.png,.pdf">

                                        <small class="text-muted">
                                            Allowed formats: JPG, PNG, PDF (Max 2MB)
                                        </small>

                                        @error('cancelled_cheque')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                {{-- </div> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                        <hr>

                        <h5 class="mb-3 form-section-header">Documents Upload</h5>
                        <div class="form-section">

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
                                        <label class="form-label fw-semibold">{{ $label }} @if ($name != 'death_certificate' && $name != 'other_document')
                                                <span class="text-danger">*</span>
                                            @endif
                                        </label>
                                        <input type="file" name="{{ $name }}" class="form-control"
                                            @if ($name != 'death_certificate' && $name != 'other_document') required @endif>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn submit-button">Submit Application</button>
                    </div>
                </div>

            </form>
        @endif
    @endif

@endsection

@section('scripts')
    <script>
        // document.addEventListener("DOMContentLoaded", function() {

        //     const norms = document.getElementById("normsSection");
        //     const form = document.getElementById("formSection");
        //     const agreeBtn = document.getElementById("agreeBtn");

        //     // If already agreed OR validation errors exist
        //     if (sessionStorage.getItem("formAgreed") === "true" ||
        //         {{ $errors->any() ? 'true' : 'false' }}) {

        //         norms.style.display = "none";
        //         form.style.display = "block";
        //     }

        //     agreeBtn?.addEventListener("click", function() {
        //         // sessionStorage.setItem("formAgreed", "true");
        //         norms.style.display = "none";
        //         form.style.display = "block";
        //     });

        // });

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
