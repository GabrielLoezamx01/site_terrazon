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
                items: 2
            },
            768: {
                items: 3
            },
            980: {
                items: 5
            },
        },
        onTranslated: updateProgressBar,
        onInitialized: updateProgressBar
    }
    var owlOptions2 = {
        center: false,
        loop: true,
        nav: false,
        dots: false,
        rewindNav: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1.1
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

    var owlOptions3 = {
        center: false,
        loop: true,
        nav: true,
        navText: [
            '<span class="icon-nav fa-stack fa-2x"><i class="fa-solid fa-circle  text-light fa-stack-2x"></i><i class="fa-solid fa-chevron-left text-secondary fa-stack-1x fa-inverse"></i></span>', '<span class="icon-nav fa-stack fa-2x"><i class="fa-solid fa-circle text-light fa-stack-2x"></i><i class="fa-solid fa-chevron-right text-secondary fa-stack-1x fa-inverse"></i></span>'
        ],
        dots: false,
        rewindNav: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1.1
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
        }
    }

    function updateProgressBar(event) {
        var pageSize = event.page.size;
        var items = event.item.count + pageSize; // Número total de slides
        var item = event.item.index + 1; // Slide actual (comienza en 0, por lo tanto sumamos 1)
        var progress = (item / items) * 100; // Porcentaje de progreso
        $('#progress-' + event.target.id).css('width', progress + '%'); // Actualizar el ancho de la barra de progreso
    }

    var owl1 = $('#carr1').owlCarousel(owlOptions);
    var owl2 = $('#carr2').owlCarousel(owlOptions2);
    var owl3 = $('#testimonials').owlCarousel(owlOptions3);
    $('#carr1_next').click(function () {
        owl1.trigger('next.owl.carousel');
    });
    $('#carr1_next').click(function () {
        owl1.trigger('next.owl.carousel');
    });
    $('#carr1_back').click(function () {
        owl1.trigger('prev.owl.carousel');
    });
    $('#carr2_next').click(function () {
        owl2.trigger('next.owl.carousel');
    });
    $('#carr2_back').click(function () {
        owl2.trigger('prev.owl.carousel');
    });
    $(window).resize(function () {
        owl1.trigger('refresh.owl.carousel');
        owl2.trigger('refresh.owl.carousel');
    });

    let expandido = false;
    let $description = $('#description');
    let $boton = $('#viewMore');

    $boton.click(function () {
        if (expandido) {
            $description.addClass('truncate-info');
            $boton.text('LEER MAS');
            expandido = false;
        } else {
            $description.removeClass('truncate-info');
            $boton.text('LEER MENOS');
            expandido = true;
        }
    });
    const videoModal = document.getElementById('videoModal');
    const youtubeIframe = videoModal.querySelector('iframe');
    let videoSrc = youtubeIframe.src;

    videoModal.addEventListener('hidden.bs.modal', function () {
        youtubeIframe.src = '';
    });

    videoModal.addEventListener('show.bs.modal', function () {
        youtubeIframe.src = videoSrc;
    });

});
