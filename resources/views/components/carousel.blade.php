<div class="carousel-container">
    @if(count($cards)>2)
    <div class="car-nav car-next" id="{{ $id }}_next">
        <span class="icon-nav fa-stack fa-2x">
            <i class="fa-solid fa-circle fa-stack-2x"></i>
            <i class="fa-solid fa-chevron-right fa-stack-1x fa-inverse"></i>
        </span>
    </div>
    @endif
    <div class="owl-carousel owl-theme" id="{{ $id }}">
        @foreach ($cards as $index => $card)
        <x-card :card="$card" />
        @endforeach
    </div>
    @if(count($cards)>0)
    <div class="row">
        <div class="col-md-9 d-none d-md-flex">
            <div class="carousel-progress-bar">
                <div class="my-progress" id="progress-{{$id}}"></div>
            </div>
        </div>
        <div class="col-12 col-md-3 text-center ">
            <div class="row py-3 px-3">
                <div class="d-grid gap-2">
                    <a href="/propiedades?type[]={{ $cards[0]->types[0]->id }}" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</a>
                </div>
            </div>

        </div>
    </div>
    @endif
</div>