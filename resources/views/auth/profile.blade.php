@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_password') }}" method="POST">
                        @csrf
                        <input type="password" class="form-control mb-3" autocomplete="current-password" required
                            placeholder="Contraseña Actual" name="pass">
                        <input type="password" class="form-control mb-3" autocomplete="new-password" required
                            placeholder="Contraseña Nueva" name="pass_new">
                        <div class="text-center">
                            <button class="btn ">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="page-body">
        @if (session('success') || session('errors'))
            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        @if (session('success'))
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        @endif
                    </div>
                    <div>
                        @if (session('success'))
                            {{ session('success') }}
                        @else
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif


                            <ul>
                                @foreach (session('errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card mx-auto">

                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 rounded"
                            style="background-image: url('{{ asset('img/' . Auth::user()->img) }}')"></span>
                        <h3 class="m-0 mb-1">{{ $auth->name }}</h3>
                        <div class="text-secondary">{{ $auth->email }}</div>
                        <div class="mt-3">
                            <span class="badge bg-purple-lt">Admin</span>
                        </div>
                        <a href="#" class="btn mt-5" data-bs-toggle="modal" data-bs-target="#modal-simple">
                            Cambiar Contraseña
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="p-5"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" placeholder="{{ $auth->name }}"
                                    value="{{ $auth->name }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                                <div class="form-text">Selecciona una foto de perfil.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts2')
@endpush
