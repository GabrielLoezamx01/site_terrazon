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

        .dropdown-menu-custom::before {
            content: "";
            position: absolute;
            top: -5px;
            right: 30px;
            border-width: 0 7px 7px 7px;
            border-style: solid;
            border-color: transparent transparent #094208 transparent;
        }
    </style>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ mix('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ mix('css/animate.min.css') }}" />
    @stack('stylesheet')
    @stack('styles')
    <script src="{{ mix('js/app.js') }}" type="application/javascript"></script>
    <script src="{{ mix('js/vue.public.app.js') }}"></script>
    <link rel="shortcat icon" href="favicon.ico"> 
</head>

<body>
    @include('public.includes.header')
    <div id="content">
        @yield('content')
        <Toasts ref="toasts"></Toasts>
    </div>
    @stack('scripts')
    @include('public.includes.footer')
</body>

</html>
