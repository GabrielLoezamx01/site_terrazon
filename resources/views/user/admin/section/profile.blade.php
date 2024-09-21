  <div class="m-3">
      <h2 class="sub-title mt-4">
          Perfil de usuario
      </h2>
      @include('user.admin.alerts')
      <form method="POST" action="{{ route('update_profile') }}">
          @csrf
          @include('user.admin.section.information')
          @include('user.admin.section.aditional')
          @include('user.admin.section.phone')

          <div class="row">
              <div class="col-12 col-md-10 m-3">
                  <div class="row justify-content-between align-items-center">
                      <div class="col-12 col-md-auto text-start mb-2 mb-md-0">
                          <span class="privacy-link">
                              Consulta nuestro <a href="{{ url('custom/privacy') }}">Aviso de Privacidad</a>
                          </span>
                      </div>

                      <div class="col-12 col-md-auto text-end mt-2 mt-md-0">
                          <div class="d-flex justify-content-center justify-content-md-end">
                              <button type="button" onclick="location.href=''" class="btn cancel-btn me-2">
                                  CANCELAR
                              </button>
                              <button type="submit" class="btn save-btn">
                                  GUARDAR
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="p-3"></div>
      </form>
  </div>
