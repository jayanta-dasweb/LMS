<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Servile Relocation LMS"/>
    <meta name="keywords" content="Servile Relocation LMS"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/servile-favicon.png') }}"/>
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css') }}">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Additional stylesheets can be included here -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>
<body id="kt_body" class="app-blank">

<div class="d-flex flex-column flex-root" id="kt_app_root">
    @yield('content')
</div>

<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!-- Additional scripts can be included here -->

@stack('scripts')
</body>
</html>
