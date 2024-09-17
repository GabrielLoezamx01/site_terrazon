<template>
  <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div
      v-for="(toast, index) in toasts"
      :key="index"
      class="toast  show  animate__animated animate__fadeIn"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header">
        <strong class="me-auto">{{ toast.title }}</strong>
        <button
          type="button"
          class="btn-close"
          @click="removeToast(index)"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body">
        {{ toast.message }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Toast",
  data() {
    return {
      toasts: [],
    };
  },
  methods: {
    addToast(title, message, time) {
      const toast = { title, message };
      this.toasts.push(toast);
      setTimeout(() => {
        this.toasts.splice(this.toasts.indexOf(toast), 1);
      }, time);
    },
    removeToast(index) {   
      this.toasts.splice(index, 1);
    },
  },
};
</script>

<style>
.toast-container {
  max-width: 350px;
}
</style>
