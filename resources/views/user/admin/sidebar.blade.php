<div class="col-md-3 d-none d-md-block order-md-1">
    <div class="sidebar">
        <div class="col-md-12">
            <div class="p-2"></div>
            <h1 class="label ms-3 mt-5 color-label">
                Hola,
                {{ Auth::guard('custom_users')->user()->first_name }}
            </h1>
        </div>
        <ul class="list-group mt-5">
            <li class="list-group-item">
                <a href="{{ url('/custom/home') }}">Perfil de Usuario</a>
            </li>
            <li class="list-group-item">
                <a href="#">Seguridad</a>
            </li>
            <li class="list-group-item">
                <a href="#">Preferencias de Búsqueda</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('custom/favorite') }}">Mis favoritos</a>
            </li>
            <li class="list-group-item">
                <a href="#">Comunicación</a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('custom/privacy') }}">Aviso de privacidad y legal</a>
            </li>
            <li class="list-group-item">
                <a href="#">Soporte y ayuda</a>
            </li>
        </ul>
    </div>
</div>
