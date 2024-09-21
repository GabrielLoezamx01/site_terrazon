  <div class="row">
      <div class="col-md-5 mt-4">
          <div class="d-flex justify-content-between">
              <div class="text-start">
                  <label for="information" class="label-text">
                      Información telefónica
                  </label>
              </div>
              <div class="text-end">
                  <button class="edit-btn" type="button" onclick="TreeSection()">
                      Editar <img src="{{ asset('svg/user/Edit.svg') }}" class="img-fluid w-50" alt="">
                  </button>

              </div>
          </div>
      </div>
  </div>
  <div class="row mt-3">
      <div class="col-md-4">
          <div class="mb-3">
              <label for="name" class="label-form">Teléfono móvil*</label>
              <input disabled required type="number" name="phone" id="phone" class="form-control input"
                  maxlength="14" oninput="if(this.value.length > 14) this.value = this.value.slice(0, 14);" value="{{ Auth::guard('custom_users')->user()->cell_phone ?? '' }}">
          </div>

          <div class="mb-3">
              <label for="email" class="label-form">Teléfono fijo</label>
              <input disabled required type="text" name="phone2" id="phone2" class="form-control input"
                  maxlength="14" value="{{ Auth::guard('custom_users')->user()->landline ?? '' }}">
          </div>

      </div>
  </div>
  </div>
