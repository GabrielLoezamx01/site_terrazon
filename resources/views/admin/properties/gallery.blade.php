@extends('layouts.app')
@section('title', 'Galeria')
@push('styles')
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            /* Ajusta la altura según tus necesidades */
            object-fit: cover;
        }
    </style>
@endpush

@section('content') <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Galeria
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajustes de imagenes</h3>
                        </div>

                        @if (session('success') || session('errors'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible"
                                role="alert">
                                <div class="d-flex">
                                    <div>
                                        @if (session('success'))
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        @if (session('success'))
                                            {{ session('success') }}
                                        @else
                                            <ul>
                                                @foreach (session('errors') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block">
                                        @if ($property->img == 'defauld.jpg')
                                            <img src="{{ asset('img/' . $property->img) }}" class="card-img-top img-fluid">
                                        @else
                                            <img src="{{ asset('storage/' . $property->img) }}"
                                                class="card-img-top img-fluid">
                                        @endif
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div>Imagen Principal</div>
                                                <form
                                                    action="{{ route('property_gallery.store', ['id' => $property['folio']]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="img" class="mt-5 form-control"
                                                        accept="image/*" required>
                                                    <button class="mt-5 btn btn-primary">Cambiar</button>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Galeria de imagenes
                                    </h3>
                                </div>
                                <div class="row row-cards">
                                    <form action="{{ route('property_gallery.all', ['id' => $property['folio']]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="img[]" class="mt-5 form-control" accept="image/*"
                                            multiple required>
                                        <button class="mt-5 btn btn-primary">Subir Galeria de imagenes</button>
                                    </form>
                                    @if (count($gallery) > 0)
                                        @foreach ($gallery as $key => $img)
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="card card-sm">
                                                    <div class="d-block">
                                                        <img src="{{ asset('storage/' . $img['original_image']) }}"
                                                            class="card-img-top">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <form
                                                                action="{{ route('property_gallery.destroy', $img['id']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Eliminar</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts2')
@endpush
