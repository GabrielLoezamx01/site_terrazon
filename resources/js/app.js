import $ from 'jquery';
window.$ = window.jQuery = $;
require('./bootstrap');
require('owl.carousel');
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        center: true,
        loop: true,
        margin: 10,
        nav: true,
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
        }
    })
});
