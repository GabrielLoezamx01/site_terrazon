@extends('layouts.app')
@section('title', 'Usuarios Referidos')

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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 table-responsive shadow">
                <div class="p-5">
                    <div class="">
                        <button class="btn btn-dark">Crear Nueva Referencia</button>
                    </div>
                    <table class="mt-5">
                        <thead>
                            <tr>
                                <th>Correo</th>
                                <th>Fecha de alta</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
@endsection
