@extends('layouts.app')
@section('title', 'Lista de Propiedades')
@push('scripts')
@endpush
@section('content')
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
                <div class="col-md-12">
                    <div class="mb-3">
                        <h1 class="fs-1 fw-bold">Crear Propiedad</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 g-5">
                        <div v-if="view1">
                            <div v-for="(field,index) in fields" class="mb-3">
                                <div v-if="field.type === 'label'">
                                    <h3 class="fs-2 fw-bold">@{{ field.label }}</h3>
                                </div>
                                <div v-if="field.type === 'text'">
                                    <label class="form-label required">@{{ field.label }}</label>
                                    <input type="text" v-model="field.value"
                                        :class="{ 'form-control': true, 'is-invalid': isFieldEmpty(field.value) && submitted }">
                                </div>
                                <div v-if="field.type === 'checkbox'">
                                    <label class="row">
                                        <label class="col form-label ">@{{ field.label }}</label>
                                        <span class="col-auto">
                                            <label class="form-check form-check-single form-switch">
                                                <input class="form-check-input" v-model="checkbox" type="checkbox">
                                            </label>
                                        </span>
                                    </label>
                                    <div class="mb-3" v-if="view_checbox == true">
                                        <label class="form-label required">Cantidad</label>
                                        <input type="number"
                                            :class="{ 'form-control': true, 'is-invalid': error_input }"v-model="parking"
                                            placeholder="Numero de autos">
                                    </div>
                                </div>
                                <div v-if="field.type === 'number'">
                                    <label class="form-label required">@{{ field.label }}</label>
                                    <input type="number" v-model="field.value"
                                        :class="{ 'form-control': true, 'is-invalid': isFieldEmpty(field.value) && submitted }">
                                </div>
                                <div v-if="field.type === 'textarea'">
                                    <label class="form-label required">@{{ field.label }}</label>
                                    <textarea id="" cols="30" rows="5" v-model="field.value"
                                        :class="{ 'form-control': true, 'is-invalid': isFieldEmpty(field.value) && submitted }"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" @click="validacionRequest">Siguiente</button>
                        </div>

                        <div v-if="view2">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Ubicación</h3>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Localidad</label>
                                <select name="" id="" class="form-control" v-model="municipality">
                                    @foreach ($municipality as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} ,
                                            {{ $item->state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitud</label>
                                <input type="text" class="form-control" v-model="latitude" placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitud</label>
                                <input type="text" class="form-control" v-model="longitud" placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" @click="saveProperty">Siguiente</button>
                            </div>
                        </div>
                          <div v-if="view3">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Amenidades</h3>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Localidad</label>
                                <select name="" id="" class="form-control" v-model="municipality">
                                    @foreach ($municipality as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} ,
                                            {{ $item->state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitud</label>
                                <input type="text" class="form-control" v-model="latitude" placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitud</label>
                                <input type="text" class="form-control" v-model="longitud" placeholder="Numero de baños">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" @click="saveProperty">Guardar</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <hr>
            <div class="row  row-cards  card p-5" v-if="view2">

            </div>
        </div>

    </div>
    </div>
@endsection
@push('scripts2')
    <script src="{{ asset('js/admin/list_property.js') }}"></script>
@endpush
