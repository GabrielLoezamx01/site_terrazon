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
                        <div class="card ">
                            <div class="row">
                                <div class="col-3 item">
                                    <div class="item-content">
                                        <label for="ubicacion">Ubicación</label>
                                        <select class="form-select">
                                            <option selected>Selecciona la ubicación</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 item">
                                    <div class="item-content">
                                        <label for="ubicacion">Tipo de propiedad</label>
                                        <select class="form-select">
                                            <option selected>Selecciona el tipo</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 item">
                                    <div class="item-content">
                                        <label for="ubicacion">Presupuesto</label>
                                        <select class="form-select">
                                            <option selected>Selecciona un rango</option>
                                            <option value="1">Opción 1</option>
                                            <option value="2">Opción 2</option>
                                            <option value="3">Opción 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 item d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center d-inline d-md-none">
                        <span class="header-icon-filter fa-stack fa-2x">
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