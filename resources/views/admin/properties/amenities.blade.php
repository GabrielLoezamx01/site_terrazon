@extends('layouts.app')
@section('title', 'Amenidades')
@section('content')
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        v-if="mostrarModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Nueva Referencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/amenidades') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Nombre</label>
                            <input type="text" placeholder="Ingresa el correo" autocomplete="off" class="form-control"
                                name="name" value="{{ old('name') }}" maxlength="30">
                        </div>
                        <div class="mb-3">
                            <label for="email">Icon</label>
                            <input type="file" autocomplete="off" placeholder="Ingresa el archivo SVG"
                                class="form-control" name="svg" value="{{ old('svg') }}">
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-dark" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Guardar</button>
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
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Lista de Amenidades
                    </h2>
                </div>
                <!-- Page title actions -->

                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="col"> <button class="btn btn-dark" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16v6" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                </svg>
                                Nueva
                                Amenidad</button></div>

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
                            <h3 class="card-title">Amenidades</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="8"
                                            size="3" aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
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

                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">Id</th>
                                        <th>Nombre</th>
                                        <th>icon</th>
                                        <th>Fecha de creacion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenities as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ asset('storage/svg/' . $item->icon) }}" alt="Icon"></td>
                                            <td><label for="" class="text-muted">{{ $item->created_at }}</label>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm "><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                        <path d="M13.5 6.5l4 4" />
                                                    </svg></button>
                                                <button class="btn btn-sm text-danger"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                Showing <span>{{ $amenities->firstItem() }}</span> to
                                <span>{{ $amenities->lastItem() }}</span> of <span>{{ $amenities->total() }}</span>
                                entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <!-- Botón de página anterior -->
                                @if ($amenities->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link" tabindex="-1" aria-disabled="true">prev</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $amenities->previousPageUrl() }}"
                                            rel="prev">prev</a>
                                    </li>
                                @endif

                                <!-- Enlaces de páginas -->
                                @foreach ($amenities as $amenity)
                                    <li
                                        class="page-item {{ $amenities->currentPage() == $amenity->id ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $amenities->url($amenity->id) }}">{{ $amenity->id }}</a>
                                    </li>
                                @endforeach

                                <!-- Botón de página siguiente -->
                                @if ($amenities->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $amenities->nextPageUrl() }}"
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
@endsection
