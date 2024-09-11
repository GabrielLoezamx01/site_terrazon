<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators d-none d-md-flex">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-over-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title-banner">Haz realidad tus sueños y <br> encuentra tu lugar en Terrazon</h1>
                    </div>
                    <div class="col-12 offset-2 col-md-8 d-none d-md-inline">
                        <form method="GET" action="/propiedades">
                            <div class="card ">
                                <div class="row">
                                    <div class="col-3 item">
                                        <div class="item-content">
                                            <label for="ubicacion">Ubicación</label>
                                            <select class="form-select" id="location" name="location">
                                                <option value="0" selected>Selecciona la ubicación</option>
                                                @foreach ($ubicaciones as $key => $u)
                                                <option value="{{$u['id']}}"
                                                    @if ($key==0)
                                                    selected
                                                    @endif>{{ $u["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3 item">
                                        <div class="item-content">
                                            <label for="ubicacion">Tipo de propiedad</label>
                                            <select class="form-select" id="type" name="type">
                                                <option value="0" selected>Selecciona el tipo</option>
                                                @foreach ($typesProperties as $key => $tp)
                                                <option value="{{$tp['id']}}"
                                                    @if ($key==0)
                                                    selected
                                                    @endif>{{ $tp["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3 item">
                                        <div class="item-content">
                                            <label for="ubicacion">Presupuesto</label>
                                            <select class="form-select" if="budget" name="budget">
                                                <option value="0" selected>Selecciona un rango</option>
                                                @foreach ($range as $key => $r)
                                                <option value="{{$r['value']}}"
                                                    @if ($key==0)
                                                    selected
                                                    @endif>{{ $r["label"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3 item d-flex align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 text-center d-inline d-md-none">
                        <span class="header-icon-filter fa-stack fa-2x" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fa-solid fa-circle fa-stack-2x fa-inverse"></i>
                            <i class="fa-solid fa-chevron-down fa-stack-1x "></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item active">
            <img src="{{ asset('images/bg-01.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/bg-01.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/bg-01.png') }}" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5">
        <div class="modal-content">
            <button type="button" class=" modal-close d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-chevron-up"></i>
            </button>
            <div class="modal-body mt-3 p-5">
                <form action="/propiedades">
                    <div clas="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <h5 for="ubicacion">Ubicación</h5>
                                <select class="form-select" id="location" name="location" style="border: none;">
                                    <option value="0" selected>Selecciona la ubicación</option>
                                    @foreach ($ubicaciones as $key => $u)
                                    <option value="{{$u['id']}}"
                                        @if ($key==0)
                                        selected
                                        @endif>{{ $u["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <h5 for="ubicacion">Tipo de propiedad</h5>
                                <select class="form-select" id="type" name="type" style="border: none;">
                                    <option value="0" selected>Selecciona el tipo</option>
                                    @foreach ($typesProperties as $key => $tp)
                                    <option value="{{$tp['id']}}"
                                        @if ($key==0)
                                        selected
                                        @endif>{{ $tp["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="ubicacion">Presupuesto</label>
                                <select class="form-select" if="budget" name="budget" style="border: none;">
                                    <option value="0" selected>Selecciona un rango</option>
                                    @foreach ($range as $key => $r)
                                    <option value="{{$r['value']}}"
                                        @if ($key==0)
                                        selected
                                        @endif>{{ $r["label"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12  pt-3">
                            <div class="mb-3">
                                <div class="d-grid gap-2 ">
                                    <button class="btn btn-secondary text-white">BUSCAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>