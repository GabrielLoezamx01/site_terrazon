@extends('layouts.app')
@section('title', 'Contactos')
@section('content')
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
                        Contactos
                    </div>
                    <h2 class="page-title">
                        {{-- Página Principal --}}
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="row mt-5">
            <div class="col-md-12 shadow">
                <div class="p-5">
                    <p class="fs-1 fw-bold">Usuarios Interesados:</p>
                </div>
                @isset($contacts)
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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                       <div class="m-3 search-box col-5">
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
                            </div>
                    <div id="table-default" class="table-responsive mt-5">

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
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>
                                            <!-- Botón para abrir el modal -->
                                            <button class="btn btn-primary ver-mensaje" data-bs-toggle="modal"
                                                data-bs-target="#mensajeModal{{ $item['id'] }}"
                                                data-mensaje="{{ $item['message'] }}">Ver Mensaje</button>
                                        </td>
                                        <td>
                                            @switch($item['status'])
                                                @case(0)
                                                    <span class="badge bg-blue-lt">No Contactado</span>
                                                @break

                                                @case(1)
                                                    <span class="badge bg-blue-lt">Contactado</span>
                                                @break

                                                @case(2)
                                                    <span class="badge bg-purple-lt">Pendiente de Respuesta</span>
                                                @break

                                                @case(3)
                                                    <span class="badge bg-teal-lt">En Proceso de Negociación</span>
                                                @break

                                                @case(4)
                                                    <span class="badge">Requiere Seguimiento</span>
                                                @break

                                                @case(5)
                                                    <span class="badge bg-green-lt">Contrato Firmado</span>
                                                @break

                                                @case(6)
                                                    <span class="badge bg-red-lt">Cerrado</span>
                                                @break

                                                @default
                                                    <span class="badge bg-yellow-lt">{{ $item['status'] }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <!-- Formulario para actualizar estado -->
                                            <form action="{{ route('contacts.update', ['contact' => $item['id']]) }}"
                                                method="POST" style="display: flex; align-items: center;">
                                                @csrf
                                                @method('PUT')
                                                <select name="opcion" class="form-control">
                                                    <option value="1">Contactado</option>
                                                    <option value="2">Pendiente de Respuesta</option>
                                                    <option value="3">En Proceso de Negociación</option>
                                                    <option value="4">Requiere Seguimiento</option>
                                                    <option value="5">Contrato Firmado</option>
                                                    <option value="6">Cerrado</option>
                                                    <option value="No Contactado">No Contactado</option>
                                                </select>
                                                <button type="submit" class="btn btn-info"
                                                    style="margin-left: 10px;">Actualizar</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal para mostrar el mensaje -->
                                    <div class="modal fade" id="mensajeModal{{ $item['id'] }}" tabindex="-1"
                                        aria-labelledby="mensajeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="mensajeModalLabel">Mensaje</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $item['message'] }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Modal -->
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
