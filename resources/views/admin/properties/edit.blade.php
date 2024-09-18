@extends('layouts.app')
@section('title', $property['title'])
@push('scripts')
@endpush
@section('content')

    <div class="page-body">
        <div class="container-xl">
            <div class="row  row-cards  card p-5">
                <div class="col-md-10">
                    <div class="mb-3">
                        <h1 class="fs-1 fw-bold">{{ $property['title'] }} </h1>
                    </div>
                </div>

                @if (session('success') || session('errors'))
                    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible" role="alert">
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
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                <div class="row">
                    <form action="{{ route('property.update', ['property' => $property['folio']]) }}" method="POST"
                        class="form-group">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="fs-2 fw-bold">Informacion de la propiedad</label>
                        </div>
                        <div class="mb-3">
                            <label for="">Nombre de la propiedad</label>
                            <input type="text" class="form-control" required name="name" autocomplete="off"
                                value="{{ $property['title'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Dirreción</label>
                            <input value="{{ $property['address'] }}" autocomplete="off" type="text" class="form-control"
                                required name="address">
                        </div>
                        <div class="mb-3">
                            <label for="">Descripción de la propiedad</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{ $property['description'] }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Link de video</label>
                            <input type="text" name="video" value="{{ $property['video'] }}" class="form-control">
                        </div>
                          <div class="mb-3">
                            <label class="form-label required">Link de tour</label>
                            <input type="text" name="tour" value="{{ $property['tour'] }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">M2</label>
                            <input type="text" autocomplete="off" value="{{ old('m2') ?? $property['m2'] }}"
                                class="form-control" required name="m2">
                        </div>
                        <div class="mb-3">
                            <label for="">Habitaciones</label>
                            <input type="number" autocomplete="off" value="{{ old('rooms') ?? $property['rooms'] }}"
                                class="form-control" required name="rooms">
                        </div>

                        <div class="mb-3">
                            <label for="">Baños</label>
                            <input type="number" autocomplete="off"
                                value="{{ old('bathrooms') ?? $property['bathrooms'] }}" class="form-control" required
                                name="bathrooms">
                        </div>
                        <div class="mb-3">
                            <label for="">Estacionamiento</label>
                            <input type="number" autocomplete="off" class="form-control" required name="parking"
                                value="{{ $property['parking'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Precio</label>
                            <input type="number" autocomplete="off" class="form-control" required name="price"
                                value="{{ old('price') ?? $property['price'] }}">
                        </div>
                        <div class="mb-3">
                            <h3 class="fs-2 fw-bold">Ubicación</h3>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Localidad</label>
                            <select name="municipality" class="form-control">
                                @foreach ($municipality as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $property['municipality']['id'] ? 'selected' : '' }}>
                                        {{ $item->name }}, {{ $item->state->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select name="tipo_location" class="form-control">
                                @foreach ($location as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($property['location_id']) && $item->id == $property['location_id'] ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="">Latitude</label>
                            <input type="number" name="latitude" autocomplete="off" class="form-control"
                                value="{{ $property['latitude'] }}" min="-180" max="180" step="any">
                        </div>
                        <div class="mb-3">
                            <label for="">Longitud</label>
                            <input type="number" name="longitude" autocomplete="off" class="form-control"
                                value="{{ $property['longitude'] }}" min="-180" max="180" step="any">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Amenidades</h3>
                            </div>
                            @php $count = 0; @endphp
                            <div class="col-md-4 mb-3">
                                @foreach ($items['amenities'] as $amenitie)
                                    @if ($count > 0 && $count % 15 == 0)
                            </div> <!-- Cerrar la columna anterior y abrir una nueva -->
                            <div class="col-md-4 mb-3">
                                @endif
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="type-{{ $amenitie['id'] }}"
                                        name="amenities[]" value="{{ $amenitie['id'] }}"
                                        @if ($property['amenities']->contains('id', $amenitie['id'])) checked @endif />
                                    <label class="form-check-label"
                                        for="type-{{ $amenitie['id'] }}">{{ $amenitie['name'] }}</label>
                                </div>
                                @php $count++; @endphp
                                @endforeach
                            </div> <!-- Cerrar la última columna -->
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Tipos</h3>
                            </div>
                            @php $count = 0; @endphp
                            <div class="col-md-4 mb-3">
                                @foreach ($items['types'] as $type)
                                    @if ($count > 0 && $count % 15 == 0)
                            </div> <!-- Cerrar la columna anterior y abrir una nueva -->
                            <div class="col-md-4 mb-3">
                                @endif
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="type-{{ $type['id'] }}"
                                        name="types[]" value="{{ $type['id'] }}"
                                        @if ($property['types']->contains('id', $type['id'])) checked @endif />
                                    <label class="form-check-label"
                                        for="type-{{ $type['id'] }}">{{ $type['name'] }}</label>
                                </div>
                                @php $count++; @endphp
                                @endforeach
                            </div> <!-- Cerrar la última columna -->
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Características de la propiedad</h3>
                            </div>
                            @php $count = 0; @endphp
                            <div class="col-md-4 mb-3">
                                @foreach ($items['feature'] as $featur)
                                    @if ($count > 0 && $count % 15 == 0)
                            </div> <!-- Cerrar la columna anterior y abrir una nueva -->
                            <div class="col-md-4 mb-3">
                                @endif
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="type-{{ $featur['id'] }}"
                                        name="features[]" value="{{ $featur['id'] }}"
                                        @if ($property['features']->contains('id', $featur['id'])) checked @endif />
                                    <label class="form-check-label"
                                        for="type-{{ $type['id'] }}">{{ $featur['name'] }}</label>
                                </div>
                                @php $count++; @endphp
                                @endforeach
                            </div> <!-- Cerrar la última columna -->
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <h3 class="fs-2 fw-bold">Condición de la propiedad</h3>
                            </div>
                            @php $count = 0; @endphp
                            <div class="col-md-4 mb-3">
                                @foreach ($items['conditions'] as $condition)
                                    @if ($count > 0 && $count % 15 == 0)
                            </div> <!-- Cerrar la columna anterior y abrir una nueva -->
                            <div class="col-md-4 mb-3">
                                @endif
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="type-{{ $condition['id'] }}"
                                        name="conditions[]" value="{{ $condition['id'] }}"
                                        @if ($property['conditions']->contains('id', $condition['id'])) checked @endif />
                                    <label class="form-check-label"
                                        for="type-{{ $type['id'] }}">{{ $condition['name'] }}</label>
                                </div>
                                @php $count++; @endphp
                                @endforeach
                            </div> <!-- Cerrar la última columna -->
                        </div>

                        <div class="row mt-3" v-if="defaulview === false">
                            <div class="col-md-12">
                                <button class="btn btn-outline-success w-100">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <hr>
        </div>
    </div>
    </div>
@endsection
@push('scripts2')
@endpush
