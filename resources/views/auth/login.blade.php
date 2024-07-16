@extends('layouts.app')
@section('title', 'Iniciar sesión')
@section('content')

    <body class=" d-flex flex-column">
        <script src="./dist/js/demo-theme.min.js?1684106062"></script>
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36"
                            alt=""></a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <div class="text-center p-3">
                            <img src="images/logo-terrazon.png" class="img-fluid w-50" alt="">
                        </div>
                        <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input required type="email" id="email"
                                    class="form-control  @error('email') is-invalid @enderror" placeholder="" name="email"
                                    autocomplete="off">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">
                                    Contraseña
                                </label>
                                <div class="input-group input-group-flat">
                                    <input required type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Your password" autocomplete="off">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="form-check-label">Remember me on this device</span>
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100">Sign in</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        b
    </body>
@endsection
