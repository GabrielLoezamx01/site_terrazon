@extends('layouts.app')
@section('title', 'Lista de Usuario')
@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Lista de usuarios
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <h3 class="card-title">Lista de usuarios</h3>
                            <div class="card-tools mt-2 mt-md-0">
                                <input type="text" id="searchInput" class="form-control"
                                    placeholder="Buscar usuarios...">
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            @foreach ($users as $item)
                                <div class="list-group-item {{ $item->status == 'pending' ? ' bg-yellow-lt' : '' }}">
                                    <div class="row align-items-center flex-wrap">
                                        <div class="col text-truncate">
                                            <a href="#" class="text-reset d-block"> {{ $item->name }} </a>
                                            <div class="d-block text-secondary text-truncate mt-n1">
                                                {{ $item->email }}
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex mb-2 mb-md-0">
                                            {{-- @if ($item->status == 'pending')
                                             <form action="" class="ms-2">
                                                <button class="btn btn-warning btn-sm">Verificar</button>
                                            </form>
                                            @endif --}}
                                            @if ($item->status == 'blocked')
                                                 <form action="{{ url('admin/list_users?active=true&id=' . $item->id_referral) }}"
                                                    method="POST" class="ms-2">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">Activar</button>
                                                </form>
                                            @else
                                                <form action="{{ url('admin/list_users?id=' . $item->id_referral) }}"
                                                    method="POST" class="ms-2">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">Bloquear</button>
                                                </form>
                                            @endif


                                            {{-- <a href="#" class=" ms-2 ">
                                                <button class="btn btn-sm btn-info">Propiedades</button>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center mt-5">
                        <p class="m-0 text-muted">
                            Showing <span>{{ $users->firstItem() }}</span> to
                            <span>{{ $users->lastItem() }}</span> of <span>{{ $users->total() }}</span>
                            entries
                        </p>
                        <ul class="pagination m-0 ms-auto">
                            <!-- Botón de página anterior -->
                            @if ($users->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link" tabindex="-1" aria-disabled="true">prev</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">prev</a>
                                </li>
                            @endif

                            <!-- Enlaces de páginas -->
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Botón de página siguiente -->
                            @if ($users->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link" tabindex="-1" aria-disabled="true">next</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@push('scripts2')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const listItems = document.querySelectorAll('.list-group-item');

            searchInput.addEventListener('keyup', function() {
                const query = searchInput.value.toLowerCase();

                listItems.forEach(item => {
                    const name = item.querySelector('.text-reset').textContent.toLowerCase();
                    const email = item.querySelector('.text-secondary').textContent.toLowerCase();

                    if (name.includes(query) || email.includes(query)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endpush
