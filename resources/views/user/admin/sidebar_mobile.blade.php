  <div class="col-md-12 d-md-none order-1">
      <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
              <div class="d-flex"
                  style="overflow-x: auto; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; white-space: nowrap; padding: 0; margin: 0; scrollbar-width: none;">
                  <ul class="navbar-nav flex-row" style="gap: 1rem; white-space: nowrap; padding: 0; margin: 0;">
                      <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link {{ Request::is('custom/home') ? 'active' : '' }}"
                              href="{{ url('/custom/home') }}">Perfil</a>
                      </li>
                      {{-- <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link" href="#">Seguridad</a>
                      </li>
                      <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link" href="#">Preferencias</a>
                      </li> --}}

                      <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link {{ Request::is('custom/favorite') ? 'active' : '' }}"
                              href="{{ url('/custom/favorite') }}">Favoritos</a>
                      </li>
                      {{-- <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link" href="#">Comunicación</a>
                      </li> --}}
                      {{-- <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link" href="{{ url('custom/privacy') }}">A</a>
                      </li> --}}

                      <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link {{ Request::is('custom/privacy') ? 'active' : '' }}"
                              href="{{ url('/custom/privacy') }}">Aviso de Privacidad</a>
                      </li>
                      {{-- <li class="nav-item" style="scroll-snap-align: start">
                          <a class="nav-link" href="#">Soporte y Ayuda</a>
                      </li> --}}
                  </ul>
              </div>
          </div>
      </nav>
      <div class="p-3"></div>
  </div>
