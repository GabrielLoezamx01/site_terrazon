import $ from 'jquery';
window.$ = window.jQuery = $;
require('owl.carousel');
$(document).ready(function () {

    var owlOptions = {
        center: false,
        loop: true,
        nav: false,
        dots: false,
        rewindNav: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1.2
            },
            768: {
                items: 1.5
            },
            980: {
                items: 2
            },
            1260: {
                items: 2.5
            },
            1340: {
                items: 3
            }
        },
        onTranslated: updateProgressBar,
        onInitialized: updateProgressBar
    }

    function updateProgressBar(event) {
        var pageSize= event.page.size;
        var items = event.item.count + pageSize; // Número total de slides
        var item = event.item.index+1; // Slide actual (comienza en 0, por lo tanto sumamos 1)
        var progress = (item / items) * 100; // Porcentaje de progreso
        $('#progress-' + event.target.id).css('width', progress + '%'); // Actualizar el ancho de la barra de progreso
    }

    var owl1 = $('#carr1').owlCarousel(owlOptions);
    var owl2 = $('#carr2').owlCarousel(owlOptions);
    var owl3 = $('#carr3').owlCarousel(owlOptions);
    $('#carr1_next').click(function () {
        owl1.trigger('next.owl.carousel');
    });
    $('#carr2_next').click(function () {
        owl2.trigger('next.owl.carousel');
    });
    $('#carr3_next').click(function () {
        owl3.trigger('next.owl.carousel');
    });

    $(window).resize(function () {
        owl1.trigger('refresh.owl.carousel');
        owl2.trigger('refresh.owl.carousel');
        owl3.trigger('refresh.owl.carousel');
    });

    // owl1.trigger('refresh.owl.carousel');
    // owl2.trigger('refresh.owl.carousel');
    // owl3.trigger('refresh.owl.carousel');
});
