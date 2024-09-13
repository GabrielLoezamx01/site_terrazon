@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@section('content')
    <style>
        <style>.sidebar {
            height: 100vh;
            background-color: #f8f9fa;
        }

        .content {
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: auto;
                z-index: 1000;
                transition: transform 0.3s ease;
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }

        ul>li>a {
            color: #8F8F8F;
            text-decoration: none;
            display: block;
            /* Asegura que el enlace ocupa todo el espacio del elemento li */
            padding: 10px;
            /* Para visualizar mejor el fondo */
        }

        ul>li>a:focus {
            background: #7AE582;
            color: #fff;
            /* Para asegurar que el texto sea visible sobre el fondo verde */
        }

        /* Opcional: estilo para mostrar un borde al pasar el ratón */
        ul>li>a:hover {
            background: #7AE582;
            font-weight: bold;
            color: #094208;
        }

        ul>li>a:active {
            background: #5aab60;
            /* Un tono más oscuro para el estado activo */
            color: #fff;
            /* Opcional: cambiar el color del texto para mejor contraste */
        }

        .profile {
            font-family: Inter;
            font-size: 18px;
            font-weight: 700;
            line-height: 21.78px;
            text-align: left;
        }

        .actives {
            background: #7AE582;
            font-weight: bold;
            color: #094208;
        }

        .title {
            font-family: Inter;
            font-size: 18px;
            font-weight: 700;
            line-height: 21.78px;
            text-align: left;
            color: #37B052;

        }
    </style>
    </style>
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('custom.home') }}">Mi cuenta</a></li>
            </ol>
        </nav>

        <div class="row h-100 bg-white rounded">

            <!-- Sidebar -->
            <div class="col-md-3 sidebar d-none d-md-block h-100">
                <div class="mt-5 m-2">
                    <label for="profile" class="profile">Hola,
                        {{ Auth::guard('custom_users')->user()->first_name }}</label>
                </div>
                <ul class="nav flex-column mt-5">
                    <li class="nav-item">
                        <a class="actives" href="#">Perfil del Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="#">Mis favoritos</a>
                    </li>
                </ul>
                <div class="p-5">

                </div>
            </div>

            {{-- <!-- Main content -->
            <div class="col-md-9 content">
                <!-- Main content here -->
                <div class="d-md-none">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
                        aria-expanded="false" aria-controls="sidebar">
                        Toggle Sidebar
                    </button>
                </div>
                <div class="bg-">
                    <div class="">
                        <h5 class="title">
                            Perfil de usuario
                        </h5>
                    </div>
                </div>
                <!-- Add your content here -->
            </div> --}}
        </div>
    </div>

    <!-- Sidebar for mobile -->
    <div class="collapse sidebar d-md-none" id="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Menu Item 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Menu Item 2</a>
            </li>
            <!-- Add more menu items here -->
        </ul>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/home.js') }}?v={{ config('app.version') }}"></script>
@endpush
