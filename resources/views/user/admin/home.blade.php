@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_custom.css') }}">
@endpush
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="d-none d-md-block">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('custom/home') }}">Mi cuenta</a></li>
            </ol>
        </nav>
        <div class="row g-0">
            {{-- <div class="col-md-12 d-md-none order-1 bg-white"> --}}
            @include('user.admin.sidebar_mobile')
            {{-- </div> --}}
            <div class="col-md-3 d-none d-md-block order-md-1">
                @include('user.admin.sidebar')
            </div>
            <!-- Main content -->
            <div class="col-md-9 bg-white order-2">
                <div class="m-3">
                    <h2 class="sub-title mt-4">
                        Perfil de usuario
                    </h2>
                    @include('user.admin.alerts')
                    <form method="POST" action="{{ route('update_profile') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3 mt-5">
                                    <label for="name" class="label-form">Nombre*</label>
                                    <input required type="text" name="first_name" class="form-control input"
                                        placeholder="Nombre de usuario"
                                        value="{{ Auth::guard('custom_users')->user()->first_name }}">
                                </div>
                                <div class="mb-3 mt-5">
                                    <label for="email" class="label-form">Correo electrónico*</label>
                                    <input required type="text" name="email" class="form-control input"
                                        placeholder="Correo usuario"
                                        value="{{ Auth::guard('custom_users')->user()->email }}">
                                </div>
                                <div class="mb-3 mt-5">
                                    <label for="password" class="label-form">Contraseña*</label>
                                    <input type="text" name="password" class="form-control input"
                                        placeholder="Contraseña usuario">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 mt-5">
                                    <label for="name" class="label-form">Apellido Paterno*</label>
                                    <input required type="text" name="last_name" class="form-control input"
                                        placeholder="Nombre de usuario"
                                        value="{{ Auth::guard('custom_users')->user()->last_name }}">
                                </div>
                                <div class="mb-3 mt-5">
                                    <label for="name" class="label-form">Apellido Materno*</label>
                                    <input required type="text" name="middle_name" class="form-control input"
                                        placeholder="Nombre de usuario"
                                        value="{{ Auth::guard('custom_users')->user()->middle_name }}">
                                </div>

                            </div>
                            <div class="col-md-12">
                                {{-- <div class="text-start">
                                    <span class="privacy-link mt-5">
                                        Consulta nuestro <a href="#">Aviso de Privacidad</a>
                                    </span>
                                </div> --}}
                                <div class="d-flex flex-column flex-md-row justify-content-md-end gap-3 m-5">
                                    <button type="button" onclick="location.href=''" class="btn  cancel-btn">
                                        CANCELAR
                                    </button>
                                    <button type="submit" class="btn save-btn">
                                        GUARDAR
                                    </button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="p-5">
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('js/home.js') }}?v={{ config('app.version') }}"></script>
@endpush
