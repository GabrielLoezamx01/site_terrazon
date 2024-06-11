<div class="carousel-container">
    <!-- <div class="car-nav car-back"><span class="icon-nav fa-stack fa-2x"><i class="fa-solid fa-circle fa-stack-2x"></i><i class="fa-solid fa-chevron-left fa-stack-1x fa-inverse"></i></span></div> -->
    <div class="car-nav car-next" id="{{ $id }}_next">
        <span class="icon-nav fa-stack fa-2x">
            <i class="fa-solid fa-circle fa-stack-2x"></i>
            <i class="fa-solid fa-chevron-right fa-stack-1x fa-inverse"></i>
        </span>
    </div>
    <div class="owl-carousel owl-theme" id="{{ $id }}">
        @foreach ($cards as $index => $card)
        <x-card :title="$card['title']" :price="$card['price']" :area="$card['area']" :content="$card['content']" :imageUrl="$card['imageUrl']" />
        @endforeach
    </div>
</div>