<template>
  <span class="icon-fav fa-stack fa-2x" :class="starClass" @click="toogleFavorite">
    <i class="fa-solid fa-circle fa-stack-2x"></i>
    <i class="fa-solid fa-heart fa-stack-1x"></i>
    <i class="fa-regular fa-heart fa-stack-1x"></i>
  </span>
</template>
<script>
import axios from "axios";
const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
axios.defaults.headers.common["X-CSRF-TOKEN"] = token;
axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
export default {
  name: "PropertyFavorite",
  props: {
    initialFeatured: {
      type: Number,
      required: true,
    },
    propertyId: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      idFavorite: this.initialFeatured,
    };
  },
  computed: {
    starClass() {
      return this.idFavorite == 1 ? "active" : "";
    },
  },
  methods: {
    addToast(title, message, duration) {
      this.$root.$refs.toasts.addToast(title, message, duration);
    },
    toogleFavorite() {
      const idFavorite = this.idFavorite == 1 ? false : true;
      const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

      axios
        .post(`/user/favorite/${this.propertyId}`, null, {
          headers: {
            Accept: "application/json", // Asegurarte de que Axios envía este encabezado
          },
        })
        .then((response) => {
          this.idFavorite = idFavorite;
        })
        .catch((error) => {
          this.addToast("Inicie sesión", "Para agregar a favoritos inice sesión", 3000);
        });
    },
  },
};
</script>
