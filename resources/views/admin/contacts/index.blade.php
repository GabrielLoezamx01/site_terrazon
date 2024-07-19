@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" /> --}}
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    @endpush
    @push('styles')
        <style>
            .dt-layout-row {
                padding: 20px;
            }

            .dt-input {
                width: 50%;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #000000;
                border-radius: 0.25rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;

            }
        </style>
    @endpush
    {{-- <div class="modal modal-blur fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        @click="saveHome()">Guardar</button>
                </div>
            </div>
        </div>
    </div> --}}
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

            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="row mt-5">
            <div class="col-md-12 shadow">
                <div class="p-5">
                    <p class="fs-1 fw-bold">Usuarios Interesados en Contacto</p>
                </div>
                @isset($contacts)
                    <div id="table-default" class="table-responsive">

                        <table class="table card-table table-vcenter text-nowrap datatable display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Mensaje</th>
                                    <th>Categorías</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $item)
                                    <tr>
                                        <td>
                                            {{ $item['name'] }}
                                        </td>
                                        <td>
                                            {{ $item['email'] }}
                                        </td>
                                        <td>
                                            {{ $item['message'] }}
                                        </td>
                                        <td>
                                            @switch($item['status'])
                                                @case(1)
                                                    <span class="badge bg-blue-lt">No Contactado</span>
                                                @break

                                                @case(2)
                                                    <span class="badge  bg-purple-lt">Contactado</span>
                                                @break

                                                @case(3)
                                                    <span class="badge bg-teal-lt ">Finalizado</span>
                                                @break

                                                @case(0)
                                                    <span class="badge bg-red-lt">Terminado</span>
                                                @break

                                                @case(4)
                                                    <span class="badge  bg-yellow-lt">Pendiente</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                                <button class="btn btn-icon btn-sm  text-blue bg-transparent" title="Categoria">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 4h6v6h-6z" />
                                                        <path d="M14 4h6v6h-6z" />
                                                        <path d="M4 14h6v6h-6z" />
                                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                    </svg>
                                                </button>
                                            <button class="btn btn-icon btn-sm" title="Agregar Notas">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center mt-5 p-5">
                        <p class="m-0 text-muted">
                            Showing <span>{{ $contacts->firstItem() }}</span> to
                            <span>{{ $contacts->lastItem() }}</span> of <span>{{ $contacts->total() }}</span>
                            entries
                        </p>
                        <ul class="pagination m-0 ms-auto">
                            @if ($contacts->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link" tabindex="-1" aria-disabled="true">prev</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $contacts->previousPageUrl() }}" rel="prev">prev</a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                                <li class="page-item {{ $contacts->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $contacts->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($contacts->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $contacts->nextPageUrl() }}" rel="next">next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link" tabindex="-1" aria-disabled="true">next</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endisset

            </div>
        </div>
    </div>
@endsection
@push('scripts2')
    <script src="{{ asset('js/home/contacts.js') }}"></script>
@endpush
