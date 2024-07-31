<div class="card card-property ">
    <span class="icon-fav fa-stack fa-2x">
        <i class="fa-solid fa-circle fa-stack-2x"></i>
        <i class="fa-regular fa-heart fa-stack-1x"></i>
    </span>
    <div class="card-img-top" style="background: url({{ $imageUrl }});"></div>
    <!-- <img src="" class="card-img-top" alt="..."> -->
    <div class="card-body">
        <span class="price">$ {{ $price }}</span>
        <span class="area">{{ $area }}</span>
        <div class="clearfix"></div>
        <h5 class="card-title">{{ $title }}</h5>
        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
        <p class="card-text">
            {{ $content }}
        </p>
        <div class="row">
            <div class="col-12 col-md-6  mb-3 mb-md-2">
                <ul class="list-info">
                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bed.svg') }}"></label><span class="detail-text">2 Habitaciones</span></li>
                    <li><label class="detail-icon"><img src="{{ asset('images/icons/bath.svg') }}"></label><span class="detail-text">2 Baños</span></li>
                    <li><label class="detail-icon"><img src="{{ asset('images/icons/cart.svg') }}"></label><span class="detail-text">1 Estacionamiento</span></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 d-md-flex align-items-end justify-content-center">
                <div class="d-grid gap-2">
                    <!-- <a href="/ficha/sku" class="btn btn-success btn-detalle">VER MAS DETALLES</a> -->
                    <a href="{{ $detailsPage }}" class="btn btn-success btn-detalle">VER MAS DETALLES</a>
                </div>
            </div>
        </div>
    </div>
</div>