@extends('layouts.public')
@section('title', 'TERRAZÓN - PROPIEDADES')
@section('content')
<div class="banner banner-propiedades"></div>
<div class="container py-5">
    <div class="row">
        <div class="col-12 col-lg-4 offset-lg-1">
            <h3 class="mb-3">Contactanos</h3>
            <p class="m-0 p-0">Para consultas generales o asistencia personalizada, no dudes en contactarnos directamente por teléfono o correo electrónico. Estamos aquí para ayudarte en cada paso del proceso.</p>
            <div>
                <img src="{{ asset('/svg/svg-call-center.svg') }}">
            </div>
            <div>
                <ul class="m-0 px-2">
                    <li class="d-flex align-items-center mb-3">
                        <i class="bi bi-geo-alt me-2 text-primary"></i><span class="bold">{{ config('app.contact_address') }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <a class="text-decoration-none" href="tel:{{ config('app.contact_tel') }}">
                            <i class="bi bi-telephone-outbound me-2"></i><span class="text-dark bold">{{ config('app.contact_tel') }}</span></a>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <a class="text-decoration-none" href="mailto:{{ config('app.contact_email') }}">
                            <i class="fa-regular fa-envelope me-2"></i><span class="text-dark bold">{{ config('app.contact_email') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <form id="contactForm">
                <div class="card card-contact">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <h5 class="text-primary">Deja tu mensaje</h5>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre*" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <input type="text" class="form-control" name="apellido" placeholder="Apellido*" required>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name="email" placeholder="Email*" required>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name="telefono" placeholder="Teléfono Celular*" required>
                        </div>
                        <div class="col-12 mb-5">
                            <textarea rows="5" class="form-control"  name="mensaje" placeholder="Escribe tu mensaje" required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg  px-5">ENVIAR MENSAJE</button>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div id="message"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection