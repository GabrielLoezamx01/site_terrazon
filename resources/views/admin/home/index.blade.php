@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="modal modal-blur fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Opciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" required placeholder="Nombre" v-model="input.name" />
                    </div>
                    <div class="mb-3">
                        <textarea v-model="input.span" id="" cols="30" rows="10" class="form-control">
                            @{{ input.span }}
                        </textarea>
                    </div>
                    <div class="mb-3 text-center p-4">
                        <button class="btn btn-primary" v-if="btnUpdate" @click="updateData">OK</button>
                        <button class="btn btn-primary" v-if="btnSave" @click="saveData">Guardar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-full-width" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-full-width modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lista de propiedades</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <p class="fw-light fs-3"> Seleccionados : @{{ selectedFolios.join(', ') }}</p>
                    </div>
                    <div>
                        <input type="text" v-model="searchQuery" placeholder="Buscar por folio o nombre"
                            class="form-control mb-3" />
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Nombre</th>
                                    <th>Ubicación</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in filteredProperties" :key="index">
                                    <td>@{{ item.folio }}</td>
                                    <td>@{{ item.title }}</td>
                                    <td>@{{ item.municipality.name }}, @{{ item.municipality.state.name }}</td>
                                    <td>@{{ item.price }}</td>
                                    <td>
                                        <input type="checkbox" @change="updateSelectedFolios(item, $event)"
                                            :checked="isHomeSelected(item.folio)" />
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="saveHome()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Resumen
                    </div>
                    <h2 class="page-title">
                        Página Principal
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <button class="btn btn-dark" @click="showModal(true)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M9 12h6" />
                                <path d="M12 9v6" />
                            </svg>
                            Nueva sesión
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <a href="/" target="_blank">Ver página principal</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 shadow p-5">
                <div>
                    <p class="fs-1 fw-bold">Detalles del sitio</p>
                </div>
                @isset($home)
                    <div class="row p-5">
                        <div class="col">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div id="table-default" class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Sub titulo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($home as $item)
                                    <tr>
                                        <td>
                                            {{ $item['name'] }}
                                        </td>
                                        <td>
                                            {{ $item['span'] }}
                                        </td>
                                        <td>
                                            <button @click="properyModal('{{ $item['id'] }}')"
                                                class="btn btn-success btn-icon btn-sm" title="Añadir Propiedades">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-home">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                                                </svg>
                                            </button>
                                            <button @click="showHome('{{ $item['id'] }}')"
                                                class="btn btn-info btn-icon btn-sm" title="Editar Contenido">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </button>
                                            <button @click="deleteHome('{{ $item['id'] }}')"
                                                class="btn btn-danger btn-icon btn-sm" title="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endisset

            </div>
        </div>
    </div>
@endsection
@push('scripts2')
    <script src="{{ asset('js/home/index.js') }}"></script>
@endpush
