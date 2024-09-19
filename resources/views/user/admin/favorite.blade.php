@extends('layouts.public')
@section('title', 'TERRAZÓN - INICIO')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_custom.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/login_user.css') }}"> --}}
@endpush
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('custom/home') }}">Mi cuenta</a></li>
            </ol>
        </nav>
        <div class="row g-0">
            <div class="col-md-3  d-none d-md-block">
                @include('user.admin.sidebar')
            </div>

            <!-- Main content -->
            <div class="col-md-9 bg-white">
                <div class="m-3">
                    <h2 class="sub-title mt-4">
                        Mis favoritos
                    </h2>
                    @include('user.admin.alerts')
                    <div class="row">
                        @foreach ($data as $index => $card)
                        <div class="col-md-6 mt-5">
                            <x-card :card="$card" />
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="p-5">
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('js/home.js') }}?v={{ config('app.version') }}"></script>
@endpush
