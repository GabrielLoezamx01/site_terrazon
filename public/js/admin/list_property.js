var api = "/admin/property";
pojpkefmkpfmkpemf
const app = new Vue({
    data: {
        checkbox: false,
        view_checbox: false,

        longitud: "",
        latitude: "",
        municipality: 0,
        price: 0,
        parking: "",
        bathrooms: 0,
        rooms: 0,
        description: "",
        address: "",
        name: "",
        message: ""
    },
    watch: {
        checkbox(newVal) {
            if (newVal) {
                this.view_checbox = true;
            } else {
                this.view_checbox = false;
                this.parking = 0;
            }
        },
    },
    methods: {
        saveProperty: function () {
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
                        this.message = response.data.success;
                        modal.show();
                    }
                    console.log(response);
                })
                .catch((error) => {
                    alert(error);
                });
        },
    },
});
