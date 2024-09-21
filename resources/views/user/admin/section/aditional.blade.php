  <div class="row">
      <div class="col-md-5 mt-4">
          <div class="d-flex justify-content-between">
              <div class="text-start">
                  <label for="information" class="label-text">
                      Información Adicional
                  </label>
              </div>
              <div class="text-end">
                  <button class="edit-btn" type="button" onclick="TwoSection()">
                      Editar <img src="{{ asset('svg/user/Edit.svg') }}" class="img-fluid w-50" alt="">
                  </button>

              </div>
          </div>
      </div>
  </div>
  <div class="row mt-3">
      <div class="col-md-4">
          <div class="mb-3">
              <label for="name" class="label-form">Género*</label>
              <div class="position-relative">
                  <img src="{{ asset('svg/select.svg') }}" class="icon-left" alt="Icono">
                  <select disabled name="sex" id="sex" class="form-control input">
                      <option value="M"
                          {{ Auth::guard('custom_users')->user()->gender === 'M' ? 'selected' : '' }}>
                          Masculino
                      </option>
                      <option value="F"
                          {{ Auth::guard('custom_users')->user()->gender === 'F' ? 'selected' : '' }}>
                          Femenino
                      </option>
                  </select>
              </div>



          </div>
          <div class="mb-3 mt-5">
              <label for="password" class="label-form">Ocupación*</label>
              <div class="position-relative">
                  <img src="{{ asset('svg/select.svg') }}" class="icon-left" alt="Icono">
                  <select disabled name="occupations" id="occupations" class="form-control input">
                      @foreach ($occupations as $item)
                          <option value="{{ $item->id }}"
                              {{ Auth::guard('custom_users')->user()->occupation == $item->id ? 'selected' : '' }}>
                              {{ $item->name }}
                          </option>
                      @endforeach
                  </select>

              </div>
          </div>

      </div>
      <div class="col-md-4">
          <div class="mb-3">
              <label for="name" class="label-form">Fecha de nacimiento*</label>
              <input disabled required type="date" id="birth_date" name="birth_date"
                  value="{{ Auth::guard('custom_users')->user()->date_of_birth ?? '' }}" class="form-control input">
          </div>

      </div>
  </div>
