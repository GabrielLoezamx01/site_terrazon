@extends('layouts.app')
@section('title', 'Iniciar sesión')
@section('content')
    @push('styles')
        <style>
            .img {
                background-image: url('{{ asset('img/login.jpg') }}');
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    @endpush
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 img d-none d-md-block" style="height: 100vh;">
                <h1 class="fw-bold text-white  text-center">Terrazon MX</h1>
            </div>
            <div class="col-md-6 col-sm-4 col-xs-4">
                <div class="p-5">

                    <form method="POST" class="mt-5" action="{{ route('login') }}">
                        <div class="mt-3 text-center">
                            <h2 class="fw-bold ">Iniciar sesión</h2>
                        </div>
                        @csrf
                        <div class="row mb-3 mt-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="input-terrazon @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="input-terrazon @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">Login</button>
                                {{-- Si necesitas recuperar contraseña --}}
                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
