<template>
  <span @click="toggleFeatured">
    <i class="text-warning" :class="starClass"></i>
  </span>
</template>
<script>
import axios from "axios";
export default {
  name: "PropertyFeatured",
  props: {
    initialFeatured: {
      type: String,
      required: true,
    },
    propertyId: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      isFeatured: this.initialFeatured,
    };
  },
  computed: {
    starClass() {
      return this.isFeatured == "0" ? "fa-regular fa-star" : "fa-solid fa-star";
    },
  },
  methods: {
    addToast(title, message, duration) { 
      this.$root.$refs.toasts.addToast(title, message, duration);
    },
    toggleFeatured() {
      const isFeatured = this.isFeatured == "1" ? false : true;
      axios
        .post(`/admin/destacado/${this.propertyId}`, {
          featured: isFeatured,
        })
        .then((response) => {
          this.isFeatured = isFeatured;
          const msg = isFeatured
            ? "El propiedad ha sido marcada como destacada"
            : "El propiedad ha sido removida de destacados";
          this.addToast("Propiedad destacada", msg, 3000);
        })
        .catch((error) => {
          this.addToast("Error", "No se pudo actualizar el destacado", 3000); 
        });
    },
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
};
</script>
