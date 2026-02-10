<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Application Form')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap (CDN is fine for public form) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="container" style="border: 10px solid rgb(223, 145, 1)">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('images/Hiraba-No-Khumkar-logo.jpg') }}" alt="Logo" height="110">
                </a>
                <h3>Scholarship Application</h3>
                <img src="{{ asset('images/Beti_Bachao_Beti_Padhao_logo.jpg') }}" alt="Logo" height="110"
                    class="me-2">
            </div>
        </nav>

        <div class="container my-5">
            @yield('content')
        </div>

        <footer class="main-footer bg-white border-top">
            <div class="container-fluid py-3">
                <div class="row align-items-center">

                    {{-- Left: Organization --}}
                    <div class="col-md-4 mb-2 mb-md-0">
                        <h6 class="mb-1 font-weight-bold text-primary">
                            Hiraba No Khammkar
                        </h6>
                        <small class="text-muted">
                            Foundation
                        </small>
                    </div>

                    {{-- Center: Contact --}}
                    <div class="col-md-4 mb-2 mb-md-0 text-md-center">
                        <div class="small">
                            {{-- <i class="fas fa-phone-alt mr-1 text-secondary"></i> --}}
                            {{-- +91 63591 86191 --}}
                        </div>
                    </div>

                    {{-- Right: Address --}}
                    <div class="col-md-4 text-md-right">
                        <div class="small">
                            <i class="fas fa-phone-alt mr-1 text-secondary"></i>
                            +91 63591 86191
                        </div>
                        <div class="small text-muted">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            502, Empire State Building,
                            Udhana Darwaja, Surat
                        </div>
                    </div>

                </div>

                <hr class="my-2 border-primary">

                {{-- Bottom line --}}
                <div class="text-center small text-muted">
                    © {{ date('Y') }} Hiraba No Khammkar. All rights reserved.
                </div>
            </div>
        </footer>

    </div>
    @yield('scripts')
</body>

</html>
