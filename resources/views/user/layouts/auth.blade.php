<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'TERRAZON'))</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_user.css') }}">
</head>
<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-6 bg-dark">
                <div class="m-5">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/logo-terrazon.png') }}" class="login-img mt-5">
                        </a>
                    <div class="padding-login">
                        <h1 class="color-login">
                            @yield('page-title', 'Login')
                        </h1>
                        <span class="span-login">
                            @yield('page-span', 'Terrazon')
                        </span>
                    </div>
                    <div class="padding-login col-md-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
            @yield('images')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}?v={{ config('app.version') }}"></script>
    <script src="{{ asset('js/password.js') }}"></script>
</body>

</html>
