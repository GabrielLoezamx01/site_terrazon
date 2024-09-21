@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
<div class="bg-white pb-5">
    <div class="p-0 container-md ">

        <div id="agentesCarousel" class="carousel slide px-1" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($agentes as $key => $agente)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-12 col-md-5 p-4">
                            <h1 class="text-end mt-5 name">{!!$agente["nombre"]!!}</h1>
                            <div class="text-end mb-4 lead">{!!$agente["puesto"]!!}</div>
                            <p class="text-end mb-4 ps-5 description mb-5">{{$agente["info"]}}</p>
                            <!-- <div class="text-end pt-5">
                                <button class="btn btn-primary">ÚNETE AL EQUIPO</button>
                            </div> -->
                            <div class=" text-end">
                                <span  data-bs-target="#agentesCarousel" data-bs-slide="next">
                                    <i class="fs-2 bi bi-arrow-right"></i>
                                </span>
                            </div>

                        </div>
                        <div class="col-12 col-md-7">
                            <div class="container-avatar">
                                <div class="center" style="background: url('{{$agente["picture"]}}');"> 
                                </div>
                                <div class="circle circle1"></div>
                                <div class="circle circle2"></div>
                                <div class="circle circle3 d-none d-md-block"></div>
                                <div class="circle circle4"></div>
                                <div class="circle circle5"></div>
                                <div class="circle circle6 d-none d-md-block"></div>
                                <div class="circle circle7 d-none d-md-block"></div>
                                <div class="circle circle8"></div>
                                <div class="circle circle9 d-none d-md-block"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <button class="carousel-control-prev ml-2 d-none d-md-block" type="button" data-bs-target="#agentesCarousel" data-bs-slide="prev">
                <span class="visually-hidden">Previous</span>
                <div class="slider-nav slider-nav-prev-2">
                    <span class="icon-nav fa-stack fa-2x">
                        <i class="fa-solid fa-circle fa-stack-2x"></i>
                        <i class="fa-solid fa-chevron-left fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </button>
            <button class="carousel-control-next mr-2 d-none d-md-block" type="button" data-bs-target="#agentesCarousel" data-bs-slide="next">>
                <span class="visually-hidden">Next</span>
                <div class="slider-nav slider-nav-next-2">
                    <span class="icon-nav fa-stack fa-2x">
                        <i class="fa-solid fa-circle fa-stack-2x"></i>
                        <i class="fa-solid fa-chevron-right fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </button> -->
        </div>


    </div>
</div>


@endsection
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('css/agentes.css') }}" />
@endpush