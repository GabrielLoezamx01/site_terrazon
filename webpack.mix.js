const mix = require('laravel-mix');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/favorite.js', 'public/js')
    .js('resources/js/vue.properties.js', 'public/js')
    .js('resources/js/vue.public.app.js', 'public/js')
    .js('resources/js/admin/home.js', 'public/js/admin')
    .js('resources/js/admin/amenities.js', 'public/js/admin')
    .js('resources/js/admin/condition.js', 'public/js/admin')
    .js('resources/js/admin/edit_property.js', 'public/js/admin')
    .js('resources/js/admin/features.js', 'public/js/admin')
    .js('resources/js/admin/list_property.js', 'public/js/admin')
    .js('resources/js/admin/types.js', 'public/js/admin')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/properties.js', 'public/js')
    .js('resources/js/results.js', 'public/js')
    .js('resources/js/ficha.js', 'public/js')
    .js('resources/js/gallery.js', 'public/js')
    .vue({
        version: 2
    })
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/acercade.scss', 'public/css/')
    .sass('resources/sass/agentes.scss', 'public/css/')
    .version()
    .copy('resources/css/gallery.css', 'public/css/')
    .copy('node_modules/animate.css/animate.min.css', 'public/css')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
    .copy('node_modules/bootstrap-icons/font/fonts', 'public/css/fonts')
    .copy('node_modules/nouislider/dist/nouislider.min.css', 'public/css/nouislider.min.css')
    .copy('node_modules/@popperjs/core/dist/umd/popper.js', 'public/js/popper.js')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    })
    .options({
        processCssUrls: false // Desactiva el procesamiento de URLs en CSS
    })
    .sourceMaps();

mix.copy('node_modules/owl.carousel/dist/assets/owl.carousel.css', 'public/css/owl.carousel.css')
    .copy('node_modules/owl.carousel/dist/assets/owl.theme.default.css', 'public/css/owl.theme.default.css')
    .copy('node_modules/owl.carousel/dist/owl.carousel.min.js', 'public/js/owl.carousel.min.js');
