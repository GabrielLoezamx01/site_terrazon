@extends('user.layouts.auth')
@section('title', 'Perfil de usuario')
@push('styles')
@endpush
@section('content')
<div class="p-3"></div>
        <div class="container">
            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('custom/home') }}" style="color: #1E612D; font-weight: 700;">Mi cuenta</a></li>
                </ol>
            </nav>
            <div class="row g-0">
                @include('user.admin.sidebar_mobile')
                @include('user.admin.sidebar')
                <div class="col-md-9 bg-white order-2">
                    @include('user.admin.section.favorite')
                </div>
            </div>
            <div class="p-5">
            </div>
        </div>
    <script src="{{ asset('js/home.js') }}?v={{ config('app.version') }}"></script>
    <script src="{{ asset('js/information.js') }}"></script>
@endsection
