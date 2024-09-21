@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
@if (!$searchmode)
<div class="banner banner-propiedades"></div>
@endif
<input type="hidden" id="maxRange" name="maxRange" value="{{ $maxRange }}">
<div class="bg-white pt-3 ">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item {{ Request::is('propiedades') ? 'active' : '' }}"><a href="/propiedades" class="{{ Request::is('propiedades') ? 'active' : '' }}">Propiedades</a></li>
                @if (isset($location["id"]))
                <li class="breadcrumb-item active" aria-current="page"><a href='/propiedades?location={{$location["id"]}}' class="active">{{ $location["name"] }}</a></li>
                @endif
            </ol>
        </nav>
        @if (!$searchmode)
        <div class="row">
            <div class="col-12 text-center">
                <h3>¿Dónde quieres comenzar a buscar?</h3>
            </div>
            <div class="col-12 text-center">
                <div class="inline">
                    @foreach ($ubicaciones as $key => $u)
                    <a class="btn btn-outline-secondary" href="/propiedades?order=minprice&location={{$u['id']}}">
                        <div class="d-flex align-items-center">
                            <span>{{$u["name"]}}</span>
                            <i class="ms-1 svg-icon-button {{$u['icon']}}"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            @if (!$searchmode)
            <form action="/propiedades" id="filterForm">
                <input type="hidden" name="order" value="{{ $orderQP }}" id="orderBy">
            </form>
            <div class="col-12 text-left pb-3">
                <div class="title">Top Propiedades</div>
                <div class="description">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
            </div>
            @else
            <div class="col-12 text-left pb-3">
                <div class="title">Resultados de búsqueda</div>
            </div>
            @endif
            <div class="row mb-3">
                <div class="col-6">
                    @if ($searchmode) 
                    <a id="toggleFilters" href="javascript:void(0)" class="text-primary d-none d-md-block">Filtro <i class="bi bi-filter"></i> </a>
                    <a id="toggleFiltersMobile" href="javascript:void(0)" class="text-primary d-md-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Filtro <i class="bi bi-filter"></i> </a>
                    @endif
                </div>
                <div class="col-6 text-end">
                    Ordenar por:
                    <div class="btn-group">
                        <a class="dropdown-toggle dd-order" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if($orderQP=='relevantes')
                            Más relevantes
                            @endif
                            @if($orderQP=='minprice')
                            Menor Precio
                            @endif
                            @if($orderQP=='maxprice')
                            Mayor Precio
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0)" id="orderBy1">Mas relevantes</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" id="orderBy2">Menor Precio</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" id="orderBy3">Mayor Precio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($searchmode)
            <div class="col-3 d-none d-md-block " id="filter">
                <div class="row ">
                    <fieldset class="col-12 my-2 p-3">
                        <legend>{{ $paginationInfo->total() }} Resultados</legend>
                        <form action="/propiedades" id="filterForm">
                            <input type="hidden" id="location" name="location" value="{{ $locationQP }}" id="locationInput">
                            <input type="hidden" name="order" value="{{ $orderQP }}" id="orderBy">
                            <div class="row">
                                <div class="col-12 text-primary mb-3">
                                    <label class="mb-1">Locación</label>
                                    <div class="dropdown">
                                        <button class="form-control dd-select text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-geo-alt text-primary"></i> @if (isset($location["id"])) {{ $location["name"] }} @else Seleccione @endif
                                            <i class="bi bi-chevron-down float-end chevron"></i>
                                        </button>
                                        <ul class="dropdown-menu full">
                                            @foreach ($ubicaciones as $key => $u)
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="submitLocation('{{ $u["id"] }}')"><i class="bi bi-geo-alt text-primary"></i> {{ $u["name"]}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary">Tipo de propiedad</div>
                                        <div class="col-6">
                                            <input type="checkbox" name="allTypes" id="chk_1" value="all"
                                                {{ ($allTypesQP=='all') ? 'checked' : '' }}><label class="fc-text" for="chk_1">Todos</label>
                                        </div>
                                        @foreach ($typesProperties as $key => $tp)
                                        <div class="col-6">
                                            <input id="chktp_{{$tp['id']}}" class="chk_action chk_types" type="checkbox" name="type[]" value="{{$tp['id']}}"
                                                {{ (is_array($typeQP) && in_array($tp['id'],$typeQP)) ? 'checked' : '' }}>
                                            <label class="fc-text" for="chktp_{{$tp['id']}}">{{ $tp["name"]}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary"> Rango de precio MXN</div>
                                        <div class="col-6">
                                            <label>Desde</label>
                                            <label class="form-control" id="budg1" name="budg1" data-type="currency">{{ $budg1 }}</label>
                                        </div>
                                        <div class="col-6">
                                            <label>Hasta</label>
                                            <label class="form-control" id="budg2" name="budg2" data-type="currency">{{ $budg2 }}</label>
                                        </div>
                                        <div class="col-12 mt-4 pe-4">
                                            <input type="hidden" class="form-range" id="budget" name="budget" value="{{ $budget }}">
                                            <div id="slider"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6 text-primary mb-3">
                                    <label>Habitaciones</label>
                                    <select class="form-control select_actions" name="rooms">
                                        <option value="" {{ ($roomsQP=='') ? 'selected' : '' }}>Seleccione</option>
                                        <option value="1" {{ ($roomsQP=='1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($roomsQP=='2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($roomsQP=='3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ ($roomsQP=='4') ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ ($roomsQP=='5') ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ ($roomsQP=='6') ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ ($roomsQP=='7') ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ ($roomsQP=='8') ? 'selected' : '' }}>8</option>
                                        <option value="9" {{ ($roomsQP=='9') ? 'selected' : '' }}>9</option>
                                        <option value="10" {{ ($roomsQP=='10') ? 'selected' : '' }}>10</option>
                                    </select>
                                </div>
                                <div class="col-6 text-primary mb-3">
                                    <label>Baños completos</label>
                                    <select class="form-control select_actions" name="bathrooms">
                                        <option value="" {{ ($bathroomsQP=='') ? 'selected' : '' }}>Seleccione</option>
                                        <option value="1" {{ ($bathroomsQP=='1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($bathroomsQP=='2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($bathroomsQP=='3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ ($bathroomsQP=='4') ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ ($bathroomsQP=='5') ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="col-12 text-primary mb-3">
                                    <label>Estacionamiento para</label>
                                    <select class="form-control select_actions" name="parking">
                                        <option value="" {{ ($parkingQP=='') ? 'selected' : '' }}>Seleccione</option>
                                        <option value="1" {{ ($parkingQP=='1') ? 'selected' : '' }}>1 auto</option>
                                        <option value="2" {{ ($parkingQP=='2') ? 'selected' : '' }}>2 autos</option>
                                        <option value="3" {{ ($parkingQP=='3') ? 'selected' : '' }}>3 autos</option>
                                        <option value="4" {{ ($parkingQP=='4') ? 'selected' : '' }}>4 autos</option>
                                        <option value="5" {{ ($parkingQP=='5') ? 'selected' : '' }}>5 autos</option>
                                    </select>
                                </div>
                                <div class="col-12 text-primary mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary">Condición</div>
                                        @foreach ($conditionsProperty as $key => $cp)
                                        <div class="col-6">
                                            <input class="chk_action" type="checkbox" name="condition[]" value="{{$cp['id']}}" id="chkcp_{{$cp['id']}}"
                                                {{ (is_array($conditionsQp) && in_array($cp['id'],$conditionsQp)) ? 'checked' : '' }}>
                                            <label class="fc-text" for="chkcp_{{$cp['id']}}">{{ $cp["name"]}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 text-primary mb-3">
                                    <div class="col-12 text-primary">Amenidades</div>
                                    <div class="container-amenities">
                                        @foreach ($amenities as $key => $a)
                                        <div class="item">
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <input class="chk_action" type="checkbox" name="amenities[]" value="{{$a['id']}}" id="chka_{{$a['id']}}"
                                                        {{ (is_array($amenitiesQp) && in_array($a['id'],$amenitiesQp)) ? 'checked' : '' }}>
                                                </div>
                                                <div>
                                                    <label class="fc-text" for="chka_{{$a['id']}}">{{ $a["name"]}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
            @endif
            <div id="contentWrapper" class="col-12 @if ($searchmode) col-md-9 @else col-md-12 @endif ">
                <div class="row">
                    @foreach ($results as $index => $card)
                    <div class="results-items col-12 @if ($searchmode) col-md-6 @else col-md-4 @endif d-flex justify-content-center mb-4">
                        <x-card :card="$card" />
                    </div>
                    @endforeach
                </div>
                <div class="row pt-3 px-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination  justify-content-center">
                            {!! $paginationInfo->links('pagination::bootstrap-4') !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@if (!$searchmode)
<div class="py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <div class="row mb-5" data-masonry='{"percentPosition": true }'>
                    <div class="col-6 text-center ">
                        <img src="{{ asset('images/properties/property-1.png') }}" class="property-img" />
                    </div>
                    <div class="col-6 text-center pt-5">
                        <img src="{{ asset('images/properties/property-2.png') }}" class="property-img" />
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{ asset('images/properties/property-3.png') }}" class="property-img-2" />
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 mt-4 ">
                <h1 class="text-center">Ofrecemos la mejor propiedad inmobiliaria para todos.</h1>
                <p>En Terrazon, nos especializamos en ofrecer las mejores propiedades inmobiliarias adaptadas a todos los gustos y necesidades. Nuestro equipo de expertos se dedica a encontrar el hogar perfecto para cada cliente, proporcionando un servicio personalizado y profesional en cada etapa del proceso. Ya sea que busques una casa familiar, un apartamento moderno o una villa de lujo frente al mar, en Terrazon tenemos la opción ideal para ti. Descubre la diferencia de comprar con nosotros y encuentra no solo una propiedad, sino un lugar donde tus sueños pueden hacerse realidad.</p>
                <p class="d-none d-md-block">
                    <button class="btn btn-primary btn-lg my-5 px-5">CONTÁCTANOS</button>
                </p>
            </div>
            <div class="col-6 col-md-3 offset-md-6 order-3 order-md-3">
                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        <div> <i class="svg-icon-2  svg-icon-person "></i></div>
                    </div>
                    <div class="col-8">
                        <div class="title lh-2">1K</div>
                        <div class="subtitle text-secondary fw-400  text-nowrap text-clientes">clientes Satisfechos</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 order-3 order-md-3">
                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        <div><i class="svg-icon-2  svg-icon-star-check"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="title lh-2">2K</div>
                        <div class="subtitle text-secondary fw-400  text-nowrap text-clientes">Propiedades verificadas</div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-block d-md-none order-4">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg my-5 px-5">CONTÁCTANOS</button>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="bg-teal py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 mb-4  offset-md-3 col-md-6 text-center">
                <h1>¿Por qué debería considerarnos para adquirir una propiedad?</h1>
                <small>Comprar una propiedad nunca fue tan fácil.</small>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="text-center"><span class="svg-icon svg-icon-shape"></span></div>
                <div class="title text-center fs-5">Seguimiento durante todo tu proceso de compra.</div>
                <div class="description text-center">El mejor precio del mercado.</div>
            </div>
            <div class="col-12 col-md-4 mb-4  px-md-5">
                <div class="text-center"><span class="svg-icon svg-icon-properties"></span></div>
                <div class="title text-center fs-5">Amplia gama de propiedades</div>
                <div class="description text-center">Ofrecemos ayuda legal experta para todos los artículos inmobiliarios relacionados.</div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="text-center"><span class="svg-icon svg-icon-secure"></span></div>
                <div class="title text-center fs-5">Con la confianza de todos nuestros clientes</div>
                <div class="description text-center">Transparencia y comunicación clara durante
                    todo el proceso.</div>
            </div>
        </div>
    </div>
</div>
@endif
@if(count($viewed)>0)
<div class="bg-white py-5">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Vistos recientemente</div>
            <div class="description">Explora las joyas inmobiliarias que tenemos reservadas para ti.</div>
        </div>
    </div>
    <div class="container-md mobile-conteiner">
        <x-carousel :cards="$viewed" id="viewedSlider" />
    </div>
</div>
@endif
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="text-primary">Filtro <i class="bi bi-filter"></i></label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <fieldset class="col-12 mb-2 p-3">
                        <legend>{{ $paginationInfo->total() }} Resultados</legend>
                        <form action="/propiedades" id="filterForm">
                            <input type="hidden" id="location" name="location" value="{{ $locationQP }}" id="locationInput">
                            <div class="row">
                                <div class="col-12 text-primary mb-3">
                                    <label class="mb-1">Locación</label>
                                    <div class="dropdown">
                                        <button class="form-control dd-select text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-geo-alt text-primary"></i> @if (isset($location["id"])) {{ $location["name"] }} @else Seleccione @endif
                                            <i class="bi bi-chevron-down float-end chevron"></i>
                                        </button>
                                        <ul class="dropdown-menu full">
                                            @foreach ($ubicaciones as $key => $u)
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="submitLocation('{{ $u["id"] }}')"><i class="bi bi-geo-alt text-primary"></i> {{ $u["name"]}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary">Tipo de propiedad</div>
                                        <div class="col-6">
                                            <input type="checkbox" name="allTypes" id="chk_1" value="all"
                                                {{ ($allTypesQP=='all') ? 'checked' : '' }}><label class="fc-text" for="chk_1">Todos</label>
                                        </div>
                                        @foreach ($typesProperties as $key => $tp)
                                        <div class="col-6">
                                            <input id="chktp_{{$tp['id']}}" class="chk_action chk_types" type="checkbox" name="type[]" value="{{$tp['id']}}"
                                                {{ (is_array($typeQP) && in_array($tp['id'],$typeQP)) ? 'checked' : '' }}>
                                            <label class="fc-text" for="chktp_{{$tp['id']}}">{{ $tp["name"]}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary"> Rango de precio MXN</div>
                                        <div class="col-6">
                                            <label>Desde</label>
                                            <label class="form-control" id="mbudg1" name="budg1" data-type="currency">{{ $budg1 }}</label>
                                        </div>
                                        <div class="col-6">
                                            <label>Hasta</label>
                                            <label class="form-control" id="mbudg2" name="budg2" data-type="currency">{{ $budg2 }}</label>
                                        </div>
                                        <div class="col-12 mt-4 pe-4">
                                            <input type="hidden" class="form-range" id="mbudget" name="budget" value="{{ $budget }}">
                                            <div id="sliderMobile"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6 text-primary mb-3">
                                    <label>Habitaciones</label>
                                    <select class="form-control select_actions" name="rooms">
                                        <option value="" {{ ($roomsQP=='') ? 'selected' : '' }}>Seleccione</option>
                                        <option value="1" {{ ($roomsQP=='1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($roomsQP=='2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($roomsQP=='3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ ($roomsQP=='4') ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ ($roomsQP=='5') ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ ($roomsQP=='6') ? 'selected' : '' }}>6</option>
                                        <option value="7" {{ ($roomsQP=='7') ? 'selected' : '' }}>7</option>
                                        <option value="8" {{ ($roomsQP=='8') ? 'selected' : '' }}>8</option>
                                        <option value="9" {{ ($roomsQP=='9') ? 'selected' : '' }}>9</option>
                                        <option value="10" {{ ($roomsQP=='10') ? 'selected' : '' }}>10</option>
                                    </select>
                                </div>
                                <div class="col-6 text-primary mb-3">
                                    <label>Baños completos</label>
                                    <select class="form-control select_actions" name="bathrooms">
                                        <option value="" {{ ($bathroomsQP=='') ? 'selected' : '' }}>Seleccione</option>
                                        <option value="1" {{ ($bathroomsQP=='1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($bathroomsQP=='2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($bathroomsQP=='3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ ($bathroomsQP=='4') ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ ($bathroomsQP=='5') ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="col-12 text-primary mb-3">
                                    <label>Estacionamiento para</label>
                                    <select class="form-control select_actions" name="parking">
                                        <option value="" {{ ($parkingQP=='') ? 'selected' : '' }}>Seleccione</option>
                                        <option value="1" {{ ($parkingQP=='1') ? 'selected' : '' }}>1 auto</option>
                                        <option value="2" {{ ($parkingQP=='2') ? 'selected' : '' }}>2 autos</option>
                                        <option value="3" {{ ($parkingQP=='3') ? 'selected' : '' }}>3 autos</option>
                                        <option value="4" {{ ($parkingQP=='4') ? 'selected' : '' }}>4 autos</option>
                                        <option value="5" {{ ($parkingQP=='5') ? 'selected' : '' }}>5 autos</option>
                                    </select>
                                </div>
                                <div class="col-12 text-primary mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary">Condición</div>
                                        @foreach ($conditionsProperty as $key => $cp)
                                        <div class="col-6">
                                            <input class="chk_action" type="checkbox" name="condition[]" value="{{$cp['id']}}" id="chkcp_{{$cp['id']}}"
                                                {{ (is_array($conditionsQp) && in_array($cp['id'],$conditionsQp)) ? 'checked' : '' }}>
                                            <label class="fc-text" for="chkcp_{{$cp['id']}}">{{ $cp["name"]}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 text-primary mb-3">
                                    <div class="row">
                                        <div class="col-12 text-primary">Amenidades</div>
                                        <div class="container-amenities">
                                            @foreach ($amenities as $key => $a)
                                            <div class="item">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <input class="chk_action" type="checkbox" name="amenities[]" value="{{$a['id']}}" id="chka_{{$a['id']}}"
                                                            {{ (is_array($amenitiesQp) && in_array($a['id'],$amenitiesQp)) ? 'checked' : '' }}>
                                                    </div>
                                                    <div>
                                                        <label class="fc-text" for="chka_{{$a['id']}}">{{ $a["name"]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/properties.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
@endpush