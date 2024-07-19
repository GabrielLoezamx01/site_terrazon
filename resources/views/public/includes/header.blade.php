<header class="d-flex align-items-center d-none d-md-flex">
    <div class="container d-flex bd-highligh align-items-center">
        <div class="p-2 bd-highlight">
            <a href="mailto:{{ config('app.contact_email') }}">{{config('app.contact_email')}}</a>
        </div>
        <div class="p-2 bd-highlight">
            <a href="tel:{{ config('app.contact_tel') }}">{{config('app.contact_tel')}}</a>
        </div>
        <div class="ms-auto p-2 bd-highlight">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión / registrarme</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>
<div class="menu-container d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 d-flex align-items-center justify-content-start">
                <img src="{{ asset('images/logo-terrazon.png') }}" alt="Logo" class="header-logo d-none d-md-block">
                <img src="{{ asset('images/logo-terrazon-o.png') }}" alt="Logo" class="header-logo d-block d-md-none">
            </div>
            <div class="col-6 col-md-9 d-flex d-md-block align-items-center justify-content-end">
                <div class="menu d-flex justify-content-center d-none d-md-flex">
                    <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ route('inicio') }}">Home</a>
                    <a class="{{ Request::is('propiedades') ? 'active' : '' }}" href="{{ route('propiedades') }}">Propiedades</a>
                    <a class="{{ Request::is('acercade') ? 'active' : '' }}" href="{{ route('acercade') }}">Acerca de nosotros</a>
                    <a class="{{ Request::is('agentes') ? 'active' : '' }}" href="{{ route('agentes') }}">Agentes</a>
                    <a class="{{ Request::is('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                </div>
                <button class="button-menu float-end d-flex align-items-center d-flex d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuContent" aria-controls="menuContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="collapse menu-content-mobile" id="menuContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('inicio') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('propiedades') ? 'active' : '' }}" aria-current="page" href="{{ route('propiedades') }}">Propiedades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('acercade') ? 'active' : '' }}" aria-current="page" href="{{ route('acercade') }}">Acerca de nosotros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('agentes') ? 'active' : '' }}" aria-current="page" href="{{ route('agentes') }}">Agentes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('contacto') ? 'active' : '' }}" aria-current="page" href="{{ route('contacto') }}">Contacto</a>
        </li>
    </ul>
</div>