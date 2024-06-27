@extends('layouts.app')
@section('title', 'Lista de Propiedades')
@push('scripts')
@endpush
@section('content')
    @if (session()->has('property_id'))
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 bg-warning p-3 rounded">
                    <p class="mb-3">Hay una o varias propiedades creadas que necesita ajustes adicionales.</p>
                    <div class="text-center">
                        <a href="continue_create" class="btn btn-success w-50">
                            Continuar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal modal-blur fade" id="modal-success" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-success"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                        </svg>
                        <h3>@{{ message }}</h3>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="continue_create" class="btn btn-success w-100"
                                        data-bs-dismiss="modal">
                                        Continuar
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header d-print-none">

        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row  row-cards  card p-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Crear Propiedad</h3>
                            </div>
                        </div>
                        <div class="col-md-6 g-5">
                            <div class="mb-3">
                                <label class="form-label">Nombre de la propiedad</label>
                                <input type="text" class="form-control" v-model="name" placeholder="Ingresa el nombre">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" v-model="address"
                                    placeholder="Ingresa la Dirección">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción de la propiedad</label>
                                <textarea class="form-control" id="" cols="30" rows="5" v-model="description"
                                    placeholder="Ingresa la descripción"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Habitaciones</label>
                                <input type="number" class="form-control" v-model="rooms"
                                    placeholder="Numero de habitaciones">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Baños</label>
                                <input type="number" class="form-control" v-model="bathrooms"
                                    placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <label class="row">
                                    <span class="col">Estacionamiento</span>
                                    <span class="col-auto">
                                        <label class="form-check form-check-single form-switch">
                                            <input class="form-check-input" v-model="checkbox" type="checkbox">
                                        </label>
                                    </span>
                                </label>
                            </div>
                            <div class="mb-3" v-if="view_checbox">
                                <label class="form-label">Cantidad</label>
                                <input type="number" class="form-control" v-model="parking" placeholder="Numero de autos">
                            </div>
                        </div>
                        <div class="col-md-6 g-5">
                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" step="0.01" class="form-control" v-model="price"
                                    placeholder="Ingresa el precio de la propiedad">
                            </div>
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Ubicación</h3>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Localidad</label>
                                <select name="" id="" class="form-control" v-model="municipality">
                                    @foreach ($municipality as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} , {{ $item->state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitud</label>
                                <input type="text" class="form-control" v-model="latitude"
                                    placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitud</label>
                                <input type="text" class="form-control" v-model="longitud"
                                    placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" @click="saveProperty">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif

@endsection
@push('scripts2')
    <script src="{{ asset('js/admin/list_property.js') }}"></script>
@endpush
