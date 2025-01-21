@extends('dashboard.authBase')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>{{ __('Registro de Usuarios') }}</h1>
                    <p class="text-muted">Crear cuenta</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Nombre') }}" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Contraseña') }}" name="password" required>
                    </div>
                    <!--
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-camera"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" id="file-input" type="file" placeholder="{{_('Imagen de Perfi') }}" name="profile_image">  
                    </div>
                  -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-face"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Cargo') }}" name="position" value="{{ old('position') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-check"></use>
                            </svg>
                          </span>
                        </div>
                        <select class="form-control" placeholder="{{ __('Roles:') }}" id="status" name="status" required>
                              <option value="0" disabled>Estado</option>
                              <option value="1">Activo</option>
                              <option value="2">Desactivado</option>
                        </select>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Roles:</label>
                        <div class="col-md-9 col-form-label">
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" id="medical-checkbox" name="checkbox_rol[]" type="checkbox" value="genfar">
                            <label class="form-check-label" for="medical-checkbox">Genfar</label>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-block btn-success" type="submit">{{ __('Registrar') }}</button>
                      <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('Regresar') }}</a>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection