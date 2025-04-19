<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="@versioned_asset('assets/img/logo.svg') ">
    <title>@yield('title') | {{ getSetting('site_name', 'Mon Site') }}</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="@versioned_asset('vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css') ">

    {{-- Styles --}}
    <link href="@versioned_asset('assets/admin/css/sb-admin-2.min.css') " rel="stylesheet">
    @stack('styles')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')
        <div id="content-wrapper">
            <div>
                @include('layouts.navbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    @stack('footer-scripts')
    <script src="@versioned_asset('assets/admin/js/animations.js') "></script>
    <script src="@versioned_asset('assets/admin/js/sb-admin-2.min.js') "></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="@versioned_asset('vendor/tinymce/tinymce/tinymce.min.js') " defer></script>
</body>

</html>
