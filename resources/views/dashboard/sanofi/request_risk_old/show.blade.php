@extends('dashboard.base')
@section('css')

<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">

@endsection
@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Información de la Solicitud') }}
              <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                <a target="_blank" href="#">
                  <svg class="c-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-cloud-download"></use>
                  </svg>          
                </a>
              </button>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Estado Solicitud:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->status_id_name}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Tipo de Solicitud:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->request_type}}" >
                      </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Solicitante:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->user_solicitante}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Email del Solicitante:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->user_email}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Sociedad Solicitante:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->country_homologation}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Proveedor:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->sanofi_provider}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Países Solicitados:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->paises}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Fecha de Solicitud:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->date_solicitud}} (GMT-5)" >
                      </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Nombre del Proveedor:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->provider_name}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Email del Proveedor:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->provider_email}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Teléfono del Proveedor:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->provider_phone}}" >
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Nacionalidad de Origen:</label>
                          <input class="form-control" type="text" value="{{ $request_risk->nacionality}}" >
                      </div>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Observación:</label>
                          <textarea class="form-control" rows="9" placeholder="" >{{ $request_risk->observation}}</textarea>
                      </div>
                  </div>
                </div>                
            </div>
        </div>
        <a href="{{ route('sanofi-old.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
      </div>
      <div class="col-sm-6">
        @if($request_risk->status_id == 1 || $request_risk->status_id == 3)
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Cancelar Solicitud') }}
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form method="POST" action="{{ route('sanofi.cancel') }}" id="form-cancel" enctype="multipart/form-data" required>
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{ $request_risk->id }}">
                  <input type="hidden" name="user" value="{{ $user }}">
                  <div class="form-group">
                      <label>Observación de la cancelación:</label>
                      <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-block btn-danger" form="form-cancel" type="submit">
                            <svg class="c-icon mr-2">
                              <use xlink:href="/icons/sprites/free.svg#cil-media-stop"></use>
                            </svg><span>{{ __('Cancelar') }}</span>
                        </button>
                    </div>
                  </div>                
                </form>
              </div>
            </div>
          </div>
        </div>        
        @endif
<!--        @if($request_risk->status_id == 4 || $request_risk->status_id == 6)
        @role('sanofi')
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Adicionar MIGO y Good Recieve') }}
            <span style="color: red">Recuerde que solo SANOFI puede proporcionar el código MIGO o GR</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form method="POST" action="{{ route('sanofi.migo') }}" id="form-migo" enctype="multipart/form-data" required>
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{ $request_risk->id }}">
                  <input type="hidden" name="user" value="{{ $user }}">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>MIGO or GR (Good Recieve):</label>
                            <input class="form-control" type="text" name="migo" required autofocus>
                        </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-block btn-success" form="form-migo" type="submit">
                            <svg class="c-icon mr-2">
                              <use xlink:href="/icons/sprites/free.svg#cil-media-stop"></use>
                            </svg><span>{{ __('Actualizar MIGO') }}</span>
                        </button>
                    </div>
                  </div>                
                </form>
              </div>
            </div>
          </div>
        </div>        
        @endrole
        @endif

-->
        
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection