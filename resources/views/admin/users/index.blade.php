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
                    Crear Usuario
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Ingrese los datos para crear un nuevo usuario</h5>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" required placeholder="ejemplo@dominio.com">
                                <div id="emailHelp" class="form-text">Se enviará un correo con la contraseña temporal.</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Crear Usuario</button>
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
