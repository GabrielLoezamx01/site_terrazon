<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-over-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Haz realidad tus sueños y <br> encuentra tu lugar en Terrazon</h1>
                    </div>
                    <div class="col-12 offset-2 col-md-8">
                        <div class="card">
                            <div class="row">
                                <div class="col-3 item">
                                    <div class="item-content">
                                        <label for="ubicacion">Ubicación</label>
                                        <select class="form-select">
                                            <option selected>Selecciona la ubicación</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 item">
                                    <div class="item-content">
                                        <label for="ubicacion">Tipo de propiedad</label>
                                        <select class="form-select">
                                            <option selected>Selecciona el tipo</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 item">
                                    <div class="item-content">
                                        <label for="ubicacion">Presupuesto</label>
                                        <select class="form-select">
                                            <option selected>Selecciona un rango</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 item d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item active">
            <img src="{{ asset('images/bg-01.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/bg-01.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/bg-01.png') }}" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<div class="bg-light">
    <div class="container p-2  px-4 min-content">
        <div class="row">
            <div class="col-12 text-left pb-3">
                <div class="title">Propiedades destacadas en la playa</div>
                <div class="subtitle">Descubre tu próximo hogar entre nuestras propiedades destacadas.</div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-property " style="width: 411px;">
                    <span class="icon-fav fa-stack fa-2x">
                        <i class="fa-solid fa-circle white fa-stack-2x"></i>
                        <i class="fa-regular fa-heart fa-stack-1x"></i>
                    </span>
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-property " style="width: 411px;">
                    <span class="icon-fav fa-stack fa-2x">
                        <i class="fa-solid fa-circle white fa-stack-2x"></i>
                        <i class="fa-regular fa-heart fa-stack-1x"></i>
                    </span>
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-property " style="width: 411px;">
                    <span class="icon-fav fa-stack fa-2x">
                        <i class="fa-solid fa-circle white fa-stack-2x"></i>
                        <i class="fa-regular fa-heart fa-stack-1x"></i>
                    </span>
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light">
    <div class="container p-2  px-4 min-content">
        <div class="owl-carousel owl-theme">
            <div class="item" style="width: 411px;">
                <div class="card card-property " style="width: 411px;">
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item mb-3">
                <div class="card card-property" style="width: 411px;">
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card card-property " style="width: 411px;">
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card card-property " style="width: 411px;">
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card card-property " style="width: 411px;">
                    <img src="{{ asset('images/card-img.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="price">$ 1,000,000</span>
                        <span class="area">567 m2</span>
                        <div class="clearfix"></div>
                        <h5 class="card-title">Apartamentos Marinos</h5>
                        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
                        <p class="card-text">
                            Breve descripción de la propiedad con un máximo de caracteres establecidos por el cliente para una rápida introducción.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones<span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                                </ul>
                            </div>
                            <div class="col-6 d-flex align-items-end justify-content-center">
                                <button type="button" class="btn btn-primary btn-detalle">VER MAS DETALLES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>