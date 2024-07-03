var api = "/admin/property";
var api = "/admin/property";

const app = new Vue({
    el: "#vueApp",
    data: {
        post_data: {},
        view1: true,
        view2: false,
        view3: false,
        checkbox: false,
        view_checbox: false,
        longitud: "",
        latitude: "",
        municipality: 0,
        price: 0,
        parking: 0,
        bathrooms: 0,
        rooms: 0,
        description: "",
        address: "",
        name: "",
        message: "",
        test: "CONECTADO",
        error_input: false,
        fields: [
            {
                type: "label",
                request: "",
                label: "Información",
                value: "Informacion",
            },
            {
                type: "text",
                request: "name",
                label: "Nombre de la propiedad",
                value: "",
            },
            { type: "text", request: "address", label: "Dirección", value: "" },
            {
                type: "textarea",
                request: "description",
                label: "Descripción de la propiedad",
                value: "",
            },
            {
                type: "number",
                request: "rooms",
                label: "Habitaciones",
                value: "",
            },
            { type: "number", request: "bathrooms", label: "Baños", value: "" },
            {
                type: "checkbox",
                request: "checkbox",
                label: "Estacionamiento",
                value: "check",
            },
            {
                type: "number",
                request: "price",
                label: "Precio",
                value: "",
            },

            // { label: "Estacionamiento", value: "checkbox" },
            // { label: "Baños", value: "bathrooms" },
        ],
        submitted: false,
    },
    computed: {
        inputClass() {
            return {
                "form-control": true,
                // "is-invalid": this.isFieldEmpty(value),
            };
        },
    },
    watch: {
        checkbox(newVal) {
            if (newVal) {
                console.log(1);
                this.view_checbox = true;
            } else {
                console.log(1);
                this.error_input = false;
                this.view_checbox = false;
                this.parking = 0;
            }
        },
    },
    methods: {
        isFieldEmpty(value) {
            if (value.trim() === "check") {
                console.log("entro en parking");
            }
            return value.trim() === "";
        },
        saveProperty: function () {
            if (this.municipality === "") {
                alert("Ocurrio un problema");
                return "error";
            }
            this.post_data["municipality"] = this.municipality;
            this.post_data["latitude"] = this.latitude;
            this.post_data["longitud"] = this.longitud;
            this.view2 = false;
            this.view3 = true;
        },
        validacionRequest: function () {
            if (this.checkbox === true) {
                if (this.parking === "" || this.parking <= 0) {
                    this.error_input = true;
                    return 0;
                } else {
                    this.error_input = false;
                }
            }
            this.submitted = true;
            const invalidFields = this.fields.filter((field) =>
                this.isFieldEmpty(field.value)
            );
            if (invalidFields.length > 0) {
                alert("Cambo vacio");
            } else {
                const formData = {};
                this.fields.forEach((field) => {
                    formData[field.request] = field.value;
                });
                this.post_data["informacion"] = formData;
                this.post_data["parking"] = this.parking;
                console.log(this.post_data);
                this.view1 = false;
                this.view2 = true;
            }
        },
        cleanrequest: function () {
            this.longitud = "";
            this.latitude = "";
            this.municipality = "";
            this.price = "";
            this.parking = "";
            this.bathrooms = "";
            this.rooms = "";
            this.description = "";
            this.address = "";
            this.name = "";
        },
        insertAxios: function () {
            let request = {
                longitud: this.longitud,
                latitude: this.latitude,
                municipality: this.municipality,
                price: this.price,
                parking: this.parking,
                bathrooms: this.bathrooms,
                rooms: this.rooms,
                description: this.description,
                address: this.address,
                name: this.name,
            };
            axios
                .post(api, request)
                .then((response) => {
                    if (response.status == 200) {
                        var modal = new bootstrap.Modal(
                            document.getElementById("modal-success")
                        );
                        if (response.status == 200) {
                            this.message = response.data.success;
                            this.cleanrequest();
                            modal.show();
                        } else {
                            this.message = "Ocurrio un problema";
                        }
                    }
                })
                .catch((error) => {
                    alert("Ocurrio un problema: " + error);
                });
        },
    },
});
