var api = "/admin/amenities";
 $(document).ready(function () {
     $("#myTable").DataTable({
         info: false,
         paging: false,
     });
 });
const app = new Vue({
    el: "#vueApp",
    data: {
        insertForm: true,
        UpdateForm: false,
        name: "",
        svgFile: null,
        id: null,
        data: {},
        alert: "",
    },
    methods: {
        deleteshow: function (id) {
            this.id = id;
            this.alert = "¿Está seguro de eliminar ?";
        },
        showModal(option, id = null) {
            this.UpdateForm = option;
            if (this.UpdateForm) {
                this.insertForm = false;
                this.id = id;
                this.showApi();
            } else {
                this.insertForm = true;
            }
            var modal = new bootstrap.Modal(
                document.getElementById("staticBackdrop")
            );
            modal.show();
        },
        showApi: function () {
            axios
                .get(api + "/" + this.id)
                .then((response) => {
                    this.name = response.data.name;
                })
                .catch((error) => {
                    alert(error);
                });
        },
        eliminar: function () {
            axios
                .delete(api + "/" + this.id)
                .then((response) => {
                    window.location.reload();
                })
                .catch((error) => {
                    alert(error);
                });
        },
    },
});
