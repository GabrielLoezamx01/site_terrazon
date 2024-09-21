@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
<div class="bg-white pb-1">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/propiedades">Propiedades</a></li>
                @isset($property->types[0])
                <li class="breadcrumb-item"><a href="/propiedades?type[]={{ $property->types[0]->id}}">{{ $property->types[0]->name}}</a></li>
                @endisset
                <li class="breadcrumb-item active" aria-current="page">{{ $sku }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="mt-1">
    <div class="container pb-5">
        <div class="mb-1">
            <a href="{{ url()->previous() }}" class="text-decoration-none text-primary"><i class="bi bi-arrow-left"></i> Volver </a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 mb-4">
                <div class="card box-shadow  bg-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <h3 class="ficha-title">{{ $property->title }}</h3>
                            </div>
                            <div class="col-12">
                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators d-none d-lg-flex">
                                        @foreach($galery as $item)
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $item['id'] }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="{{ $item['label'] }}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner gallery" id="gallery-property">
                                        @foreach($galery as $item)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <a href="{{$item['imageUrl']}}">
                                                <div class="ficha-carouser-img" style="background: url({{  $item['imageUrl'] }});"></div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <!-- Thumbnails -->
                                <div class="carousel-thumbnails mt-4  d-none d-lg-flex">
                                    <div class="car-nav car-back" id="carr1_back">
                                        <span class="icon-nav fa-stack fa-2x">
                                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                                            <i class="fa-solid fa-chevron-left fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="car-nav car-next" id="carr1_next">
                                        <span class="icon-nav fa-stack fa-2x">
                                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                                            <i class="fa-solid fa-chevron-right fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="owl-carousel owl-theme" id="carr1">
                                        @foreach($galery as $k => $item)
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-{{$k}}" class="{{ $loop->first ? 'selected' : '' }}" data-bs-slide-to="{{ $k }}" data-bs-target="#carouselExampleCaptions">
                                                <div class="carousel-img-thumb" style="background: url({{  $item['imageUrl'] }});"></div>
                                            </a>
                                        </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ficha-nav d-flex ">
                                    <div class="list-item cursor" data-bs-toggle="modal" data-bs-target="#locationModal">
                                        <span class="svg-icon-ficha svg-icon-location d-none d-lg-block"></span><span class="d-none d-lg-block">Ver en </span>Mapa
                                    </div>
                                    <div class="list-item cursor" data-bs-toggle="modal" data-bs-target="#distributionModal">
                                        <span class="svg-icon-ficha svg-icon-distribution d-none d-lg-block"></span><span class="d-none d-lg-block">Ver </span>Distribución
                                    </div>
                                    <div class="list-item cursor" data-bs-toggle="modal" data-bs-target="#tourModal">
                                        <span class="svg-icon-ficha svg-icon-360-degrees d-none d-lg-block"></span> Tour Virtual
                                    </div>
                                    <div class="list-item cursor" data-bs-toggle="modal" data-bs-target="#videoModal">
                                        <span class="svg-icon-ficha svg-icon-video d-none d-lg-block"></span> Video
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row pt-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <h2 class="ficha-price text-nowrap">$ {{ number_format($property->price,2,'.',',') }}</h2>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="text-tertiary share-text d-flex align-items-center justify-content-end cursor" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="bi bi-share-fill mx-1 fs-4"></i> Compartir</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <h5 class="ficha-location text-tertiary">
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{ $property->latitude }},{{ $property->longitude }}" target="_blank">
                                                        <i class="bi bi-geo-alt"></i> Ubicación del desarrollo o propiedad
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="col-12 col-lg-6  text-lg-end">
                                                SKU {{ $sku }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="m-0">
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-12 col-md-6 py-3">
                                        <div class="ficha-title mb-3">Características principales</div>
                                        <ul class="list-info">
                                            <li>
                                                <label class="detail-icon me-2">
                                                    <span class="svg-icon-chars svg-icon-area"></span>
                                                </label>
                                                <span>{{ $property->m2 }} m2 </span>
                                            </li>
                                            @foreach($property->features as $kf => $vf)
                                            <li>
                                                <label class="detail-icon me-2">
                                                    @php
                                                    $imagePath = 'storage/svg/'.$vf['icon'];
                                                    $fullPath = public_path($imagePath);
                                                    @endphp
                                                    @if(file_exists($fullPath))
                                                    <span class="svg-icon-chars" style=" background: url('{{ asset('storage/svg/'.$vf['icon']) }}') no-repeat;"></span>
                                                    @endif
                                                </label>
                                                <span>{{ $vf["name"]}}</span>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-6 py-3">
                                        <div class="ficha-title mb-3">Detalles para la adquisición</div>
                                        <ul class="list-info">
                                            @foreach($property->details as $kd => $vd)
                                            <li class="d-flex align-items-center ">
                                                <span class="svg-icon-ficha svg-icon-check mx-2"></span> <span>{{ $vd['name'] }} </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col-12 col-md-6">
                                        <div class="ficha-title mb-3">Amenidades</div>
                                        <ul class="ficha">
                                            @foreach($property->amenities as $ka => $va)
                                            <li>{{ $va['name']}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col-12">
                                        <fieldset class="p-3 fielset-ficha">
                                            <legend>Descripcion de la propiedad</legend>
                                            <div id="description" class="truncate-info">
                                                {{ $property->description }}
                                            </div>
                                            <div class="my-2">
                                                <a href="javascript:void(0)" class="text-secondary view-more" id="viewMore"> LEER MAS</a></button>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 py-3 ">

                                    </div>
                                    <div class="col-12 col-md-5 d-flex align-items-end">
                                        <div>
                                            <h4>{{ $property->view_count }} Vistas</h4>
                                            <div><span class="bold">Posteado: </span><span class="text-primary">{{ $property->fechaCreacion }}</span></div>
                                            <div><span class="bold">Actualización: </span><span class="text-primary">{{ $property->fechaActualizacion }}</span> </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7 d-md-flex align-items-center justify-content-end">
                                        <!-- <p class="py-4 text-secondary">Si deseas agenda una visita o apartar esta propiedad es necesario que respondas un breve cuestionario.</p>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="d-grid gap-2 ">
                                                    <button class="btn btn-primary">HACER CUESTIONARIO </button>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-success text-white">DESCARGAR FICHA</button>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="d-grid d-md-block gap-2 py-2">
                                            @php
                                            $imagePath = 'storage/uploads/'.$property->pdf;
                                            $fullPath = public_path($imagePath);
                                            @endphp
                                            @if(file_exists($fullPath))
                                            <a href="{{ asset('storage/uploads/'.$property->pdf) }}" target="_blank" class="btn btn-success text-white">DESCARGAR FICHA</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <div class="row">
                    @if(!empty($busqueda))
                    <div class="col-12 mb-3">
                        <div>
                            <h4 class="ficha-title-section">Basado en tu búsqueda</h4>
                        </div>
                        <x-card :card="$busqueda" />
                    </div>
                    @endif
                    @if(!empty($favoritos))
                    <div class="col-12 mb-3">
                        <div>
                            <h4 class="ficha-title-section">Mis Favoritos</h4>
                        </div>
                        <x-card :card="$favoritos" />
                    </div>
                    @endif
                    @if(!empty($otros))
                    <div class="col-12 mb-3">
                        <div>
                            <h4 class="ficha-title-section">Otros usuarios vieron</h4>
                        </div>
                        <x-card :card="$otros" />
                    </div>
                    @endif
                    @if(!empty($nuevo))
                    <div class="col-12 mb-3">
                        <div>
                            <h4 class="ficha-title-section">Lo más nuevo</h4>
                        </div>
                        <x-card :card="$nuevo" />
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="bg-teal py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 mb-4  offset-md-3 col-md-6 text-center">
                <h1>¿Por qué debería considerarnos para adquirir una propiedad?</h1>
                <small>Comprar una propiedad nunca fue tan fácil.</small>
            </div>
            <div class="col-12 col-md-4 mb-4  px-md-5">
                <div class="text-center"><span class="svg-icon svg-icon-properties"></span></div>
                <div class="title text-center fs-5">Amplia gama de propiedades</div>
                <div class="description text-center">Ofrecemos ayuda legal experta para todos los artículos inmobiliarios relacionados.</div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="text-center"><span class="svg-icon svg-icon-shape"></span></div>
                <div class="title text-center fs-5">Seguimiento durante todo tu proceso de compra.</div>
                <div class="description text-center">El mejor precio del mercado.</div>
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
@if(count($recomendations['data'])>0))
<div class="bg-white pt-3 pb-4 min-container animate__animated animate__fadeIn">
    <div class="container">
        <div>
            <div class="col-12 text-left pb-3">
                <div class="title">{{ $recomendations["title"] }}</div>
                <div class="description">{{ $recomendations["description"] }}</div>
            </div>
            <x-carousel :cards="$recomendations['data']" id="carr2" />
        </div>
    </div>
</div>
@endif
<div class="bg-white pt-3 pb-4 min-container">
    <div class="container">
        <div>
            <div class="col-12 text-center pb-3">
                <div class="title">¿Qué nos dicen nuestros clientes?</div>
                <div class="description">Mas de 700 propiedades vendidas nos avalan</div>
            </div>
        </div>
        <div>
            <div class="owl-carousel owl-theme pb-2 m-0" id="testimonials">
                <div class="testimonial-box">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left fa-2xl"></i>
                    </div>
                    <div class="testimonial-content">
                        <h3 class="testimonial-author">Amalia Garza y Garza</h3>
                        <p class="testimonial-text">
                            "El equipo de Terrazon fue excepcional en cada paso del proceso, brindándome asesoramiento personalizado y asegurándose de que cada detalle estuviera perfectamente cuidado."
                        </p>
                    </div>
                </div>
                <div class="testimonial-box">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left fa-2xl"></i>
                    </div>
                    <div class="testimonial-content">
                        <h3 class="testimonial-author">David T.</h3>
                        <p class="testimonial-text">
                            "La experiencia de comprar un departamento en Terrazon fue excelente. Desde el primer contacto hasta la entrega final, el proceso fue fluido y profesional. El equipo de Terrazon demostró un alto nivel de conocimiento y compromiso, brindándome opciones que se ajustaban perfectamente a mis necesidades y gustos."
                        </p>
                    </div>
                </div>
                <div class="testimonial-box">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left fa-2xl"></i>
                    </div>
                    <div class="testimonial-content">
                        <h3 class="testimonial-author">Alberto Meza</h3>
                        <p class="testimonial-text">
                            "No solo encontré mi nuevo hogar, sino que también descubrí una comunidad cálida y acogedora. Recomiendo encarecidamente a Terrazon a cualquier persona que busque calidad, profesionalismo y un servicio excepcional en bienes raíces."
                        </p>
                    </div>
                </div>
                <div class="testimonial-box">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left fa-2xl"></i>
                    </div>
                    <div class="testimonial-content">
                        <h3 class="testimonial-author">David T.</h3>
                        <p class="testimonial-text">
                            "La experiencia de comprar un departamento en Terrazon fue excelente. Desde el primer contacto hasta la entrega final, el proceso fue fluido y profesional. El equipo de Terrazon demostró un alto nivel de conocimiento y compromiso, brindándome opciones que se ajustaban perfectamente a mis necesidades y gustos."
                        </p>
                    </div>
                </div>
                <div class="testimonial-box">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left fa-2xl"></i>
                    </div>
                    <div class="testimonial-content">
                        <h3 class="testimonial-author">Alberto Meza</h3>
                        <p class="testimonial-text">
                            "No solo encontré mi nuevo hogar, sino que también descubrí una comunidad cálida y acogedora. Recomiendo encarecidamente a Terrazon a cualquier persona que busque calidad, profesionalismo y un servicio excepcional en bienes raíces."
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- MODAL DE FILTRO -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="text-primary">Filtro <i class="bi bi-filter"></i></label>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <div class="col-12 col-md-6">
                                <input type="checkbox" id="mchk_1"><label class="fc-text" for="mchk_1">Todos</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="checkbox" id="mchk_2"><label class="fc-text" for="mchk_2">Departamentos</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="checkbox" id="mchk_3"><label class="fc-text" for="mchk_3">Casa</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="checkbox" id="mchk_4"><label class="fc-text" for="mchk_4">Terreno</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="checkbox" id="mchk_5"><label class="fc-text" for="mchk_5">Townhouse</label>
                            </div>
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_10"><label class="fc-text" for="mchk_10">AC</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_11"><label class="fc-text" for="mchk_11">Estacionamiento</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_12"><label class="fc-text" for="mchk_12">Cocina</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_13"><label class="fc-text" for="mchk_13">Piscina</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_14"><label class="fc-text" for="mchk_14">Areas verdes comunes</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_14"><label class="fc-text" for="mchk_14">Lavaplatos</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_15"><label class="fc-text" for="mchk_15">Gimnacio Privado</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_16"><label class="fc-text" for="mchk_16">Terraza</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_17"><label class="fc-text" for="mchk_17">Antecomedor</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_18"><label class="fc-text" for="mchk_18">Asador</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-nowrap">
                                <input type="checkbox" id="mchk_19"><label class="fc-text" for="mchk_19">Seguridad privada</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="distributionModal" tabindex="-1" aria-labelledby="distributionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="distributionModalLabel">TERRAZON</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{$property->distributionLink}}" class="full">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="videoModalLabel">TERRAZON</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="videoFrame">
                {!! $property->video !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tourModal" tabindex="-1" aria-labelledby="tourModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="tourModalLabel">TERRAZON</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! $property->tour !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="tourModalLabel">TERRAZON</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Locación
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-share">
        <div class="modal-content modal-share">
            <div class="modal-header bg-secondary text-white">
                <h1 class="modal-title fs-5" id="tourModalLabel">COMPARTIR</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center py-3">
                    <h6>Comparte esta información con tu comunidad</h6>
                </div>
                <div class="col-12  d-flex p-1 pb-2 text-center">
                    <a class="text-decoration-none flex-fill text-center" href="https://www.facebook.com/sharer/sharer.php?u={{$shareLink}}" target="_blank"><img class="ms-1" src="{{ asset('svg/svg-share-f.svg') }}"> </a>
                    <a class="text-decoration-none flex-fill text-center" href="https://twitter.com/intent/tweet?url={{$shareLink}}" target="_blank"><img class="ms-1" src="{{ asset('svg/svg-share-x.svg') }}"> </a>
                    <a class="text-decoration-none flex-fill text-center" href="https://www.instagram.com/?url={{$shareLink}}" target="_blank"><img class="ms-1" src="{{ asset('svg/svg-share-i.svg') }}"> </a>
                    <a class="text-decoration-none flex-fill text-center" href="{{ config('app.link_tiktok') }}" target="_blank"><img class="ms-1" src="{{ asset('svg/svg-share-t.svg') }}"> </a>
                    <a class="text-decoration-none flex-fill text-center" href="{{ config('app.link_youtube') }}" target="_blank"><img class="ms-1" src="{{ asset('svg/svg-share-y.svg') }}"> </a>
                    <a class="text-decoration-none flex-fill text-center" href="https://api.whatsapp.com/send?text={{$shareLink}}" target="_blank"><img class="ms-1" src="{{ asset('svg/svg-share-w.svg') }}"> </a>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center mb-3 copy-button" style="max-width: 600px;">
                        <input type="text" class="form-control" id="linkInput" value="{{$shareLink}}" readonly>
                        <button class="btn btn-outline-primary" type="button" id="copyButton">Copiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  FIN DE MODAL -->
@endsection
@push('scripts')
<script src=" {{ asset('js/ficha.js') }}">
</script>
<script src="{{ asset('js/gallery.js') }}"></script>
<script>
    document.getElementById('copyButton').addEventListener('click', function() {
        // Obtener el input
        var copyText = document.getElementById("linkInput");

        // Seleccionar el texto del input
        copyText.select();
        copyText.setSelectionRange(0, 99999); // Para móviles

        // Copiar el texto al portapapeles
        document.execCommand("copy");

        // Cambiar temporalmente el texto del botón como retroalimentación
        var copyButton = document.getElementById("copyButton");
        copyButton.innerText = "¡Copiado!";
        setTimeout(function() {
            copyButton.innerText = "Copiar";
        }, 2000);
    });
</script>
@endpush
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('css/gallery.css') }}" />
@endpush