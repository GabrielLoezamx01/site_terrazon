@extends('layouts.public')
@section('title', 'TERRAZÓN - ACERCA DE')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('css/acercade.css') }}" />
@endpush
@section('content')
<div class="acercade">
    <div class="section-01">
        <div class="semicircle"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 p-md-4">
                    <h2 class="my-4">Acerca de nosotros</h2>
                    <p style="padding-right: 4rem;"><b>Terrazon</b> es una empresa emergente en el sector inmobiliario que busca revolucionar la compra y venta de propiedades mediante el uso de tecnología avanzada. Nuestra misión es simplificar y optimizar cada paso del proceso de adquisición de bienes inmuebles, brindando a nuestros clientes una experiencia transparente, segura y eficiente.</p>
                </div>
                <div class="col-12 col-md-6 p-4 text-end text-md-center">
                    <img src="{{ asset('images/persona-circulo.png') }}" class="img-persona">
                </div>
            </div>
        </div>
    </div>
    <div class="section-02 min-height">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 order-2 order-md-1">
                    <div class="image-02">
                        <img src="{{ asset('/images/people-working.png') }}" class="full">
                    </div>
                </div>
                <div class="col-12 col-md-8 order-1 order-md-2">
                    <h2 class="my-4">¿Quiénes Somos?</h2>
                    <p>
                        En Terrazon, nos especializamos en la venta de propiedades utilizando herramientas tecnológicas de vanguardia que nos permiten ofrecer un servicio personalizado y adaptado a las necesidades de cada cliente. Ayudando a nuestros clientes en todo momento desde la selección de la propiedad ideal hasta la escrituración o ayuda en el proceso del financiamiento, nos encargamos de todo el proceso con profesionalismo y dedicación.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section-02 min-height">
        <div class="container">
            <div class="row pt-4">
                <div class="col-12 text-center pt-4">
                    <h2 class="my-4">Nuestros servicios</h2>
                </div>
                <div class="col-12 col-md-6 pb-4">
                    <div class="row py-4">
                        <div class="col-12 col-md-2 text-center">
                            <i class="svg-service-icon svg-service-deal mb-4"></i>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start">
                            <h3 class="mb-4 text-white">Venta de propiedades</h3>
                            <p class="fs-description">
                                Disponemos de una amplia cartera de inmuebles para todos los gustos y presupuestos. Con nuestras avanzadas plataformas digitales, encontrar y seleccionar tu propiedad ideal es más fácil que nunca.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 pb-4">
                    <div class="row py-4">
                        <div class=" col-12 col-md-2 text-center">
                            <i class="svg-service-icon svg-service-contract mb-4"></i>
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start">
                            <h3 class="mb-4 text-white">Escrituración</h3>
                            <p class="fs-description">
                                Gestionamos todos los trámites legales necesarios para asegurar una transacción segura y sin contratiempos. Nuestro equipo de expertos legales se encarga de la documentación y la formalización del proceso de compra.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 pb-4">
                    <div class="row py-4">
                        <div class=" col-12 col-md-2 text-center">
                            <i class="svg-service-icon svg-service-online mb-4"></i>
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start">
                            <h3 class="mb-4 text-white">Tecnología Innovadora</h3>
                            <p class="fs-description">
                                Utilizamos tecnologías avanzadas como la realidad virtual y tours 3D para que puedas explorar nuestras propiedades desde la comodidad de tu hogar, ofreciendo una experiencia inmersiva y detallada.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 pb-4">
                    <div class="row py-4">
                        <div class=" col-12 col-md-2 text-center">
                            <i class="svg-service-icon svg-service-finance mb-4"></i>
                        </div>
                        <div class="col-12 col-md-10 text-center text-md-start">
                            <h3 class="mb-4 text-white">Financiamiento</h3>
                            <p class="fs-description">
                                Ofrecemos opciones de financiamiento personalizadas para nuestros clientes, colaborando con instituciones financieras de prestigio para brindar soluciones de crédito accesibles y competitivas.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="section-03">
        <div class="semicircle"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 p-4 text-end text-md-center">
                    <div class="image-persona-02">
                        <img src="{{ asset('images/hombre.png') }}" class="full">
                    </div>

                </div>
                <div class="col-12 col-md-7 content-margin">
                    <h2 class="my-4">Nuestro compromiso</h2>
                    <p style="padding-right: 4rem;">
                        <b>En Terrazon</b>, estamos comprometidos con la satisfacción total de nuestros clientes. Nos dedicamos a superar sus expectativas a través de un servicio excepcional y atención personalizada. Valoramos la confianza que depositan en nosotros y trabajamos con integridad y transparencia para garantizar los mejores resultados.
                    </p>
                    <div class="d-grid gap-2 d-md-block text-left py-2">
                        <a href="/propiedades" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection