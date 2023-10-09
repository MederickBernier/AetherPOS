<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>AetherPOS</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    @auth
        @include('layouts.components.navbar')
    @endauth

    <div class="container-fluid flex-grow-1">
        <div class="row justify-content-center">
            <!-- Main content -->
            <main class="{{ auth()->check() ? 'col-md-9 col-lg-12' : 'col-12' }} px-md-4 mt-5 mx-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    @if(!auth()->check())
    <footer class="text-center mt-5 mb-3">
        <p>&copy; {{ date('Y') }} AetherPOS. All rights reserved.</p>
        <p>This application is not affiliated with, endorsed, or sponsored by Square Enix. All trademarks, service marks, trade names, trade dress, product names, and logos appearing on the site are the property of their respective owners.</p>
    </footer>
    @endif

    @if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="successToast" class="toast hide bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Success</strong>
                <small>just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="errorToast" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Error</strong>
                <small>just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
    @endif

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
