@extends('layouts.app')
@section('title', 'Crear Propiedades')
@push('scripts')
@endpush
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Creación de propiedad
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row  row-cards  card p-5">
                {{-- <div class="col-md-12">
                    <div class="mb-3">
                        <h1 class="fs-1 fw-bold">Crear Propiedad</h1>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-10">
                        @include('admin.properties.create.information')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @include('admin.properties.create.location')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.properties.create.amenities')
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @include('admin.properties.create.types')
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @include('admin.properties.create.conditions')
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @include('admin.properties.create.feature')
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        @include('admin.properties.create.details')
                    </div>
                </div>
                 <div class="row mt-3" v-if="defaulview === false">
                    <div class="col-md-12">
                        <button class="btn btn-outline-success w-100" @click="savePost">Guardar</button>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    </div>
@endsection
@push('scripts2')
    <script src="{{ asset('js/admin/list_property.js') }}"></script>
@endpush
