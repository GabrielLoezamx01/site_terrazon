import Vue from 'vue';
import PropertyFavorite from './components/favorite.vue';
import Toasts from './components/toast.vue';
$(document).ready(function () {

    Vue.component('property-favorite', PropertyFavorite);
    Vue.component('Toasts', Toasts);
    const app = new Vue({
        el: '#content',
    });


});
