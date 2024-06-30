@extends('layouts.app')
@section('title', 'Lista de Propiedades')
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
@endpush
@section('content')

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" v-if="insertForm"> Insertar Tipo</h5>
                    <h5 v-if="UpdateForm" class="modal-title" id="staticBackdropLabel">Actualizar Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- GUARDAR --}}
                    <form action="{{ url('admin/property') }}" method="POST" enctype="multipart/form-data"
                        v-if="insertForm">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Nombre</label>
                            <input type="text" placeholder="Ingresar el nombre" autocomplete="off" class="form-control"
                                name="name" value="{{ old('name') }}" maxlength="30" required>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-dark">Guardar</button>
                        </div>
                    </form>
                    {{-- ACTUAZLIZAR --}}
                    <form :action="'{{ url('admin/property') }}/' + id" method="POST" v-if="UpdateForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="email">Nombre</label>
                            <input type="text" placeholder="Ingresar el nombre" autocomplete="off" class="form-control"
                                name="name" v-model="name" value="{{ old('name') }}" maxlength="30" required>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-dark">Actualizar</button>
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
    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>¿Está seguro?</h3>
                    <div class="text-secondary">
                        @{{ alert }}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancelar
                                </a></div>
                            <div class="col">

                                <button @click="eliminar" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                    Eliminar
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Lista de propiedades
                    </h2>
                </div>
                <!-- Page title actions -->

                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="col">
                            <a href="new_property" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                </svg>
                                Nueva Propiedad
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Propiedades</h3>
                        </div>
                        <div class="shadow border-bottom py-3">
                            @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success') || session('errors'))
                                <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible"
                                    role="alert">
                                    <div class="d-flex">
                                        <div>
                                            @if (session('success'))
                                                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            @if (session('success'))
                                                {{ session('success') }}
                                            @else
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
                            <div id="table-default" class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable display"
                                    id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="w-1">ID</th>
                                            <th>Folio</th>
                                            <th>Propiedad</th>
                                            <th>Ubicación</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th>Imagen</th>
                                            <th>Fecha de Creación</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($property as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->folio }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->municipality->name }} ,
                                                    {{ $item->municipality->state->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    @switch($item->available)
                                                        @case(1)
                                                            <span class="badge bg-success me-1"></span>
                                                            Disponible
                                                        @break

                                                        @case(2)
                                                            <span class="badge bg-warning me-1"></span>
                                                            Pendiente
                                                        @break

                                                        @case(3)
                                                            <span class="badge bg-primary me-1"></span>
                                                            Vendido
                                                        @break

                                                        @default
                                                            <span class="badge bg-secondary me-1"></span>
                                                            No Disponible
                                                    @endswitch
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('img/' . $item->img) }}" alt=""
                                                        class="img-fluid" style="width: 50px">
                                                </td>
                                                <td><label for=""
                                                        class="text-muted">{{ $item->created_at }}</label>
                                                </td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport" data-bs-toggle="dropdown"
                                                            aria-expanded="false">Opciones</button>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p class="m-0 text-muted">
                                    Showing <span>{{ $property->firstItem() }}</span> to
                                    <span>{{ $property->lastItem() }}</span> of <span>{{ $property->total() }}</span>
                                    entries
                                </p>
                                <ul class="pagination m-0 ms-auto">
                                    @if ($property->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link" tabindex="-1" aria-disabled="true">prev</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $property->previousPageUrl() }}"
                                                rel="prev">prev</a>
                                        </li>
                                    @endif

                                    @foreach ($property as $type)
                                        <li class="page-item {{ $property->currentPage() == $type->id ? 'active' : '' }}">
                                            <a class="page-link"
                                                href="{{ $property->url($type->id) }}">{{ $type->id }}</a>
                                        </li>
                                    @endforeach

                                    @if ($property->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $property->nextPageUrl() }}"
                                                rel="next">next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link" tabindex="-1" aria-disabled="true">next</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts2')
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable({
                info: false,
                paging: false,
                responsive: true,
            });
        });
    </script>
@endpush