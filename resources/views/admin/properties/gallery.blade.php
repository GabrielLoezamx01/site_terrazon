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

@section('content')

    <div class="page-header d-print-none">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-home-5" class="nav-link active" data-bs-toggle="tab"
                                        aria-selected="false" role="tab" tabindex="-1">Imagen Principal</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-profile-5" class="nav-link " data-bs-toggle="tab" aria-selected="true"
                                        role="tab">Galeria de imagenes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-activity-5" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                        role="tab" tabindex="-1">Distribución</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-maps-5" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                        role="tab" tabindex="-1">Mapa</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active " id="tabs-home-5" role="tabpanel">
                                    <div class="row">
                                        @if ($property->img == 'default.jpg')
                                            <img src="{{ asset('img/' . $property->img) }}" class="img-fluid w-50 mx-auto">
                                        @else
                                            <img src="{{ asset('storage/' . $property->img) }}"
                                                class="img-fluid w-50 mx-auto">
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <form action="{{ route('property_image.store', ['id' => $property['folio']]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="img" class="mt-5 form-control"
                                                    accept="image/*" required>
                                                <div class="text-center">
                                                    <button class="mt-5 btn btn-dark">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  " id="tabs-profile-5" role="tabpanel">
                                    <div class="row row-cards">
                                        <form action="{{ route('property_gallery.all', ['id' => $property['folio']]) }}"
                                            method="POST" enctype="multipart/form-data" class="p-5">
                                            @csrf
                                            <input type="file" name="img[]" class="mt-5 form-control" accept="image/*"
                                                multiple required>
                                            <button class="mt-5 btn btn-primary">Subir Galeria de imagenes</button>
                                        </form>
                                        @if (count($gallery) > 0)
                                            <div class="container-xl">
                                                <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3">
                                                    @foreach ($gallery as $key => $img)
                                                        <div class="col">
                                                            <a href="{{ asset('storage/' . $img['original_image']) }}"
                                                                data-fslightbox="gallery">
                                                                <div class="img-responsive img-responsive-1x1 rounded border"
                                                                    style="background-image: url('{{ asset('storage/' . $img['original_image']) }}');">
                                                                </div>
                                                            </a>
                                                            <form class=" mt-5"
                                                                action="{{ route('property_gallery.destroy', $img['id']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Eliminar</button>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-activity-5" role="tabpanel">
                                    <div class="row row-cards">
                                        <form action="{{ route('distribution_gallery.store') }}" method="POST"
                                            enctype="multipart/form-data" class="p-5">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $property['folio'] }}">
                                            <input type="file" name="img[]" class="mt-5 form-control"
                                                accept="image/*" multiple required>
                                            <button class="mt-5 btn btn-primary">Subir</button>
                                        </form>
                                        <div class="container-xl">
                                            @if (count($distribution) > 0)
                                                <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3">

                                                    @foreach ($distribution as $key => $img)
                                                        <div class="col">
                                                            <a href="{{ asset('storage/' . $img['url']) }}"
                                                                data-fslightbox="gallery2">
                                                                <div class="img-responsive img-responsive-1x1 rounded border"
                                                                    style="background-image: url('{{ asset('storage/' . $img['url']) }}');">
                                                                </div>
                                                            </a>
                                                            <form class=" mt-5"
                                                                action="{{ route('distribution_gallery.destroy', $img['id']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Eliminar</button>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-maps-5" role="tabpanel">
                                    <div class="row row-cards">
                                        <form action="{{ route('maps_gallery') }}" method="POST"
                                            enctype="multipart/form-data" class="p-5">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $property['folio'] }}">
                                            <input type="file" name="img" class="mt-5 form-control"
                                                accept="image/*" multiple required>
                                            <button class="mt-5 btn btn-primary">Subir</button>
                                        </form>
                                        <div class="container-xl">
                                            @if (!is_null($property['map']))
                                                <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3">
                                                    <img src="{{ asset('storage/' . $property['map']) }}" alt="">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-5"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $property['title'] }}</h3>
                        </div>

                        @if (session('success') || session('errors'))
                            <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible"
                                role="alert">
                                <div class="d-flex">
                                    <div>
                                        @if (session('success'))
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
                                                    action="{{ route('property_image.store', ['id' => $property['folio']]) }}"
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
                                        method="POST" enctype="multipart/form-data" class="p-5">
                                        @csrf
                                        <input type="file" name="img[]" class="mt-5 form-control" accept="image/*"
                                            multiple required>
                                        <button class="mt-5 btn btn-primary">Subir Galeria de imagenes</button>
                                    </form>
                                    @if (count($gallery) > 0)
                                        <div class="container-xl">
                                            <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3">
                                                @foreach ($gallery as $key => $img)
                                                    <div class="col">
                                                        <a href="{{ asset('storage/' . $img['original_image']) }}"
                                                            data-fslightbox="gallery">
                                                            <div class="img-responsive img-responsive-1x1 rounded border"
                                                                style="background-image: url('{{ asset('storage/' . $img['original_image']) }}');">
                                                            </div>
                                                        </a>
                                                        <form class=" mt-5"
                                                            action="{{ route('property_gallery.destroy', $img['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Eliminar</button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <hr>

                            <div class="col-md-12">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Distribución
                                    </h3>
                                </div>
                                <div class="row row-cards">
                                    <form action="{{ route('distribution_gallery.store') }}" method="POST"
                                        enctype="multipart/form-data" class="p-5">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $property['folio'] }}">
                                        <input type="file" name="img[]" class="mt-5 form-control" accept="image/*"
                                            multiple required>
                                        <button class="mt-5 btn btn-primary">Subir</button>
                                    </form>
                                    <div class="container-xl">
                                        @if (count($distribution) > 0)
                                            <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-3">

                                                @foreach ($distribution as $key => $img)
                                                    <div class="col">
                                                        <a href="{{ asset('storage/' . $img['url']) }}"
                                                            data-fslightbox="gallery2">
                                                            <div class="img-responsive img-responsive-1x1 rounded border"
                                                                style="background-image: url('{{ asset('storage/' . $img['url']) }}');">
                                                            </div>
                                                        </a>
                                                        <form class=" mt-5"
                                                            action="{{ route('distribution_gallery.destroy', $img['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Eliminar</button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection
@push('scripts2')
    <script src="{{ asset('js/fslightbox.js') }}"></script>
@endpush
