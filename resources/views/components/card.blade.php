<div class="card card-property ">
    <span class="icon-fav fa-stack fa-2x">
        <i class="fa-solid fa-circle fa-stack-2x"></i>
        <i class="fa-regular fa-heart fa-stack-1x"></i>
    </span>
    <div class="card-img-top" style="background: url({{ $card["imageUrl"] }});" alt="{{ $card["imageUrl"] }}" title="{{ $card["imageUrl"] }}"></div>
     
    <div class="card-body">
   
        <span class="price">$ {{  $card["price"] }}</span>
        <span class="area">{{ $card["area"] }}</span>
        <div class="clearfix"></div>
        <h5 class="card-title">{{ $card["title"] }}</h5>
        <h5 class="card-location"><img src="{{ asset('images/icons/location.svg') }}"> Ubicación del desarrollo</h5>
        <p class="card-text">
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
                    <span class="detail-text">{{ $vf["name"]}}</span>
                </li>
                @endforeach
                </ul> 
            </div>
            <div class="col-12 col-md-6 d-md-flex align-items-end justify-content-center">
                <div class="d-grid gap-2">
                    <!-- <a href="/ficha/sku" class="btn btn-success btn-detalle">VER MAS DETALLES</a> -->
                    <a href="{{ $card["detailsPage"] }}" class="btn btn-success btn-detalle">VER MAS DETALLES</a>
                </div>
            </div>
        </div>
    </div>
</div>