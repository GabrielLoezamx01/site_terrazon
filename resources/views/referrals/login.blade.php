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
</head>

    <body class=" d-flex flex-column">
        <div class="page page-center">
            <div class="container container-tight py-4">

                <div class="card card-md">
                    <div class="card-body">
                        <div class="text-center p-3">
                            <img src="{{ asset('images/logo-terrazon.png') }}" class="img-fluid w-50" alt="">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('auth_referrals') }}" method="POST" autocomplete="off" novalidate>
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

    <script src="{{ asset('js/demo-theme.min.js') }}"></script>
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>

</body>

</html>
