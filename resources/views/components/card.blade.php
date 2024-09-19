<div class="card card-property ">
    <property-favorite  :initial-featured="{{ $isFavorite }}"  :property-id="{{ $card["id"] }}"></property-favorite>
    <div class="card-img-top" style="background: url('{{ $card["imageUrl"] }}');" alt="{{ $card["imageUrl"] }}" title="{{ $card["imageUrl"] }}"></div>

    <div class="card-body">

        <span class="price">$ {{ $card["price"] }}</span>
        @if(trim($card["area"])!='')
        <span class="area">{{ $card["area"] }} m<sup>2</sup></span>
        @endif
        <div class="clearfix"></div>
        <h5 class="card-title">{{ $card["title"] }}</h5>
        <h5 class="card-location">
            <a href="https://www.google.com/maps/search/?api=1&query={{ $card['latitude'] }},{{ $card['longitude'] }}" target="_blank">
                <i class="bi bi-geo-alt"></i> Ubicación
            </a>
        </h5>
        <p class="card-text mb-3 truncate-info-card ">
            {{ $card["description"] }}
        </p>
        <div class="row">
            <div class="col-12 col-md-6  mb-3 mb-md-2">
                <ul class="list-info">
                    @foreach($card["features"] as $kf => $vf)
                    <li>
                        <label class="detail-icon">
                            @php
                            $imagePath = 'storage/svg/'.$vf['icon'];
                            $fullPath = public_path($imagePath);
                            @endphp
                            @if(file_exists($fullPath))
                            <img src="{{ asset('storage/svg/'.$vf['icon']) }}">
                            @endif
                        </label>
                        <span class="detail-text ms-1">{{ $vf["name"]}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6 d-md-flex align-items-end justify-content-center">
                <div class="d-grid gap-2">
                    <a href="{{ $card["detailsPage"] }}" class="btn btn-success btn-detalle text-white text-nowrap">VER MAS DETALLES</a>
                </div>
            </div>
        </div>
    </div>
</div>
