@extends('layouts.app')
@section('title', 'Propiedades Asignadas')
@section('content')
        <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Lista de propiedades
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Propiedades Asignadas</h3>
                        </div>
                        <div class="card-body">
                            <div class="search-box col-5">
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
                            </div>
                            <div id="table-defassult" class="table-responsive mt-5">
                                <table class="table card-table table-vcenter text-nowrap datatable display" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre de usuario</th>
                                            <th>Estado</th>
                                            <th>Propiedades</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['status'] }}</td>
                                                <td>{{ count($item['properties']) }}</td>

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
    </div>

@endsection

@push('scripts2')
@endpush
