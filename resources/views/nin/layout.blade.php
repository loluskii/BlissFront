<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blissitech Hub</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('fontawesome-free/css/all.min.css') }}">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ secure_asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Sen', sans-serif;
        }
    </style>

    @yield('css')
</head>

<body>
    <div id="app">
        @include('nin.header')
        <main class="my-5">
            @yield('content')
        </main>

    </div>

    <script src="{{ secure_asset('js/app.js') }}"></script>
    @include('layouts.partials.footer_scripts')
    @stack('more_scripts')
</body>

</html>
