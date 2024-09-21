  <div class="row">
      <div class="col-md-5 mt-4">
          <div class="d-flex justify-content-between">
              <div class="text-start">
                  <label for="information" class="label-text">
                      Información Principal
                  </label>
              </div>
              <div class="text-end">
                  <button class="edit-btn" type="button" onclick="OneSection()">
                      Editar <img src="{{ asset('svg/user/Edit.svg') }}" class="img-fluid w-50" alt="">
                  </button>

              </div>
          </div>
      </div>
  </div>
  <div class="row mt-3">
      <div class="col-md-4 mb-3">
          <label for="first_name" class="label-form">Nombre*</label>
          <input disabled required type="text" id="first_name" name="first_name" class="form-control input"
              placeholder="Nombre de usuario" value="{{ Auth::guard('custom_users')->user()->first_name }}">
      </div>
      <div class="col-md-4 mb-3">
          <label for="last_name" class="label-form">Apellido Paterno*</label>
          <input disabled required type="text" name="last_name" id="last_name" class="form-control input"
              placeholder="Apellido paterno" value="{{ Auth::guard('custom_users')->user()->last_name }}">
      </div>
      <div class="col-md-4 mb-3">
          <label for="middle_name" class="label-form">Apellido Materno*</label>
          <input disabled required type="text" name="middle_name" id="middle_name" class="form-control input"
              placeholder="Apellido materno" value="{{ Auth::guard('custom_users')->user()->middle_name }}">
      </div>
      <div class="col-md-4">
          <div class="mb-3">
              <label for="email" class="label-form">Correo electrónico*</label>
              <input disabled required type="text" name="email" id="email" class="form-control input"
                  placeholder="Correo usuario" value="{{ Auth::guard('custom_users')->user()->email }}">
          </div>
          <div class="mb-3">
              <label for="password" class="label-form">Contraseña*</label>
              <input type="text" disabled name="password" id="password" class="form-control input"
                  placeholder="Contraseña usuario">
          </div>
      </div>
      {{-- <div class="col-md-4">
          <div class="mb-3">
              <label for="name" class="label-form">Apellido Paterno*</label>
              <input disabled required type="text" name="last_name" id="last_name" class="form-control input"
                  placeholder="Nombre de usuario" value="{{ Auth::guard('custom_users')->user()->last_name }}">
          </div>
      </div> --}}
      {{-- <div class="col-md-4">
          <div class="mb-3">
              <label for="name" class="label-form">Apellido Materno*</label>
              <input disabled required type="text" name="middle_name"  id="middle_name" class="form-control input"
                  placeholder="Nombre de usuario" value="{{ Auth::guard('custom_users')->user()->middle_name }}">
          </div>
      </div> --}}
  </div>
