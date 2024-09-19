@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@section('content')
@include('public.components.banner')
<div class="bg-white min-content">
    @foreach ($home as $k => $item)
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">{{ $item['name']}}</div>
            <div class="description">
                {{ $item['span'] }}
            </div>
        </div>
    </div>
    <div class="container-fluid container-md mobile-conteiner">
        <x-carousel :cards="$item['cards']" id="carr{{ $k+1 }}" />
    </div>
    @endforeach
    <div class="container py-5 min-content">
        <div class="row">
            <div class="col-12 col-md-6 text-center">
                <img src="{{ asset('images/image-experiencia.png') }}" class="img-experience">
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12">
                        <h3>¿Estás buscando la mejor propiedad para vivir o invertir?</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 text-center pt-1">
                        <span class="info-stack fa-stack fa-2x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-image fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>

                    <div class="col-10">
                        <div class="info-title">Inversión inteligente:</div>
                        <p class="info-description">Nuestras propiedades no sólo ofrecen un espacio habitable de ensueño
                            sino que también prometen una buena inversión para su futuro.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 text-center pt-1">
                        <span class="info-stack fa-stack fa-2x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-image fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col-10">
                        <div class="info-title">Propiedad sin esfuerzo::</div>
                        <p class="info-description">Disfrute de una experiencia de compra sin complicaciones con nuestro
                            equipo dedicado que lo guiará en cada paso.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 text-center pt-1">
                        <span class="info-stack fa-stack fa-2x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-image fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col-10">
                        <div class="info-title">Una red de afiliados:</div>
                        <p class="info-description">Nuestra red de afiliados ofrece acceso exclusivo a una amplia gama de
                            propiedades, respaldada por un equipo experto que te brindará asesoramiento personalizado en
                            cada etapa.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 text-center pt-1">
                        <span class="info-stack fa-stack fa-2x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-image fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col-10">
                        <div class="info-title">Una red de afiliados:</div>
                        <p class="info-description">Nuestra red de afiliados ofrece acceso exclusivo a una amplia gama de
                            propiedades, respaldada por un equipo experto que te brindará asesoramiento personalizado en
                            cada etapa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="bg-divisor py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 offset-md-2 text-light">
                    <h5>Suscríbete a nuestro boletín mensual para estar actualizado de las mejores propiedades</h5>
                </div>
                <div class="col-12 col-md-4 d-flex align-items-center text-center">
                    <div class="input-group">
                        <input type="email" class="form-control input-boletin" placeholder="Escribe tu email para recibir nuestro boletín">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Suscribirme</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($recomendations!=null)
    <div class="bg-teal py-5">
        <div class="container-fluid container-md py-5">
            <div class="row">
                <div class="d-none d-lg-block" style="background-color: white;position: absolute;height: 74%;width: 50%;margin: -36px auto;z-index:0;">
                </div>
                <div class="col-12 col-lg-5" style="padding:0px 35px 0 35px;">
                    <div class="row py-3  bg-white" style="z-index:1; position:relative">
                        <div class="col-12">
                            <h2>{{ $recomendations["location"]["featured_title"]}}</h2>
                            <div class="description">{{ $recomendations["location"]["featured_msg"]}}</div>
                        </div>
                        <div class="col-12 py-4">
                            <span class="price">$ {{ number_format($recomendations["price"],2) }}</span>
                        </div>
                        <div class="col-12">
                            <div class="hightlight">{{ $recomendations["title"] }}</div>
                            <h5 class="card-location">
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $recomendations['latitude'] }},{{ $recomendations['longitude'] }}" target="_blank">
                                    <i class="bi bi-geo-alt"></i> Ubicación
                                </a>
                            </h5>
                            <p class="description truncate-info-card">{{ $recomendations["description"] }}</p>
                        </div>

                        <div class="col-12">
                            <ul class="list-info">
                                @foreach($recomendations["features"] as $kf => $vf)
                                <li>
                                    <label class="detail-icon">
                                        @php
                                        $imagePath = 'storage/svg/'.$vf['icon'];
                                        $fullPath = public_path($imagePath);
                                        @endphp
                                        @if(file_exists($fullPath))
                                        <img src="{{ asset('storage/svg/'.$vf['icon']) }}">
                                        @endif
                                    </label>
                                    <span class="detail-text ms-1">{{ $vf["name"]}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row d-none d-lg-flex mt-4" style="z-index:1; position:relative">
                        <div class="col-12 col-md-6 d-grid gap-2 d-md-block text-center py-2">
                            <a href="{{ $recomendations["detailsPage"] }}" class="btn btn-success btn-detalle text-white text-nowrap">VER MAS DETALLES</a>

                        </div>
                        <div class="col-12 col-md-6 d-grid gap-2 d-md-block text-center py-2">
                            <a href="/propiedades?location={{ $recomendations['location']['id'] }}" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 px-4 px-lg-0">
                    <div id="carouselRecomendations" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($recomendations["galleries"] as $key => $item)
                            <button type="button" data-bs-target="#carouselRecomendations" data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="{{ $recomendations['slug'] }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($recomendations["galleries"] as $item)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" class="d-block w-100">
                                <a href="{{$item['imageUrl']}}">
                                    <div class="ficha-carouser-img" style="background: url('{{  $item['imageUrl'] }}');"></div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecomendations" data-bs-slide="prev">
                            <span class="visually-hidden">Preview</span>
                            <div class="slider-nav slider-nav-prev">
                                <span class="icon-nav fa-stack fa-2x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-chevron-left fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselRecomendations" data-bs-slide="next">
                            <span class="visually-hidden">Next</span>
                            <div class="slider-nav slider-nav-next">
                                <span class="icon-nav fa-stack fa-2x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-chevron-right fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row d-flex d-lg-none mt-4" style="z-index:1; position:relative">
                <div class="col-12 col-md-6 d-grid gap-2 d-md-block text-center py-2">
                    <a href="{{ $recomendations["detailsPage"] }}" class="btn btn-success btn-detalle text-white text-nowrap">VER MAS DETALLES</a>
                </div>
                <div class="col-12 col-md-6 d-grid gap-2 d-md-block text-center py-2">
                    <a href="/propiedades?location={{ $recomendations['location']['id'] }}" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex mb-3">
                    <div class="card p-5 text-white bg-tertiary box-shadow">
                        <div class="card-body white ">
                            <h1 class="mb-4">Contáctanos</h1>
                            <div class="row py-3">
                                <div class="col-4 fs-7">
                                    Teléfono
                                </div>
                                <div class="col-8 fs-7">
                                    +52 999 1 23 45 67
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-4 fs-7">
                                    Email
                                </div>
                                <div class="col-8 fs-7">
                                    hola@terraazon.mx
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-4 fs-7">
                                    Direccion
                                </div>
                                <div class="col-8 fs-7">
                                    C. 12A 310, Santa Gertrudis Copo,
                                    97113 Mérida, Yuc.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 col-sm-2 text-center fs-7">
                                <a href="https://www.facebook.com/share/bz85nrGpXmAPYVZQ/?mibextid=qi2Omg" target="_blank"><span class="svg-social-icon svg-social-facebook"></span></a>
                            </div>
                            <div class="col-4 col-sm-2 text-center fs-7">
                                <a href="https://www.instagram.com/terrazon.mx?igsh=aW53ZmVwOTB1dWdi" target="_blank"><span class="svg-social-icon svg-social-youtube"></span></a>
                            </div>
                            <div class="col-4 col-sm-2 text-center fs-7">
                                <a href="https://www.facebook.com/share/bz85nrGpXmAPYVZQ/?mibextid=qi2Omg" target="_blank"> <span class="svg-social-icon svg-social-whatsapp"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mb-3">
                    <div class="card p-5 pb-3 bg-white  box-shadow" style="overflow: hidden;">
                        <div class="card-body">
                            @if (session('success') || session('errors'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        @if (session('success'))
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            <h2 class="card-title">¡Nos encantaría saber de ti!</h2>
                            <form action="{{ route('contacts_save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required type="text" class="form-control input-contact" name="name" id="name" placeholder="Nombre">
                                            <label for="name">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required type="email" class="form-control input-contact" name="email" id="email" placeholder="Email">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <textarea maxlength="350" required class="form-control input-contact" name="coments" style="height:100px" id="coments" placeholder="Deja tu comentario"></textarea>
                                            <label for="coments">Deja tu comentario</label>
                                        </div>
                                    </div>
                                    <div class="col-12 py-2">
                                        <input type="checkbox" required id="check" name="check"><label for="check" class="mx-2">Acepto
                                            los términos y condiciones</label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="pt-3 text-center text-md-start d-grid gap-2 d-block">
                                            <button class="btn btn-primary btn-catalogo">ENVIAR
                                                MENSAJE</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 container-contact">
                                        <div class="image-contact" style="background: url({{ asset('images/image-bg-white.png') }});"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="image-grid">
                        <div class="image-container img1">
                            <div class="img-item" style="background:url({{ asset('images/cenote.png') }})"></div>
                        </div>
                        <div class="image-container img2">
                            <div class="img-item" style="background:url({{ asset('images/piramide.png') }})"></div>
                        </div>
                        <div class="image-container img3">
                            <div class="img-item" style="background:url({{ asset('images/catedral.png') }})"></div>
                        </div>
                        <div class="img4">
                            <h4 class="title-big py-3">CONOCE YUCATÁN</h4>
                            <p class="description mb-1 ">Descubre la fascinante península de Yucatán en un viaje exclusivo
                                que te permitirá explorar sus maravillas arqueológicas y naturales. Desde sus impresionantes
                                playas hasta la deliciosa gastronomía local, pasando por la majestuosidad de sus templos
                                mayas y la calidez de su hospitalidad, cada visita será única. Con un clima cálido durante
                                todo el año y un entorno propicio para el turismo, Yucatán no solo encanta a los viajeros,
                                sino que también ofrece oportunidades únicas de inversión en propiedades que capturan su
                                esencia única.</p>
                            <p class="hightlight mb-1 text-center text-md-start">Descubre un mundo de oportunidades</p>
                            <div class="py-1 text-center text-md-start d-grid gap-2 d-md-block">
                                <a href="/propiedades" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</a>
                            </div>
                        </div>
                        <div class="image-container img5">
                            <div class="img-item" style="background:url({{ asset('images/flamencos.png') }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script src="{{ asset('js/home.js') }}?v={{ config('app.version')}}"  type="application/javascript"></script>
    @endpush