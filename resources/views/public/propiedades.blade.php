@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
@if (!$searchmode)
<div class="banner banner-propiedades"></div>
@endif
<div class="bg-white pt-3 ">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/propiedades">Propiedades</a></li>
                @if (isset($location["id"]))
                <li class="breadcrumb-item active" aria-current="page"><a href='/propiedades?location={{$location["id"]}}' class="active">{{ $location["name"] }}</a></li>
                @endif
            </ol>
        </nav>

        <div class="row">
            @if (!$searchmode)
            <div class="row">
                <div class="col-12 text-center">
                    <h3>¿Donde quieres comenzar a buscar?</h3>
                </div>
                <div class="col-12 text-center">
                    <div class="inline">
                        @foreach ($ubicaciones as $key => $u)
                        <a class="btn btn-outline-secondary" href="/propiedades?location={{$u['id']}}">
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
                <div class="col-12 text-left pb-3">
                    <div class="title">Top Propiedades </div>
                    <div class="description">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
                </div>
                @else
                <div class="col-12 text-left pb-3">
                    <div class="title">Resultados de búsqueda </div>
                </div>
                @endif
            </div>
            <div class="col-3 d-none pt-5" id="filter">
                <div class="row ">
                    <div class="col-4 text-start py-4 d-flex align-items-center">
                        <a id="toggleFilters2" href="javascript:void(0)" class="text-primary d-none d-md-block">Filtro <i class="bi bi-filter"></i> </a>
                    </div>
                    <div class="col-8 text-end py-4">
                        <button class="btn btn-sm btn-primary">LIMPIAR SELECCIÓN</button>
                    </div>
                    <fieldset class="col-12 my-2 p-3">
                        <legend>{{ $paginationInfo->total() }} Resultados</legend>
                        <div class="row">
                            <div class="col-12 text-primary mb-3">
                                <label class="mb-1">Locación</label>
                                <div class="dropdown">
                                    <button class="form-control dd-select text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-geo-alt text-primary"></i> @if (isset($location["id"])) {{ $location["name"] }} @endif
                                        <i class="bi bi-chevron-down float-end chevron"></i>
                                    </button>
                                    <ul class="dropdown-menu full">
                                        @foreach ($ubicaciones as $key => $u)
                                        <li><a class="dropdown-item" href="/propiedades?location={{ $u['id'] }}"><i class="bi bi-geo-alt text-primary"></i> {{ $u["name"]}}</a></li>
                                        @endforeach

                                        <!-- <li><a class="dropdown-item" href="#"><i class="bi bi-geo-alt text-primary"></i> En la ciudad</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 text-primary">Tipo de propiedad</div>
                                    <div class="col-6">
                                        <input type="checkbox" id="chk_1"><label class="fc-text" for="chk_1">Todos</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" id="chk_2"><label class="fc-text" for="chk_2">Departamentos</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" id="chk_3"><label class="fc-text" for="chk_3">Casa</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" id="chk_4"><label class="fc-text" for="chk_4">Terreno</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" id="chk_5"><label class="fc-text" for="chk_5">Townhouse</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="checkbox" id="chk_6"><label class="fc-text" for="chk_6">Local comercial</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 text-primary"> Rango de precio MXN</div>
                                    <div class="col-6">
                                        <label>Desde</label>
                                        <input class="form-control" type="text" value="$600,000">
                                    </div>
                                    <div class="col-6">
                                        <label>Hasta</label>
                                        <input class="form-control" type="text" value="$20,000,000">
                                    </div>
                                    <div class="col-12">
                                        <input type="range" class="form-range" id="customRange1">
                                        <span class="float-start text-muted range-text">$600,000</span>
                                        <span class="float-end text-muted range-text">$20,000,000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-primary mb-3">
                                <label>Habitaciones</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                            <div class="col-6 text-primary mb-3">
                                <label>Baños completos</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-12 text-primary mb-3">
                                <label>Estacionamiento para</label>
                                <select class="form-control">
                                    <option>1 auto</option>
                                    <option>2 autos</option>
                                    <option>3 autos</option>
                                    <option>4 autos</option>
                                    <option>5 autos</option>
                                </select>
                            </div>
                            <div class="col-12 text-primary mb-3">
                                <div class="row">
                                    <div class="col-12 text-primary">Condición</div>
                                    <div class="col-12">
                                        <input type="checkbox" id="chk_7"><label class="fc-text" for="chk_7">Nueva</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" id="chk_8"><label class="fc-text" for="chk_8">Excelentes condiciones</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" id="chk_9"><label class="fc-text" for="chk_9">Necesita remodelacion</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 text-primary mb-3">
                                <div class="row">
                                    <div class="col-12 text-primary">Amenidades</div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_7"><label class="fc-text" for="chk_7">AC</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_8"><label class="fc-text" for="chk_8">Estacionamiento</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_9"><label class="fc-text" for="chk_9">Cocina</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_10"><label class="fc-text" for="chk_10">Piscina</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_11"><label class="fc-text" for="chk_11">Areas verdes comunes</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_12"><label class="fc-text" for="chk_12">Lavaplatos</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_13"><label class="fc-text" for="chk_13">Gimnacio Privado</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_14"><label class="fc-text" for="chk_14">Terraza</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_15"><label class="fc-text" for="chk_15">Antecomedor</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_16"><label class="fc-text" for="chk_16">Asador</label>
                                    </div>
                                    <div class="col-6 d-flex flex-nowrap">
                                        <input type="checkbox" id="chk_17"><label class="fc-text" for="chk_17">Seguridad privada</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="contentWrapper" class="col-12">
                <div class="row">
                    @if ($searchmode)
                    <div class="col-6 text-primary">
                        <div id="filter-desktop">
                            <a id="toggleFilters" href="javascript:void(0)" class="text-primary d-none d-md-block">Filtro <i class="bi bi-filter"></i> </a>
                            <a id="toggleFiltersMobile" href="javascript:void(0)" class="text-primary d-md-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Filtro <i class="bi bi-filter"></i> </a>
                        </div>
                    </div>
                    @endif
                    @if (!$searchmode)
                    <div class="col-12 text-end ">Ordenar por:
                        @else
                        <div class="col-6 text-end ">Ordenar por:
                            @endif
                            <div class="btn-group">
                                <a class="dropdown-toggle dd-order" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    mas relevantes
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/propiedades?order=relevantes">Mas relevantes</a></li>
                                    <li><a class="dropdown-item" href="/propiedades?order=minprice">Menor Precio</a></li>
                                    <li><a class="dropdown-item" href="/propiedades?order=maxprice">Mayor Precio</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($cards1 as $index => $card)
                        <div class="results-items col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
                            <x-card :card="$card" />
                        </div>
                        @endforeach
                    </div>
                    <div class="row pt-3 px-3">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination  justify-content-center">
                                {!! $paginationInfo->links('pagination::bootstrap-4') !!}
                                <!-- <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-arrow-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="bi bi-arrow-right"></i></a>
                                </li> -->
                            </ul>
                        </nav>
                    </div> 
                </div>
            </div>
        </div>
    </div>
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
                        <div class="col-3 d-flex align-items-center">
                            <i class="svg-icon  svg-icon-person "></i>
                        </div>
                        <div class="col-9">
                            <div class="title">1K</div>
                            <div class="subtitle text-secondary fw-400 fs-6 text-nowrap">clientes Satisfechos</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 order-3 order-md-3">
                    <div class="row">
                        <div class="col-3  d-flex align-items-center">
                            <i class=" svg-icon  svg-icon-star-check"></i>
                        </div>
                        <div class="col-9">
                            <div class="title">2K</div>
                            <div class="subtitle text-secondary fw-400 fs-6 text-nowrap">Propiedades verificadas</div>
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
    <div class="bg-white pt-3 pb-4">
        <div class="container">
            <div>
                <div class="col-12 text-left pb-3">
                    <div class="title">Propiedades destacadas en la ciudad</div>
                    <div class="description">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
                </div>
                <x-carousel :cards="$cards1" id="carr1" />
            </div>
        </div>
    </div>
    <!-- MODAL DE FILTRO -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="text-primary">Filtro <i class="bi bi-filter"></i></label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            320 Resultados
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-primary">LIMPIAR</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-primary mb-3">
                            <label class="mb-1">Locación</label>
                            <div class="dropdown">
                                <button class="form-control dd-select text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-geo-alt text-primary"></i> En la playa
                                    <i class="bi bi-chevron-down float-end chevron"></i>
                                </button>
                                <ul class="dropdown-menu full">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-geo-alt text-primary"></i> En la playa</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-geo-alt text-primary"></i> En la ciudad</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 text-primary">Tipo de propiedad</div>
                                <div class="col-6">
                                    <input type="checkbox" id="mchk_1"><label class="fc-text" for="mchk_1">Todos</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" id="mchk_2"><label class="fc-text" for="mchk_2">Departamentos</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" id="mchk_3"><label class="fc-text" for="mchk_3">Casa</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" id="mchk_4"><label class="fc-text" for="mchk_4">Terreno</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" id="mchk_5"><label class="fc-text" for="mchk_5">Townhouse</label>
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" id="mchk_6"><label class="fc-text" for="mchk_6">Local comercial</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 text-primary"> Rango de precio MXN</div>
                                <div class="col-6">
                                    <label>Desde</label>
                                    <input class="form-control" type="text" value="$600,000">
                                </div>
                                <div class="col-6">
                                    <label>Hasta</label>
                                    <input class="form-control" type="text" value="$20,000,000">
                                </div>
                                <div class="col-12">
                                    <input type="range" class="form-range" id="customRange1">
                                    <span class="float-start text-muted range-text">$600,000</span>
                                    <span class="float-end text-muted range-text">$20,000,000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-primary mb-3">
                            <label>Habitaciones</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="col-6 text-primary mb-3">
                            <label>Baños completos</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-12 text-primary mb-3">
                            <label>Estacionamiento para</label>
                            <select class="form-control">
                                <option>1 auto</option>
                                <option>2 autos</option>
                                <option>3 autos</option>
                                <option>4 autos</option>
                                <option>5 autos</option>
                            </select>
                        </div>
                        <div class="col-12 text-primary mb-3">
                            <div class="row">
                                <div class="col-12 text-primary">Condición</div>
                                <div class="col-12">
                                    <input type="checkbox" id="mchk_7"><label class="fc-text" for="mchk_7">Nueva</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" id="mchk_8"><label class="fc-text" for="mchk_8">Excelentes condiciones</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" id="mchk_9"><label class="fc-text" for="mchk_9">Necesita remodelacion</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 text-primary mb-3">
                            <div class="row">
                                <div class="col-12 text-primary">Amenidades</div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_10"><label class="fc-text" for="mchk_10">AC</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_11"><label class="fc-text" for="mchk_11">Estacionamiento</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_12"><label class="fc-text" for="mchk_12">Cocina</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_13"><label class="fc-text" for="mchk_13">Piscina</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_14"><label class="fc-text" for="mchk_14">Areas verdes comunes</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_14"><label class="fc-text" for="mchk_14">Lavaplatos</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_15"><label class="fc-text" for="mchk_15">Gimnacio Privado</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_16"><label class="fc-text" for="mchk_16">Terraza</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_17"><label class="fc-text" for="mchk_17">Antecomedor</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_18"><label class="fc-text" for="mchk_18">Asador</label>
                                </div>
                                <div class="col-6 d-flex flex-nowrap">
                                    <input type="checkbox" id="mchk_19"><label class="fc-text" for="mchk_19">Seguridad privada</label>
                                </div>
                            </div>
                        </div>
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