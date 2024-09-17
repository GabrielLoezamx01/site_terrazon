<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demoapp.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    @stack('styles')
    @stack('scripts')
</head>

<body>
    <div class="page">
        @if (Auth::check())
        @if (!isset($validate))
        @include('layouts.aside')
        @endif
        <div class="page-wrapper" id="vueApp">
            {{-- <x-page-header title="{{ $title ?? 'Configurar vista' }}" /> --}}
            @yield('content')
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <span>Terrazon Admin</span>
                </div>
            </footer>
        </div>

    </div>

    <!-- <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script> -->
    <script src="{{ asset('js/search.js') }}"></script>

    @stack('scripts2')
    @else
    <div class="page-wrapper" id="vueApp">
        {{-- <x-page-header title="{{ $title ?? 'Configurar vista' }}" /> --}}
        @yield('content')
    </div>
    @endif
    <script src="{{ asset('js/demo-theme.min.js') }}"></script>
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>

</body>

</html>