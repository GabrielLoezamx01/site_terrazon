var api = "/admin/home";
var propertyApi = "home_propery";
const app = new Vue({
    el: "#vueApp",
    data: {
        searchQuery: "",
        data: {},
        property: [],
        input: {
            name: "",
            span: "",
            id: "",
        },
        btnUpdate: false,
        btnSave: true,
        selectedFolios: [],
        idSelect: null,
        check: true,
    },
    mounted() {
        this.getProperty();
    },
    computed: {
        filteredProperties() {
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                return this.property.filter((item) => {
                    return (
                        item.folio.toLowerCase().includes(query) ||
                        item.title.toLowerCase().includes(query)
                    );
                });
            } else {
                return this.property;
            }
        },
    },
    methods: {
        showModal(zoption, id = null) {
            if (zoption) {
                this.btnUpdate = false;
                this.btnSave = true;
                this.cleanData();
            }
            var modal = new bootstrap.Modal(
                document.getElementById("staticBackdrop")
            );

            modal.show();
            this.cleanData();
        },
        showHome(id) {
            axios
                .get(api + "/" + id)
                .then((response) => {
                    this.btnUpdate = true;
                    this.btnSave = false;
                    this.showModal();
                    this.input.name = response.data.name;
                    this.input.span = response.data.span;
                    this.input.id = response.data.id;
                })
                .catch((error) => {
                    alert(error);
                });
        },
        cleanData() {
            this.input = {};
        },
        updateData() {
            axios
                .put(api + "/" + this.input.id, this.input)
                .then((response) => {
                    if (response.status === 200) {
                        this.message = response.data.message;
                        var modalElement =
                            document.getElementById("staticBackdrop");
                        var modal = bootstrap.Modal.getInstance(modalElement);

                        if (!modal) {
                            modal = new bootstrap.Modal(modalElement);
                        }

                        modal.hide(); // Cerrar el modal
                        alert(this.message);
                    } else {
                        this.message = "Ocurrió un problema";
                    }
                })
                .catch((error) => {
                    console.error("Ocurrió un problema:", error);
                    alert("Ocurrió un problema: " + error.message);
                });
        },
        saveData() {
            this.btnUpdate = false;
            this.btnSave = true;
            axios
                .post(api, this.input)
                .then((response) => {
                    if (response.status === 200) {
                        this.message = response.data.message;
                    } else {
                        this.message = "Ocurrió un problema";
                    }
                    var modalElement =
                        document.getElementById("staticBackdrop");
                    var modal = bootstrap.Modal.getInstance(modalElement);

                    if (!modal) {
                        modal = new bootstrap.Modal(modalElement);
                    }
                    alert(this.message);
                    modal.hide();
                    location.reload();
                })
                .catch((error) => {
                    console.error("Ocurrió un problema:", error);
                    if (error.response && error.response.status === 400) {
                        // Mostrar el mensaje de error específico del servidor
                        alert(
                            "Ocurrió un problema: " +
                                error.response.data.message
                        );
                    } else {
                        alert("Ocurrió un problema: " + error.message);
                    }
                });
        },
        deleteHome(id) {
            if (
                confirm("¿Estás seguro de que quieres eliminar este artículo?")
            ) {
                axios
                    .delete(api + "/" + id)
                    .then((response) => {
                        if (response.status === 200) {
                            this.message = response.data.message;
                        } else {
                            this.message = "Ocurrió un problema";
                        }
                        alert(this.message);
                        location.reload();
                    })
                    .catch((error) => {
                        console.error("Ocurrió un problema:", error);
                        alert("Ocurrió un problema: " + error.message);
                    });
            }
        },
        getProperty() {
            axios.get(propertyApi).then((response) => {
                this.property = response.data;
            });
            this.initializeSelectedFolios();
        },
        properyModal(id) {
            this.idSelect = id;
            this.selectedFolios = [];
            this.initializeSelectedFolios();
            console.log(this.idSelect);
            var modal = new bootstrap.Modal(
                document.getElementById("modal-full-width")
            );
            modal.show();
        },
        initializeSelectedFolios() {
            this.filteredProperties.forEach((item) => {
                if (item.home_id == null) {
                } else {
                    if (item.homes.length > 0) {
                        item.homes.forEach((home) => {
                            if (home.id == this.idSelect) {
                                if (!this.selectedFolios.includes(item.folio)) {
                                    this.selectedFolios.push(item.folio);
                                }
                            }
                        });
                    } else {
                        if (item.home_id == this.idSelect) {
                            if (!this.selectedFolios.includes(item.folio)) {
                                this.selectedFolios.push(item.folio);
                            }
                        }
                    }
                }
            });
        },
        isHomeSelected(folio) {
            return this.selectedFolios.includes(folio);
        },
        updateSelectedFolios(item, event) {
            if (event.target.checked) {
                if (!this.selectedFolios.includes(item.folio)) {
                    this.selectedFolios.push(item.folio);
                }
            } else {
                this.selectedFolios = this.selectedFolios.filter(
                    (folio) => folio !== item.folio
                );
            }
        },
        saveHome() {
            const request = {
                home_id: this.idSelect,
                folios: this.selectedFolios,
            };
            if (this.selectedFolios.length == 0) {
                alert("Selecciona al menos un folio");
                return;
            }
            axios.post(propertyApi, request).then((response) => {
                console.log(response);
                if (response.status === 200) {
                    this.message = response.data.message;
                } else {
                    this.message = "Ocurrió un problema";
                }
                var modalElement = document.getElementById("staticBackdrop");
                var modal = new bootstrap.Modal(modalElement);
                modal.hide();
                this.getProperty();

                alert(this.message);
            });
        },
    },
});
