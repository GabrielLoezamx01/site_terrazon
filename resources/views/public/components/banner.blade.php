<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators ">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 5"></button>
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
                            <div class="card card-filter">
                                <div class="row">
                                    <div class="col-3 item">
                                        <div class="item-content">
                                            <label for="ubicacion">Ubicación</label>
                                            <div class="custom-select">
                                                <select id="location" name="location">
                                                    <option value="" selected>Cualquiera</option>
                                                    @foreach ($ubicaciones as $key => $u)
                                                    <option value="{{$u['id']}}">{{ $u["name"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 item">
                                        <div class="item-content">
                                            <label for="ubicacion">Tipo de propiedad</label>
                                            <div class="custom-select">
                                                <select id="type" name="type[]">
                                                    <option value="" selected>Cualquiera</option>
                                                    @foreach ($typesProperties as $key => $tp)
                                                    <option value="{{$tp['id']}}">{{ $tp["name"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 item">
                                        <div class="item-content">
                                            <label for="ubicacion">Presupuesto</label>
                                            <div class="custom-select">
                                                <select class="form-select" id="budget" name="budget">
                                                    @foreach ($range as $key => $r)
                                                    <option value="{{$r['value']}}"
                                                        @if ($key==0)
                                                        selected
                                                        @endif>{{ $r["label"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                            <i class="fa-solid fa-chevron-down fa-stack-1x text-tertiary "></i>
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
                <i class="fas fa-chevron-up text-tertiary"></i>
            </button>
            <div class="modal-body mt-3 p-5">
                <form action="/propiedades">
                    <div clas="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <h5 for="ubicacion">Ubicación</h5>
                                <div class="custom-select">
                                    <select id="location" name="location" style="border: none;">
                                        <option value="" selected>Cualquiera</option>
                                        @foreach ($ubicaciones as $key => $u)
                                        <option value="{{$u['id']}}">{{ $u["name"]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <h5 for="ubicacion">Tipo de propiedad</h5>
                                <div class="custom-select">
                                    <select id="type" name="type[]" style="border: none;">
                                        <option value="" selected>Cualquiera</option>
                                        @foreach ($typesProperties as $key => $tp)
                                        <option value="{{$tp['id']}}">{{ $tp["name"]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <h5 for="ubicacion">Presupuesto</h5>
                                <div class="custom-select">
                                    <select id="budget" name="budget" style="border: none;">
                                        @foreach ($range as $key => $r)
                                        <option value="{{$r['value']}}">{{ $r["label"]}}</option>
                                        @endforeach
                                    </select>
                                </div>
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