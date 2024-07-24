@extends('layouts.app');
@section('title', 'Editar Detalles')
@section('content')
    @if (isset($details['error']))
        <div class="container mt-5 text-center">
            <div class="col">
                <h1 class="text-warning fw-bold fs-1">Error en obtener la propiedad</h1>
            </div>
        </div>
    @else
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col-auto ms-auto d-print-none">

                        <label for="tittle" class="fw-bold">{{ $details['title'] }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalles</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        @foreach ($details['details'] as $key => $value)
                                            <div class="col-md-10">
                                                <li class="fw-bold p-2">
                                                    {{ $value['name'] }}
                                                </li>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                             <form action="{{ url('admin/property/' . $details['id']) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $value['id'] }}" name="details_id">
                                                    <button class="btn btn-sm ms-3" title="Eliminar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                   </button>
                                                </form>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                    </ul>
                                </div>
                                <div class="col">
                                    <form action="{{ route('details_validate', ['property' => $details['id']]) }}"
                                        method="post">
                                        @csrf
                                        <input placeholder="Ingresa un nuevo detalle" type="text" class="form-control"
                                            name="name">
                                        <button class="btn btn-primary mt-4">Agregar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
