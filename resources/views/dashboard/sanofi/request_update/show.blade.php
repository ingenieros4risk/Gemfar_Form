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
                        <label>Orden de Compra:</label>
                        <div class="col-sm-6">
                          <a href="{{ route('sanofi.purchaseorder',$request_risk->id)}}" target="_blank">Descargar Orden de Compra</a>
                        </div>
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
        <a href="{{ route('genfar-request-risk.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
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
                <form method="POST" action="{{ route('genfar.cancel') }}" id="form-cancel" enctype="multipart/form-data" required>
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
        @if($request_risk->status_id == 4 || $request_risk->status_id == 6)
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
        @role('admin')
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Administración Solicitud Sanofi Risk') }}
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form method="POST" action="{{ route('genfar.manage') }}" id="form-manage" enctype="multipart/form-data" required>
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{ $request_risk->id }}">
                  <input type="hidden" name="user" value="{{ $user }}">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Estado de la Solicitud:</label>
                            <select name="status" id="status" class="form-control input-lg">
                                <option value="">--- Seleccione Estado ---</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label>Observación del cambio de estado:</label>
                      <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-block btn-warning" form="form-manage" type="submit">
                            <span>{{ __('Cambiar') }}</span>
                        </button>
                    </div>
                  </div>                
                </form>
              </div>
            </div>
          </div>
        </div>
        @endrole
        @if($request_risk->status_id == 6 || $request_risk->status_id == 7)
        @role('buyer')
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Formulario Interno Sanofi') }}
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('sanofi.buyer') }}" id="form-buyer" enctype="multipart/form-data" required>
                  {{csrf_field()}}
              <input type="hidden" name="id" value="{{ $request_risk->id }}">
              <input type="hidden" name="user" value="{{ $user }}">
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>HACAT:</label>
                        <select name="hacat" id="hacat" class="form-control input-lg">
                            <option value="">--- Seleccione HACAT ---</option>
                            @foreach($hacats as $hacat)
                                <option value="{{ $hacat->id }}">{{ $hacat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Condición de Pago:</label>
                        <input class="form-control" type="text" name="condicion_pago" id="condicion_pago">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nombre Comprador:</label>
                        <input class="form-control" type="text" name="nombre_comprador" id="nombre_comprador">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Área Solicitante:</label>
                        <input class="form-control" type="text" name="area_solicitante" id="area_solicitante">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Requiere Due Diligence:</label>
                        <input class="form-control" type="text" name="due_diligence" id="due_diligence">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-block btn-danger" form="form-buyer" type="submit">
                        <svg class="c-icon mr-2">
                          <use xlink:href="/icons/sprites/free.svg#cil-media-stop"></use>
                        </svg><span>{{ __('Submit') }}</span>
                    </button>
                </div>
              </div>
            </form>
          </div>
        </div>        
        @endrole
        @endif        
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection