<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Application Form')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap (CDN is fine for public form) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

{{-- <nav class="navbar navbar-light bg-light">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Scholarship Application</span>
    </div>
</nav> --}}

<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/Beti_Bachao_Beti_Padhao_logo.jpg') }}"
                 alt="Logo"
                 height="40"
                 class="me-2">
            <span>Scholarship Application</span>
        </a>
    </div>
</nav>


<div class="container my-5">
    @yield('content')
</div>

@yield('scripts')
</body>
</html>
