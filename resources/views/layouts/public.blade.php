<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Application Form')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <!-- Bootstrap (CDN is fine for public form) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/fontawesome-free/css/all.min.css">
    <style>
        .main-footer {
            font-size: 0.9rem;
        }

        .main-footer a:hover {
            color: #0d6efd;
            transition: 0.2s;
        }

        /* .card {
            border-radius: 12px;
        }

        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        } */

        /* ===============================
   COLOR VARIABLES (From PDF)
================================= */
        :root {
            --pdf-orange: #E06000;
            --pdf-dark-red: #A00000;
            --pdf-bright-red: #E00000;
            --pdf-light-grey: #E0E0E0;
            --pdf-dark-green: #006020;
            --pdf-black: #000000;
            --pdf-muted-grey: #A0A0A0;
        }

        /* ===============================
   SECTION CONTAINER
================================= */
        .form-section {
            background-color: var(--pdf-light-grey);
            border: 2px solid var(--pdf-black);
            padding: 16px;
            margin-bottom: 20px;
        }

        /* ===============================
   SECTION HEADER (ORANGE BAR)
================================= */
        .form-section-header {
            background-color: var(--pdf-orange);
            color: var(--pdf-black);
            font-weight: bold;
            text-transform: uppercase;
            padding: 8px 12px;
            border: 2px solid var(--pdf-black);
            margin-bottom: 0;
        }

        /* Remove card modern feel */
        .card {
            border-radius: 0 !important;
            box-shadow: none !important;
        }

        /* ===============================
   TABLE STYLE (PRINT-LIKE)
================================= */
        .form-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-table th,
        .form-table td {
            border: 1.5px solid var(--pdf-black);
            padding: 8px;
            vertical-align: middle;
        }

        .form-table th {
            background-color: var(--pdf-light-grey);
            font-weight: bold;
        }

        /* ===============================
   IMPORTANT FINANCIAL TEXT
================================= */
        .amount-highlight {
            color: var(--pdf-dark-red);
            font-weight: bold;
        }

        .critical-text {
            color: var(--pdf-bright-red);
            font-weight: bold;
        }

        .approved-text {
            color: var(--pdf-dark-green);
            font-weight: bold;
        }

        /* ===============================
   LABEL STYLING
================================= */
        .form-label {
            font-weight: 600;
            color: var(--pdf-black);
        }

        /* ===============================
   INPUT STYLE (PRINT FEEL)
================================= */
        .form-control {
            border: 1.5px solid var(--pdf-black);
            border-radius: 0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--pdf-orange);
        }

        /* ===============================
   FOOTER STYLE MATCH
================================= */
        .form-footer {
            border-top: 2px solid var(--pdf-black);
            padding-top: 10px;
            margin-top: 20px;
        }

        /* ===============================
   WARNING / NOTICE BOX
================================= */
        .notice-box {
            background-color: #FFF3CD;
            /* soft yellow from PDF tone */
            border: 2px solid var(--pdf-black);
            padding: 12px;
            font-weight: 500;
        }

        .title-text{
            color: var(--pdf-dark-green);
        }

        .subtitle-text{
            color: var(--pdf-dark-red);
        }

        .submit-button{
            background-color:var(--pdf-dark-red);
            color: #fff;
        }

        .icon-color{
            color:var(--pdf-dark-red);
        }
    </style>
</head>

<body>
    <div class="container" style="border: 10px solid rgb(223, 145, 1)">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" height="110">
                </a>
                <h3>Scholarship Application</h3>
                <img src="{{ asset('images/Beti_Bachao_Beti_Padhao_logo.jpg') }}" alt="Logo" height="110"
                    class="me-2">
            </div>
        </nav>

        <div class="container my-5">
            @yield('content')
        </div>



        <footer class="main-footer bg-white border-top mt-4">
            <div class="container-fluid py-4">

                <div class="row align-items-start gy-3">

                    {{-- Left: Organization --}}
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-1 title-text">
                            Hiraba No Khamkar
                        </h5>
                        <small class="subtitle-text">
                            Foundation
                        </small>

                        <div class="mt-3 small text-muted">
                            Empowering students through scholarship support.
                        </div>
                    </div>

                    {{-- Center: Contact Info --}}
                    <div class="col-md-4 text-md-center">
                        <div class="mb-2">
                            <i class="fas fa-phone-alt me-2 icon-color"></i>
                            <span class="small">+91 63591 86191</span>
                        </div>

                        <div class="mb-2">
                            <i class="fas fa-envelope me-2 icon-color"></i>
                            <a href="mailto:info@hirabafoundation.org" class="small text-decoration-none text-dark">
                                hirabanokhamakar@gmail.com
                            </a>
                        </div>

                        <div>
                            <i class="fab fa-instagram me-2 text-danger"></i>
                            <a href="https://www.instagram.com/desai_piyush_official/" target="_blank"
                                class="small text-decoration-none text-dark">
                                Follow us on Instagram
                            </a>
                        </div>
                    </div>

                    {{-- Right: Address --}}
                    <div class="col-md-4 text-md-end">
                        <div class="small mb-2">
                            <i class="fas fa-map-marker-alt me-2 icon-color"></i>
                            502, Empire State Building
                        </div>
                        <div class="small text-muted">
                            Udhana Darwaja, Surat
                        </div>
                    </div>

                </div>

                <hr class="my-3">

                {{-- Bottom --}}
                <div class="text-center small text-muted">
                    © {{ date('Y') }} Hiraba No Khamkar Foundation. All rights reserved.
                </div>

            </div>
        </footer>


    </div>
    @yield('scripts')
</body>

</html>
