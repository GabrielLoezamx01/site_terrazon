var api = "/admin/home";

const app = new Vue({
    el: "#vueApp",
    data: {
        data: {},
        input: {
            name: "",
            span: "",
            id: "",
        },
    },

    methods: {
        showModal(option, id = null) {
            var modal = new bootstrap.Modal(
                document.getElementById("staticBackdrop")
            );
            modal.show();
            this.cleanData();
        },
        showHome: function (id) {
            console.log(id);
            axios
                .get(api + "/" + id)
                .then((response) => {
                    this.showModal();
                    this.input.name = response.data.name;
                    this.input.span = response.data.span;
                    this.input.id = response.data.id;
                })
                .catch((error) => {
                    alert(error);
                });
        },
        cleanData: function () {
            this.input = {};
        },
        updateData: function () {
            console.log(api + "/" + this.input.id);
            axios
                .patch(api + "/" + this.input.id, request)
                .then((response) => {
                    console.log(response);
                    if (response.status === 200) {
                        this.message = response.data.success;
                        alert(this.message);
                    } else {
                        this.message = "Ocurrió un problema";
                    }
                })
                .catch((error) => {
                    alert("Ocurrió un problema: " + error);
                });
        },
    },
});
