@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')


    <x-header-admin title="Lista de usuarios" btn="Nuevo Usuario" btn_text="Nuevo Usuario" />
    <x-modal-admin :modal="$modal"/>



    {{-- <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards">
                <x-table-terrazon :data="$data" :columns="$columns" />
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts2')
    <script></script>
@endpush
