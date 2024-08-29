@extends('layouts.app')
@section('title', 'Crear Usuario')
@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Usuarios
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">

        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-center">Crear un nuevo usuario</h5>
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            placeholder="ejemplo@dominio.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pass" class="form-label">Contraseña</label>
                                        <input type="password" name="pass" id="pass" class="form-control" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Crear Usuario</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('scripts2')
    <script>
        // Puedes agregar funcionalidades dinámicas aquí
    </script>
@endpush
