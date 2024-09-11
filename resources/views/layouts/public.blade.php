<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'TERRAZON'))</title>
    <!-- Scripts -->
    <!-- Styles -->
    <style>
        :root {
            --asset-path: "{{ asset('') }}";
        }
    </style>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    @stack('stylesheet')
    @stack('styles')
</head>

<body>
    @include('public.includes.header')
    @yield('content')
    <script src="{{ asset('js/app.js') }}?v={{ config('app.version')}}"></script>
    <!-- @yield('scripts') -->
    @stack('scripts')
    @include('public.includes.footer')
</body>

</html>