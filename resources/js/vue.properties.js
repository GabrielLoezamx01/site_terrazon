import Vue from 'vue';
import axios from "axios";
import PropertyDestacado from './components/destacado.vue';
import Toasts from './components/toast.vue';
window.Vue = require('vue');
Vue.component('property-featured', PropertyDestacado);
Vue.component('Toasts', Toasts);
const app = new Vue({
    el: '#vueApp',
    methods: {
        activeProperty: function (id) {
            const request = {
                property: id,
            };
            axios
                .post("active_property", request)
                .then((response) => {
                    console.log(response.data);
                    if (response.status === 200) {
                        this.message = response.data.message;
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        this.message = response.data.error;
                    }
                    alert(this.message); // Asegúrate de que el alert esté dentro del then para mostrar el mensaje correctamente
                })
                .catch((error) => {
                    this.message = error.response.data.error;

                    alert(this.message); // Manejo básico de errores
                });
        },
        deactivate_property: function (id) {
            const request = {
                property: id,
            };
            axios
                .post("deactivate_property", request)
                .then((response) => {
                    console.log(response.data);
                    if (response.status === 200) {
                        this.message = response.data.message;
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        this.message = response.data.error;
                    }
                    alert(this.message); // Asegúrate de que el alert esté dentro del then para mostrar el mensaje correctamente
                })
                .catch((error) => {
                    this.message = error.response.data.error;

                    alert(this.message); // Manejo básico de errores
                });
        },
        delete_property: function (id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta propiedad?")) {
                axios
                    .delete("property" + "/" + id)
                    .then((response) => {
                        alert(response.data.message);
                        location.reload();
                    })
                    .catch((error) => {
                        alert(error);
                    });
            }
        },
    },
});
