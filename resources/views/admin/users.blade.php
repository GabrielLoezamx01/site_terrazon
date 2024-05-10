@extends('layouts.app')
@section('title', 'Usuarios Referidos')
@push('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>
@endpush
@push('styles')
    <style>
        table {
            /* border-collapse: collapse; */
            width: 100%;
            border-radius: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;

            /* border-bottom: 1px solid #094208; */
        }

        th {
            color: white;
            background-color: #37B052;
            height: 50px;
        }

        tr:hover {
            background-color: #37b05125;
        }
    </style>
@endpush
@section('content')
    <div id="app">
        <div class="container mt-5">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Crear Nueva Referencia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" placeholder="Ingresa el correo" autocomplete="off"
                                        class="input-terrazon">
                                </div>
                                <div class="mb-3">
                                    <label for="password">Contraseña</label>
                                    <input type="password" placeholder="Ingresa la contraseña" autocomplete="off"
                                        class="input-terrazon">
                                </div>
                                <div class="mb-3">
                                    <label for="password2">Confirmar Contraseña</label>
                                    <input type="password" placeholder="Ingresa la contraseña" autocomplete="off"
                                        class="input-terrazon">
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-dark">Invitar</button>
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
                    <div class="p-5">
                        <div class="">
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Crear Nueva
                                Referencia</button>
                        </div>
                        <table class="mt-5">
                            <thead>
                                <tr>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Fecha de alta</th>
                                    <th>Time Check</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dato 1</td>
                                    <td>Dato 1</td>
                                    <td>Dato 1</td>
                                    <td>Dato 1</td>
                                    <td>
                                        <button class="btn btn-primary">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
