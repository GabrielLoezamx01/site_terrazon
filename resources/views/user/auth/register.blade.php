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
                    <div>
                        <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo-terrazon.png') }}" class="login-img mt-5">
                        </a>
                    </div>
                    <div class="padding-login">
                        <h1 class="color-login">
                            Registrarse
                        </h1>
                        <span class="span-login">
                            Preparémonos para crear tu cuenta personal.
                        </span>
                    </div>
                    <div class="padding-login col-md-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('custom.register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label">Nombre<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control input" id="nombre"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido" class="form-label">Apellido Materno<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control input" id="apellido"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="apellido_paterno" class="form-label">Apellido Paterno<span
                                            class="text-danger">*</span></label>
                                    <input type="text"name="middle_name" class="form-control input"
                                        id="apellido_paterno" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="celular" class="form-label">Número de celular<span
                                            class="text-danger">*</span></label>
                                    <input type="tel" name="cell_phone" class="form-control input" id="celular"
                                        placeholder="Ingresa un número de 10 dígitos" pattern="[0-9]{10}" maxlength="10"
                                        required title="El número debe contener 10 dígitos">
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico<span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control input" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmar_email" class="form-label">Confirmar correo electrónico<span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control input" id="confirmar_email" required>
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
                                <ul class="form-text text-muted list-register">
                                    <li class="fw-bold">
                                        Crea una contraseña que incluya al menos:
                                    </li>
                                    <li>
                                        8 caracteres o más
                                    </li>
                                    <li>
                                        Una letra mayúscula A-Z
                                    </li>
                                    <li>
                                        Una letra minúscula a-z
                                    </li>
                                    <li>
                                        Un número

                                    </li>
                                    <li>
                                        Un carácter especial como: = _ * ? ! @ # $ / ( ) { }. , ; :
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terminos" name="terms_accepted"
                                    required>
                                <label class="form-check-label" for="terminos">Estoy de acuerdo con los <span
                                        class="fw-bold">Términos de Uso</span>
                                    y acepto que <span class="fw-bold">Terrazon </span> usará mi información personal
                                    conforme a la <span class="fw-bold">Política de
                                        Privacidad de Terrazon</span>, incluyendo el envío de correos electrónicos
                                    relacionados con
                                    <span class="fw-bold">Terrazon</span> y comunicaciones de mercadeo. La Política de
                                    Privacidad describe mis
                                    derechos, la información que será procesada, cómo se usará y con qué fines.</label>
                            </div>
                            <button type="submit" class="btn-color w-100 text-white">CREAR MI CUENTA</button>
                        </form>
                        <div class="mb-3 mt-3">
                            <div class="row align-items-center">
                                <div class="col text-start">
                                    <div class="label-login">¿Ya tienes una cuenta en Terrazon?</div>

                                </div>
                                <div class="col-auto text-end">
                                    <a href="{{ route('custom.login') }}" id="register" class="label-register"
                                        style=" color: #3830d9;">Inicia sesión aquí</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-6 d-none d-md-block"
                style="background-image: url('{{ asset('images/register.webp') }}'); background-size: cover; background-position: center;">

            </div>

        </div>
    </div>

    <script src="{{ asset('js/app.js') }}?v={{ config('app.version')}}"></script>
    <script src="{{ asset('js/password.js') }}"></script>
</body>

</html>
