@extends('layouts.app')
@section('title', 'Usuarios Referidos')
@push('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>
@endpush
@push('styles')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 3px;
            text-align: left;

            /* border-bottom: 1px solid #094208; */
        }

        th {
            color: white;
            background-color: #37B052;
        }

        tr:hover {
            background-color: #37b05125;
        }

        .bg-status {
            border-radius: 5px;
            padding: 5px;
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div id="app">
        <div class="container-fluid mt-5">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                v-if="mostrarModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Crear Nueva Referencia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="email">Correo electrónico</label>
                                <input type="email" v-model="email" placeholder="Ingresa el correo" autocomplete="off"
                                    class="input-terrazon">
                            </div>
                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" v-model="password" placeholder="Ingresa la contraseña"
                                    autocomplete="off" class="input-terrazon">
                            </div>
                            <div class="mb-3">
                                <label for="password2">Confirmar Contraseña</label>
                                <input type="password" v-model="password2" placeholder="Ingresa la contraseña"
                                    autocomplete="off" class="input-terrazon">
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-dark" @click="send()" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Invitar</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> --}}
                            {{-- <label for="">Se le enviara un email para su confirmacion</label> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 table-responsive shadow">
                    <div class="p-2">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col"> <button class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Crear Nueva
                                        Referencia</button></div>
                                <div class="col">
                                    <label for="search">Buscar</label>
                                    <input type="search" name="" id="" class="input-terrazon"
                                        placeholder="Ingresa el nombre">
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="mt-5">
                                    <caption>Usuarios Registrados</caption>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Correo</th>
                                            <th>Fecha de alta</th>
                                            <th>Time Check</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class>
                                        <tr v-for="value in users.data">
                                            <td>@{{ value.id_referral }}</td>
                                            <td>@{{ value.email }}</td>
                                            <td>@{{ formatDate(value.created_at) }}</td>
                                            <td>@{{ formatDate(value.time_check) }}</td>
                                            <td>
                                                    <span v-if="value.status == 'success'"
                                                        class="border-5  fw-bold text-success">Correcto</span>
                                                <span v-if="value.status == 'pending'"
                                                    class="border-5 fw-bold    text-warning">Pendiente</span>
                                                <div v-if="value.status == 'error'">
                                                    <span v-if="value.status == 'error'"
                                                        class="border-5  fw-bold   text-danger">Error</span>

                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <button class="btn btn-sm "><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm text-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                    <button v-if="value.status == 'error'" class="btn btn-sm text-info"
                                                        title="reenviar codigo"><i class="fas fa-envelope"></i></button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts2')
        <script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>
        <script>
            var apiReferralsApi = "/admin/ReferralsApi";
            const app = new Vue({
                el: "#app",
                data: {
                    users: [],
                    password2: '',
                    password: '',
                    email: '',
                    mostrarModal: true
                },
                mounted() {
                    this.getUsers();
                },
                methods: {
                    getUsers() {
                        axios.get(apiReferralsApi).then((response) => {
                            this.users = response.data;
                        });
                    },
                    send: function() {
                        if (this.password != this.password2) {
                            alert("Las contraseñas no coinciden");
                        } else {
                            axios.post(apiReferralsApi, {
                                    email: this.email,
                                    password: this.password,
                                })
                                .then(function(response) {
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: response.data,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                })
                                .catch(function(error) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: error.message ?? '',
                                    });
                                });
                            this.getUsers();
                            this.email = '';
                            this.password = '';
                            this.password2 = '';
                        }
                    },
                    formatDate(dateString) {
                        const date = new Date(dateString);
                        const day = date.getDate().toString().padStart(2, '0');
                        const month = (date.getMonth() + 1).toString().padStart(2, '0');
                        const year = date.getFullYear().toString();
                        const hours = date.getHours().toString().padStart(2, '0');
                        const minutes = date.getMinutes().toString().padStart(2, '0');
                        const seconds = date.getSeconds().toString().padStart(2, '0');
                        return `${day}-${month}-${year} :: ${hours}:${minutes}:${seconds}`;
                    }
                },
            });
        </script>
    @endpush


@endsection
