@extends('layouts.app');
@section('title', 'Lista de Propiedades')
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
@endpush

@section('content')
    <div>
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Overview</div>
                        <h2 class="page-title">Lista de propiedades</h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        {{ $slot ?? '' }}
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body ">

            <div class="container-fluid fade show">
                <div class="row m-4 row-deck row-cards">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Propiedades</h3>
                        </div>
                        <div class=" border-bottom py-3">
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
                            <div class="search-box col-5">
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
                            </div>
                            <div id="table-defassult" class="table-responsive mt-5 h-100">
                                <table class="table card-table " id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Folio</th>
                                            <th class="text-start">Destacado</th>
                                            <th class="text-start">Propiedad</th>
                                            {{-- <th class="text-start">Habitaciones</th>
                                        <th class="text-start">Baños</th>
                                        <th class="text-start">Estacionamiento</th> --}}
                                            <th class="text-start">Detalles</th>
                                            <th class="text-start">Ubicación</th>
                                            <th class="text-start">Precio</th>
                                            <th class="text-start">Estado</th>
                                            <th class="text-start">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($property as $item)
                                            @if (count($item['details']))
                                                <tr class="">
                                                @else
                                                <tr class="  bg-orange-lt" title="No tiene detalles">
                                            @endif
                                            <td class="text-start"><span class="fw-bold">{{ $item->folio }}</span></td>
                                            <td class="text-center">
                                                <property-featured :item-id="{{ $item->id }}"
                                                    :initial-featured="'{{ $item->featured }}'"
                                                    :property-id="{{ $item->id }}"></property-featured>
                                            </td>
                                            <td class="fs-5">{{ $item->title }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info toggle-details">Ver detalles</button>
                                                <div class="details-container mt-3 p-3 bg-light rounded"
                                                    style="display: none;">
                                                    <h6 class="mb-3">Detalles:</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="text-dark"><strong>Habitaciones:</strong>
                                                            {{ $item->rooms }}
                                                        </li>
                                                        <li class="text-dark"><strong>Baños:</strong>
                                                            {{ $item->bathrooms }}
                                                        </li>
                                                        <li class="text-dark"><strong>Estacionamiento:</strong>
                                                            {{ $item->parking }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            {{-- <td class="text-start">{{ $item->rooms }}</td>
                                        <td class="text-start">{{ $item->bathrooms }}</td>
                                        <td class="text-start">{{ $item->parking }}</td> --}}
                                            <td class="text-start">{{ $item->municipality->name }} ,
                                                {{ $item->municipality->state->name }}
                                            </td>
                                            <td class="text-start">${{ number_format($item->price, 0) }}</td>
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
                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        @if ($item->available == 0)
                                                            <a class="dropdown-item" title="Activar Propiedad"
                                                                href="#"
                                                                @click="activeProperty('{{ $item['id'] }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon me-2">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                                                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                                                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                                                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                                                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                                                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                                                    <path d="M9 12l2 2l4 -4" />
                                                                </svg>
                                                                Activar Propiedad
                                                            </a>
                                                        @elseif($item->available == 1)
                                                            <a class="dropdown-item" title="Desactivar Propiedad"
                                                                href="#"
                                                                @click="deactivate_property('{{ $item['id'] }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon me-2">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                                                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                                                                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                                                                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                                                                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                                                                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                                                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                                                                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                                                    <path d="M9 12l2 2l4 -4" />
                                                                </svg>
                                                                Desactivar Propiedad
                                                            </a>
                                                        @endif
                                                        <a class="dropdown-item" title="Editar Propiedad"
                                                            href="{{ route('property.show', ['property' => $item->folio]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon me-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                <path d="M13.5 6.5l4 4" />
                                                            </svg>
                                                            Editar Propiedad
                                                        </a>
                                                        <a class="dropdown-item" title="Detalles"
                                                            href="{{ route('details_property', ['property' => $item->slug]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon me-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M9 6l11 0" />
                                                                <path d="M9 12l11 0" />
                                                                <path d="M9 18l11 0" />
                                                                <path d="M5 6l0 .01" />
                                                                <path d="M5 12l0 .01" />
                                                                <path d="M5 18l0 .01" />
                                                            </svg>
                                                            Detalles
                                                        </a>
                                                        <a class="dropdown-item" title="Galeria de Propiedad"
                                                            href="property_gallery?id={{ $item->folio }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon me-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M4 18v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                                <path d="M7 14l3 -3l2 2l3 -3l2 2" />
                                                            </svg>
                                                            Imagenes
                                                        </a>
                                                        <a class="dropdown-item" title="PDF"
                                                            href="loading_pdf?id={{ $item->folio }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon me-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                                                <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                                                                <path d="M17 18h2" />
                                                                <path d="M20 15h-3v6" />
                                                                <path
                                                                    d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                                                            </svg>
                                                                PDF
                                                        </a>
                                                        <button @click="delete_property('{{ $item->folio }} ')"
                                                            class="dropdown-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon me-2">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                            Eliminar
                                                        </button>
                                                    </div>
                                                </div>
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
                                    @for ($i = 1; $i <= $property->lastPage(); $i++)
                                        <li class="page-item {{ $property->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $property->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

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
    <Toasts ref="toasts"></Toasts>
@endsection
@push('scripts2')
    <script src="{{ asset('js/vue.properties.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-details').click(function() {
                var detailsContainer = $(this).closest('tr').find('.details-container');
                detailsContainer.slideToggle();
            });
        });
    </script>
@endpush
