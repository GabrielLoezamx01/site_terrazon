@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@section('content')
@include('public.components.banner')
<div class="bg-white min-content">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Propiedades destacadas en la ciudad</div>
            <div class="description">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
        </div>
    </div>
    <div class="container-md mobile-conteiner">
        <x-carousel :cards="$cards1" id="carr1" />
    </div>
</div>
<div class="bg-white min-content">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Propiedades destacadas en la playa</div>
            <div class="description">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
        </div>
    </div>
    <div class="container-md mobile-conteiner">
        <x-carousel :cards="$cards2" id="carr2" />
    </div>
</div>
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
                    <p class="info-description">Nuestras propiedades no sólo ofrecen un espacio habitable de ensueño sino que también prometen una buena inversión para su futuro.</p>
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
                    <p class="info-description">Disfrute de una experiencia de compra sin complicaciones con nuestro equipo dedicado que lo guiará en cada paso.</p>
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
                    <p class="info-description">Nuestra red de afiliados ofrece acceso exclusivo a una amplia gama de propiedades, respaldada por un equipo experto que te brindará asesoramiento personalizado en cada etapa.</p>
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
                    <p class="info-description">Nuestra red de afiliados ofrece acceso exclusivo a una amplia gama de propiedades, respaldada por un equipo experto que te brindará asesoramiento personalizado en cada etapa.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-5">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Vistos recientemente</div>
            <div class="description">Explora las joyas inmobiliarias que tenemos reservadas para ti.</div>
        </div>
    </div>
    <div class="container-md mobile-conteiner">
        <x-carousel :cards="$cards2" id="carr3" />
    </div>
</div>
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
<div class="bg-teal py-5">
    <div class="container py-5">
        <div class="row">
            <div class="d-none d-lg-block" style="background-color: white;position: absolute;height: 74%;width: 50%;margin: -36px auto;z-index:0;"> </div>
            <div class="col-12 col-lg-5" style="padding:0px 35px 0 35px;">
                <div class="row py-3  bg-white" style="z-index:1; position:relative">
                    <div class="col-12">
                        <h2>Recomendaciones en la playa</h2>
                        <div class="description">Descubre tu oasis perfecto en la playa y empieza a disfrutar de la vida junto al mar</div>
                    </div>
                    <div class="col-12 py-4">
                        <span class="price">$ 1,234,567.00</span>
                    </div>
                    <div class="col-12">
                        <div class="hightlight">Nombre de la propiedad</div>
                        <div class="location py-2"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</div>
                        <p class="description">Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.</p>
                    </div>

                    <div class="col-12">
                        <ul class="list-info">
                            <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                            <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                            <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row d-none d-lg-flex mt-4" style="z-index:1; position:relative">
                    <div class="col-12 col-md-6 d-grid gap-2 d-md-block text-center py-2">
                        <button type="button" class="btn btn-success btn-detalle">VER MAS DETALLES</button>
                    </div>
                    <div class="col-12 col-md-6 d-grid gap-2 d-md-block text-center py-2">
                        <button type="button" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 px-4 px-lg-0">
                <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                        <span class="visually-hidden">Preview</span>
                        <div class="slider-nav slider-nav-prev">
                            <span class="icon-nav fa-stack fa-2x">
                                <i class="fa-solid fa-circle fa-stack-2x"></i>
                                <i class="fa-solid fa-chevron-left fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
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
            <div class="col-12 col-lg-6 d-grid gap-2 d-lg-block text-center py-2">
                <button type="button" class="btn btn-success btn-detalle">VER MAS DETALLES</button>
            </div>
            <div class="col-12 col-lg-6 d-grid gap-2 d-lg-block text-center py-2">
                <button type="button" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</button>
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex mb-3">
                <div class="card p-5 text-tertiary bg-tertiary box-shadow">
                    <div class="card-body ">
                        <h1 class="mb-4">Conectemos</h1>
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
                <div class="card p-5 pb-3 bg-white  box-shadow">
                    <div class="card-body">
                        <h2 class="card-title">¡Nos encantaría saber de ti!</h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control input-contact" id="name" placeholder="Nombre">
                                    <label for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control input-contact" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control input-contact" style="height:100px" id="coments" placeholder="Deja tu comentario"></textarea>
                                    <label for="coments">Deja tu comentario</label>
                                </div>
                            </div>
                            <div class="col-12 py-2">
                                <input type="checkbox" id="check"><label for="check" class="mx-2">Acepto los términos y condiciones</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="pt-3 text-center text-md-start d-grid gap-2 d-block">
                                    <button type="button" class="btn btn-primary btn-catalogo">ENVIAR MENSAJE</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 container-contact">
                                <div class="image-contact" style="background: url({{asset('images/image-bg-white.png')}});"></div>
                            </div>
                        </div>
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
                        <div class="img-item" style="background:url({{asset('images/piramide.png') }})"></div>
                    </div>
                    <div class="image-container img3">
                        <div class="img-item" style="background:url({{asset('images/catedral.png') }})"></div>
                    </div>
                    <div class="img4">
                        <h4 class="title-big py-3">CONOCE YUCATÁN</h4>
                        <p class="description mb-1 ">Descubre la fascinante península de Yucatán en un viaje exclusivo que te permitirá explorar sus maravillas arqueológicas y naturales. Desde sus impresionantes playas hasta la deliciosa gastronomía local, pasando por la majestuosidad de sus templos mayas y la calidez de su hospitalidad, cada visita será única. Con un clima cálido durante todo el año y un entorno propicio para el turismo, Yucatán no solo encanta a los viajeros, sino que también ofrece oportunidades únicas de inversión en propiedades que capturan su esencia única.</p>
                        <p class="hightlight mb-1 text-center text-md-start">Descubre un mundo de oportunidades</p>
                        <div class="py-1 text-center text-md-start d-grid gap-2 d-md-block">
                            <button type="button" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</button>
                        </div>
                    </div>
                    <div class="image-container img5">
                        <div class="img-item" style="background:url({{asset('images/flamencos.png') }})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush