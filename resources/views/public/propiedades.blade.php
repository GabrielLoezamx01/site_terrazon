@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
<div class="bg-white pt-3 ">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Propiedades</a></li>
                <li class="breadcrumb-item active" aria-current="page">En la playa</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12 text-left pb-3">
                <div class="title">Top Propiedades </div>
                <div class="description">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
            </div>
            <div class="col-6 text-primary">Filtro <i class="bi bi-filter"></i></div>
            <div class="col-6 text-end ">Ordenar por:
                <div class="btn-group">
                    <a class="dropdown-toggle dd-order" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        mas relevantes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <x-results :cards="$cards1" id="results" />
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
@endsection
@push('scripts')
<script src="{{ asset('js/properties.js') }}"></script>
@endpush