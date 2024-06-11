@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@section('content')
@include('public.components.banner')
<div class="bg-light min-content">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Propiedades destacadas en la ciudad</div>
            <div class="subtitle">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
        </div>
    </div>
    <div class="container-md mobile-conteiner">
        <x-carousel :cards="$cards1" id="carr1" />
    </dvi>
</div>
<div class="bg-light  min-content">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Propiedades destacadas en la playa</div>
            <div class="subtitle">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
        </div>
    </div>
    <div class="container-md  mobile-conteiner">
        <x-carousel :cards="$cards2" id="carr2" />
    </dvi>
</div>
<div class="container py-4  min-content">
    <div class="row">
        <div class="col-12 col-md-6">

        </div>
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <h3>¿Estás buscando la mejor propiedad para vivir o invertir?</h3>
                </div>
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
<div class="bg-light">
    <div class="container p-2 px-4">
        <div class="col-12 text-left pb-3">
            <div class="title">Vistos recientemente</div>
            <div class="subtitle">Explora las joyas inmobiliarias que tenemos reservadas para ti.</div>
        </div>
    </div>
    <div class="container-md mobile-conteiner">
        <x-carousel :cards="$cards2" id="carr3" />
    </dvi>
</div>
<div class="bg-divisor  py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 offset-md-2 text-light">
                <h5>Suscríbete a nuestro boletín mensual para estar actualizado de las mejores propiedades</h5>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-center text-center">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Escribe tu email para recibir nuestro boletín">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Suscribirme</button>
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