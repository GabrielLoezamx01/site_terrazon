@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-5">
            <h1 class="text-end mt-5 name">Ángel<br>Poot</h1>
            <div class="text-end mb-4 lead">TEAM LEADER</div>
            <p class="text-end mb-4 ps-5 description mb-5">Nuestro team leader es un profesional altamente experimentado en el sector inmobiliario y en la gestión de proyectos inmobiliarios. Con más de una década de experiencia, ha liderado equipos multidisciplinarios hacia el éxito, combinando habilidades técnicas avanzadas con una visión estratégica clara. Su compromiso con la excelencia, la innovación y la satisfacción del cliente lo convierte en un líder ejemplar, capaz de guiar al equipo de Terrazon hacia nuevas alturas en el mercado.</p>
            <div class="text-end pt-5">
                <button class="btn btn-primary">ÚNETE AL EQUIPO</button>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="container-avatar">
                <div class="center">
                    <img src="profile.jpg" alt="Persona" class="profile-pic">
                </div>
                <div class="circle circle1"></div>
                <div class="circle circle2"></div>
                <div class="circle circle3 d-none d-md-block"></div>
                <div class="circle circle4"></div>
                <div class="circle circle5"></div>
                <div class="circle circle6 d-none d-md-block" ></div>
                <div class="circle circle7 d-none d-md-block"></div>
                <div class="circle circle8"></div>
                <div class="circle circle9 d-none d-md-block"></div>
            </div>
        </div>

    </div>
</div>

@endsection
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('css/agentes.css') }}" />
@endpush