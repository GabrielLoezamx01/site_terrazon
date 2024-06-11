import $ from 'jquery';
window.$ = window.jQuery = $;
require('owl.carousel');
$(document).ready(function () {

    var owlOptions={
        center: false,
        loop: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1.2
            },
            768: {
                items: 3
            }
        }
    }
    var owl1 = $('#carr1').owlCarousel(owlOptions);
    var owl2 = $('#carr2').owlCarousel(owlOptions);
    var owl3 = $('#carr3').owlCarousel(owlOptions);
    $('#carr1_next').click(function() {
        owl1.trigger('next.owl.carousel');
    });
    $('#carr2_next').click(function() {
        owl2.trigger('next.owl.carousel');
    });
    $('#carr3_next').click(function() {
        owl3.trigger('next.owl.carousel');
    });

    $(window).resize(function() {
        owl1.trigger('refresh.owl.carousel');
        owl2.trigger('refresh.owl.carousel');
        owl3.trigger('refresh.owl.carousel');
    });
    
    // owl1.trigger('refresh.owl.carousel');
    // owl2.trigger('refresh.owl.carousel');
    // owl3.trigger('refresh.owl.carousel');
});
