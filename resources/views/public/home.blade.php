@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@section('content')
@include('public.components.banner')
<div class="bg-white min-content">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Propiedades destacadas en la ciudad</div>
            <div class="subtitle">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
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
            <div class="subtitle">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
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
            <div class="subtitle">Explora las joyas inmobiliarias que tenemos reservadas para ti.</div>
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
            <div class="col-12 col-md-5">
                <div style="background-color: white;position: relative;height: 115%;width: 161%;margin: -36px auto;"> </div>
            </div>
            <div class="col-12 col-md-7">
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
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="bg-white py-5">
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