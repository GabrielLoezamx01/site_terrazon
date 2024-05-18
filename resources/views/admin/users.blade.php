@extends('layouts.app')
@section('title', 'Usuarios Referidos')
@push('styles')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 3px;
            text-align: left;

            /* border-bottom: 1px solid #094208; */
        }

        th {
            color: white;
            background-color: #37B052;
        }

        tr:hover {
            background-color: #37b05125;
        }

        .bg-status {
            border-radius: 5px;
            padding: 5px;
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid mt-5">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            v-if="mostrarModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Crear Nueva Referencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/usuarios') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email">Nombre Completo</label>
                                <input type="text" placeholder="Ingresa el correo" autocomplete="off"
                                    class="input-terrazon" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Correo electrónico</label>
                                <input type="email" autocomplete="off" placeholder="Ingresa el correo"
                                    class="input-terrazon" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" placeholder="Ingresa la contraseña" autocomplete="off"
                                    class="input-terrazon" name="password" value="{{ old('password') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password2">Confirmar Contraseña</label>
                                <input type="password" placeholder="Ingresa la contraseña" autocomplete="off"
                                    class="input-terrazon" name="password_verify" value="{{ old('password_verify') }}">
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Invitar</button>
                            </div>
                        </form>



                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> --}}
                        {{-- <label for="">Se le enviara un email para su confirmacion</label> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 table-responsive shadow">
                <div class="p-2">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col"> <button class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Crear Nueva
                                    Referencia</button></div>
                            <div class="col">
                                <label for="search">Buscar</label>
                                <input type="search" name="" id="" class="input-terrazon"
                                    placeholder="Ingresa el nombre">
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="mt-5">
                                <caption>Usuarios Registrados</caption>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Fecha de alta</th>
                                        <th>Tiempo de verificacion</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class>
                                    @foreach ($referrals as $item)
                                        <tr>
                                            <td>{{ $item->id_referral }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->verication_code_expiration }}</td>
                                            <td>
                                                @php
                                                    $status = $status[$item->status] ?? [
                                                        'class' => 'border-5 fw-bold text-info',
                                                        'text' => 'Sin estado',
                                                    ];
                                                @endphp
                                                <span class="{{ $status['class'] }}">{{ $status['text'] }}</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm "><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                                                @if ($item->status == 'error')
                                                    <button class="btn btn-sm text-info" title="reenviar codigo"><i
                                                            class="fas fa-envelope"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
