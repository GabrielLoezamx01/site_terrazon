<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Terrazon</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_user.css') }}">
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-6">
                <div class="m-5">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo-terrazon.png') }}" class="login-img mt-5">
                    </a>
                    <div class="padding-login">
                        <h1 class="color-login">
                            Ingresa el token
                        </h1>
                        <span class="span-login">
                           Se envio un token a tu correo electrónico, por favor ingrésalo
                        </span>
                    </div>
                    <div class="padding-login col-md-12">
                         @if ($errors->any())
                            <div class="alert ">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('custom.token') }}">
                            @csrf
                            <input type="hidden" value="{{ $email }}" name="ca">
                            <div class="mb-3">
                                <label for="email" class="form-label">Ingresa el token<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input" id="token" name="token" required
                                    placeholder="Ingresa tu correo electrónico">
                            </div>
                            <button type="submit" class=" btn-color w-100 text-white">INGRESAR</button>
                        </form>
                        <div class="mb-3 mt-3">
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
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block"
                style="background-image: url('{{ asset('images/ForgotPassword.webp') }}'); background-size: cover; background-position: center;">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}?v={{ config('app.version') }}"></script>

</body>

</html>
