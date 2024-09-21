
import Vue from 'vue';
import axios from "axios";
var api = "/admin/property";
var items = "/admin/items_property";

const app = new Vue({
    el: "#vueApp",
    data: {
        errorsdata: false,
        post_data: {},
        amenities: [],
        selectDetails: [],
        detail: "",
        selectedAmenities: [],
        conditions: [],
        selectedConditions: [],
        types: [],
        selectedTypes: [],
        feature: [],
        selectedFeatures: [],
        view1: true,
        view2: false,
        view3: false,
        view4: false,
        view5: false,
        view6: false,
        view7: false,
        defaulview: true,
        checkbox: false,
        view_checbox: false,
        longitud: "",
        latitude: "",
        municipality: 1,
        tipo_location: 1,
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
                type: "textarea",
                request: "video",
                label: "Codigó de YouTube",
                value: "",
            },
            {
                type: "textarea",
                request: "tour",
                label: "Codigó de tour virtual",
                value: "",
            },
            {
                type: "text",
                request: "m2",
                label: "M2",
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
        chunkedAmenities() {
            return this.chunkArray(this.amenities, 15);
        },
        chunkedTypes() {
            return this.chunkArray(this.types, 15);
        },
        chunkedConditions() {
            return this.chunkArray(this.conditions, 15);
        },
        chunkedFeature() {
            return this.chunkArray(this.feature, 15);
        },
    },
    watch: {
        checkbox(newVal) {
            if (newVal) {
                this.view_checbox = true;
            } else {
                this.error_input = false;
                this.view_checbox = false;
                this.parking = 0;
                this.post_data["parking"] = this.parking;
            }
        },
    },
    mounted() {
        this.getItems();
    },
    methods: {
        getItems: function () {
            axios
                .get(items)
                .then((response) => {
                    this.amenities = response.data.amenities;
                    this.conditions = response.data.conditions;
                    this.feature = response.data.feature;
                    this.types = response.data.types;
                })
                .catch((error) => {
                    console.error("Error al obtener datos :", error);
                });
        },
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
            this.post_data["tipo_location"] = this.tipo_location;
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
                this.errorsdata === true;
                alert("Cambo vacio");
            } else {
                const formData = {};
                this.fields.forEach((field) => {
                    formData[field.request] = field.value;
                });
                this.post_data["informacion"] = formData;
                this.post_data["parking"] = this.parking;
                this.view1 = false;
                this.view2 = true;
            }
        },
        cleanrequest: function () {
            this.longitud = "";
            this.latitude = "";
            this.municipality = "";
            this.tipo_location = "";
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
                tipo_location: this.tipo_location,
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
                            modal.show();
                            Window.location.reload();
                        } else {
                            this.message = "Ocurrio un problema";
                        }
                    }
                })
                .catch((error) => {
                    alert("Ocurrio un problema: " + error);
                });
        },
        toggleAmenity(id) {
            const index = this.selectedAmenities.indexOf(id);
            if (index > -1) {
                this.selectedAmenities.splice(index, 1);
            } else {
                this.selectedAmenities.push(id);
            }
        },
        toggleTypes(id) {
            const index = this.selectedTypes.indexOf(id);
            if (index > -1) {
                this.selectedTypes.splice(index, 1);
            } else {
                this.selectedTypes.push(id);
            }
        },
        toggleFeatures(id) {
            const index = this.selectedFeatures.indexOf(id);
            if (index > -1) {
                this.selectedFeatures.splice(index, 1);
            } else {
                this.selectedFeatures.push(id);
            }
        },
        toggleConditions(id) {
            const index = this.selectedConditions.indexOf(id);
            if (index > -1) {
                this.selectedConditions.splice(index, 1);
            } else {
                this.selectedConditions.push(id);
            }
        },
        chunkArray(array, chunkSize) {
            const chunks = [];
            for (let i = 0; i < array.length; i += chunkSize) {
                chunks.push(array.slice(i, i + chunkSize));
            }
            return chunks;
        },
        amenitiesAdd: function () {
            if (this.selectedAmenities.length === 0) {
                alert("Debe seleccionar al menos una amenidad");
                return;
            } else {
                this.post_data["amenities"] = this.selectedAmenities;
                this.view3 = false;
                this.view4 = true;
            }
        },
        addDetails: function () {
            if (this.detail === "") {
                alert("Debe ingresar un detalle");
                return;
            } else {
                this.selectDetails.push(this.detail);
                this.detail = "";
            }
        },
        removeDetail: function (index) {
            this.selectDetails.splice(index, 1);
        },
        verifyProperty: function () {
            this.post_data["details"] = this.selectDetails;
            this.defaulview = false;
            this.view1 = true;
            this.view2 = true;
            this.view3 = true;
            this.view4 = true;
            this.view5 = true;
            this.view6 = true;
        },
        addTypes: function () {
            if (this.selectedTypes.length === 0) {
                alert("Debe seleccionar al menos un tipo");
                return;
            } else {
                this.post_data["types"] = this.selectedTypes;
                this.view4 = false;
                this.view5 = true;
            }
        },
        featuresAdd: function () {
            if (this.selectedFeatures.length === 0) {
                alert("Debe seleccionar al menos un tipo");
                return;
            } else {
                this.post_data["feature"] = this.selectedFeatures;
                this.view6 = false;
                this.view7 = true;
            }
        },
        conditionsAdd: function () {
            if (this.selectedConditions.length === 0) {
                alert("Debe seleccionar al menos un tipo");
                return;
            } else {
                this.post_data["conditions"] = this.selectedConditions;
                this.view5 = false;
                this.view6 = true;
            }
        },
        savePost: function () {
            this.view1 = true;
            this.view2 = true;
            this.view3 = true;
            this.view4 = true;
            this.view5 = true;
            this.view6 = true;
            const formData = {};
            this.fields.forEach((field) => {
                formData[field.request] = field.value;
            });
            const request = {
                informacion: formData,
                feature: this.selectedFeatures,
                types: this.selectedTypes,
                details: this.selectDetails,
                amenities: this.selectedAmenities,
                parking: this.parking,
                parkingCheck: this.checkbox,
                municipality: this.municipality,
                tipo_location: this.tipo_location,
                latitude: this.latitude,
                longitud: this.longitud,
                conditions: this.selectedConditions,
            };
            console.log("REQUEST BODY");

            console.log(request);
            // if (this.errorsdata) {
            axios
                .post(api, request)
                .then((response) => {
                    console.log("RESPONSE");

                    console.log(response);
                    if (response.status == 200) {
                        this.message = response.data.success;
                        alert(this.message);
                        window.location.reload();
                    } else {
                        this.message = "Ocurrio un problema";
                    }
                })
                .catch((error) => {
                    alert("Ocurrio un problema: " + error);
                });
            // }
        },
    },
});
