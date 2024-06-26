@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="">Bienvenido:   <span>{{ Auth::user()->name }} </span></h2>
            </div>
        </div>
    </div>
@endsection
