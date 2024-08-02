<div class="carousel-container">
    <div class="car-nav car-next" id="{{ $id }}_next">
        <span class="icon-nav fa-stack fa-2x">
            <i class="fa-solid fa-circle fa-stack-2x"></i>
            <i class="fa-solid fa-chevron-right fa-stack-1x fa-inverse"></i>
        </span>
    </div>
    <div class="owl-carousel owl-theme pb-2" id="{{ $id }}">
        @foreach ($cards as $index => $card)
            <x-card :card="$card" />
        @endforeach
    </div>
    <div class="row pt-3 px-3">
        <div class="col-md-9 d-none d-md-flex">
            <div class="carousel-progress-bar">
                <div class="my-progress" id="progress-{{$id}}"></div>
            </div>
        </div>
        <div class="col-md-3 text-center d-grid gap-2 d-md-block">
            <button type="button" class="btn btn-primary btn-catalogo">EXPLORAR CATÁLOGO</button>
        </div>
    </div>
</div>