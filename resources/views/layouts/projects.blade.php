<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="sr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="KelenS">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'site professionnel')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/img/favicon.webp') }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="Hydaria">
    @stack('meta')

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title') | {{ getSetting('site_name', 'Mon Site') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="@versioned_asset('assets/img/logo.svg') ">

    {{-- Fonts --}}
    <link rel="stylesheet" href="@versioned_asset('vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css') ">

    {{-- Page level scripts --}}
    @stack('scripts')

    {{-- Scripts --}}
    <script src="@versioned_asset('assets/js/app.js') " defer></script>
    <script src="@versioned_asset('assets/js/btn.js')" defer></script>
    <script src="@versioned_asset('assets/js/animations.js') " defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>

    {{-- Bootstrap --}}
    <link href="@versioned_asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') " rel="stylesheet">
    <script src="@versioned_asset('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') " defer></script>

    {{-- Styles --}}
    <link href="@versioned_asset('assets/css/index.css') " rel="stylesheet">

    @php
        $settings = \App\Models\Setting::first();
    @endphp

    <style>
        :root {
            --color-primary: {{ $settings->color_primary ?? '#007bff' }};
            --color-secondary: {{ $settings->color_secondary ?? '#6c757d' }};
        }
    </style>
    @stack('styles')
</head>

<body>
    {{-- Back to top button --}}
    <div id="button">
        <p>Haut de la page <i class="bi bi-arrow-right-short"></i></p>
    </div>

    {{-- Page --}}
    <div id="projects-page">
        <header class="header">
            @include('elements.navbar')
        </header>

        <main class="content">
            @yield('content')
        </main>

        <footer class="footer">
            @include('elements.footer')
        </footer>
    </div>

    @stack('footer-scripts')
    <script src="@versioned_asset('assets/js/carousel.js')" defer></script>
    <script src="@versioned_asset('assets/js/onscroll.js')" defer></script>
</body>

</html>
