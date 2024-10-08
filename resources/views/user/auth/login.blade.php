<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Terrazon</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_user.css') }}">
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-6">
                <div class="m-5">
                    <div>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/logo-terrazon.png') }}" class="login-img mt-5">
                        </a>
                    </div>
                    <div class="padding-login">
                        <h1 class="color-login">
                            Iniciar sesión
                        </h1>
                        <span class="span-login">Inicie sesión para acceder a su cuenta Terrazon</span>
                    </div>
                    <div class="padding-login col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('custom.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="label-login">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="input-email mt-2"
                                    placeholder="Ingresa tu correo electrónico">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="label-login">Contraseña</label>
                                <div class="input-wrapper">
                                    <input type="password" name="password" id="password" class="input-email mt-2"
                                        placeholder="Ingresa tu contraseña">
                                    <span class="password-toggle" onclick="togglePassword()">
                                        <span id="toggle-text" class="color-login"></span>
                                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler-eye">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col text-start">
                                        <input type="checkbox" id="remember" class="check-input">
                                        <label for="remember" class="label-login ms-2">Recordarme</label>
                                    </div>
                                    <div class="col-auto text-end">
                                        <a href="{{ route('custom.password') }}" id="forgot-password"
                                            class="pass-label">Olvidé mi
                                            contraseña</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn-color w-100 text-white ">INGRESAR</button>
                            </div>
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col text-start">
                                        <div class="label-login">¿Todavía no tienes una cuenta en Terrazon?</div>

                                    </div>
                                    <div class="col-auto text-end">
                                        <a href="{{ route('custom.register') }}" id="register"
                                            class="label-register">Regístrate aquí</a>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>

            </div>

            <div class="col-md-6 d-none d-md-block"
                style="background-image: url('{{ asset('images/login-1.webp') }}'); background-size: cover; background-position: center;">

            </div>

        </div>
    </div>

    <script src="{{ asset('js/app.js') }}?v={{ config('app.version') }}"></script>
    <script src="{{ asset('js/password.js') }}"></script>

</body>

</html>
