@extends('layouts.app')
@section('title', 'Tipos')
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
@endpush
@section('content')

    <div class="modal modal-blur fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" v-if="insertForm"> Insertar Tipo</h5>
                    <h5 v-if="UpdateForm" class="modal-title" id="staticBackdropLabel">Actualizar Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- GUARDAR --}}
                    <form action="{{ url('admin/types') }}" method="POST" enctype="multipart/form-data" v-if="insertForm">
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
                    <form :action="'{{ url('admin/types') }}/' + id" method="POST" v-if="UpdateForm"
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
                        Lista de Tipos
                    </h2>
                </div>
                <!-- Page title actions -->

                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="col"> <button class="btn btn-dark" @click="showModal(false)">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M9 12h6" />
                                    <path d="M12 9v6" />
                                </svg>
                                Nueva
                                Tipo</button></div>

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
                            <h3 class="card-title">Tipos</h3>
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
                                            <th class="w-1">Id</th>
                                            <th>Nombre</th>
                                            <th>Fecha de creacion</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($types as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                </td>
                                                <td><label for=""
                                                        class="text-muted">{{ $item->created_at }}</label>
                                                </td>
                                                <td>
                                                    <button @click="showModal(true , {{ $item->id }})"
                                                        class="btn btn-sm btn-icon "><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                            <path d="M13.5 6.5l4 4" />
                                                        </svg></button>
                                                    <button @click="deleteshow({{ $item->id }})"
                                                        class="btn btn-sm text-danger btn-icon" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p class="m-0 text-muted">
                                    Showing <span>{{ $types->firstItem() }}</span> to
                                    <span>{{ $types->lastItem() }}</span> of <span>{{ $types->total() }}</span>
                                    entries
                                </p>
                                <ul class="pagination m-0 ms-auto">
                                    @if ($types->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link" tabindex="-1" aria-disabled="true">prev</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $types->previousPageUrl() }}"
                                                rel="prev">prev</a>
                                        </li>
                                    @endif
                                      @for ($i = 1; $i <= $types->lastPage(); $i++)
                                        <li class="page-item {{ $types->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link"
                                                href="{{ $types->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($types->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $types->nextPageUrl() }}"
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
    <script src="{{ asset('js/admin/types.js') }}"></script>
@endpush
