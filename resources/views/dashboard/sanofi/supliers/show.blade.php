@extends('dashboard.base')
@section('css')

<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">

@endsection
@section('content')
@if(session()->get('error'))
  <div class="alert alert-warning" rol="alert">
    {{ session()->get('error') }}  
  </div><br />
@endif

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Gestionar Tarea : TASK-0{{ $request_risk->id }}
          </div>
          @isset($request_risk->attachment)
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <div class="col-sm-6">
                        <label>Adjunto de la tarea:</label>
                      </div>
                      <div class="col-sm-6">
                        <a href="{{ route('genfar.downloadattach',$request_risk->id)}}" target="_blank">Descargar Adjunto</a>
                      </div>
                  </div>
              </div>
            </div>
          @endisset

          @if($request_risk->confirm_file != null)
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <div class="col-sm-6">
                        <label>Descargar Adjunto de la Confirmación:</label>
                      </div>
                      <div class="col-sm-6">
                        <a href="{{ route('genfar.downloadattach_confirmation',$request_risk->id)}}" target="_blank">Descargar Adjunto</a>
                      </div>
                  </div>
              </div>
            </div>
          @endif

          @if($request_risk->approve_file != null)
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <div class="col-sm-6">
                        <label>Descargar Adjunto de la Aprobación:</label>
                      </div>
                      <div class="col-sm-6">
                        <a href="{{ route('genfar.downloadattach_aprobation',$request_risk->id)}}" target="_blank">Descargar Adjunto</a>
                      </div>
                  </div>
              </div>
            </div>
          @endif
          
          @isset($request_risk->id_genfar)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-sm-6">
                          <label>Ver Solicitud:</label>
                        </div>
                        <div class="col-sm-6">
                          <a href="{{ url('/genfar-request-risk/' . $request_risk->id_genfar) }}" target="_blank">Ver Solicitud de Genfar</a>
                        </div>
                    </div>
                </div>
              </div>
          @endisset
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> {{ __('Información de la Solicitud') }}
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tarea:</label>
                    <input class="form-control" type="text" value="{{ $request_risk->action}}" readonly >
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Estado Tarea:</label>
                    @if($request_risk->status == 0)
                    <input class="form-control" type="text" value="PENDIENTE" readonly >
                    @elseif($request_risk->status == 1)
                      <input class="form-control" type="text" value="FINALIZADO" readonly >
                    @else
                      <input class="form-control" type="text" value="RECHAZADO" readonly >
                    @endif                    
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Estado de Aprobación:</label>
                    @if($request_risk->approve == "APROBAR")
                      <input class="form-control" type="text" value="APROBADO" readonly >
                    @elseif($request_risk->approve == "RECHAZAR")
                      <input class="form-control" type="text" value="RECHAZADO" readonly >
                    @else
                      <input class="form-control" type="text" value="SIN GESTIONAR" readonly >
                    @endif
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Estado de Confirmación:</label>
                    @if($request_risk->confirm == "CONFIRMAR")
                      <input class="form-control" type="text" value="CONFIRMADO" readonly >
                    @elseif($request_risk->confirm == "RECHAZAR")
                      <input class="form-control" type="text" value="RECHAZADO" readonly >
                    @else
                      <input class="form-control" type="text" value="SIN GESTIONAR" readonly >
                    @endif
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Solicitante:</label>
                    <input class="form-control" type="text" value="{{ $request_risk->solicitante}}" readonly >
                </div>
            </div>
          </div>
        </div>
      </div>
      <a href="{{ route('genfar-supliers.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
    </div>
    <hr>
    <hr>
    <hr>

    <div class="row">
      <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Información de la Solicitud') }}</div>
            <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                    <label>Sociedad:</label>
                    <input class="form-control" type="text" value="{{ $request_risk->country_homologation}}" readonly >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                    <label>Países:</label>
                    <input class="form-control" type="text" value="{{ $request_risk->paises}}" readonly >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo Proveedor:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->genfar_provider}}" readonly >
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>HACAT:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->hacat}}" readonly >
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>INDUSTRY KEY:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->industrykey}}" readonly >
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nacionalidad:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->nacionality}}" readonly >
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nombre del Proveedor:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->provider_name}}" readonly >
                  </div>
              </div>
            </div>             
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>TAX ID:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->tax_id}}" readonly >
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Correo Electrónico del Proveedor:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->provider_mail}}" readonly >
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Teléfono del Proveedor:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->provider_phone}}" readonly >
                  </div>
              </div>
            </div>
            @isset($request_risk->supplier_code_co_q)
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>SUPPLIER CODE COLOMBIA:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->supplier_code_co}}" readonly >
                  </div>
              </div>
            </div>
            @endisset
            @isset($request_risk->supplier_code_ec_q)
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>SUPPLIER CODE ECUADOR:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->supplier_code_ec}}" readonly >
                  </div>
              </div>
            </div>
            @endisset
            @isset($request_risk->supplier_code_pe_q)
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>SUPPLIER CODE PERÚ:</label>
                      <input class="form-control" type="text" value="{{ $request_risk->supplier_code_pe}}" readonly >
                  </div>
              </div>
            </div>
            @endisset
            <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Comentarios:</label>
                          <textarea class="form-control" rows="9" readony>{{ $request_risk->comments}}</textarea>
                      </div>
                  </div>
            </div>
          </div>
      </div>
    </div>

    @if($request_risk->confirm == "RECHAZAR" || $request_risk->approve == "RECHAZAR")

      <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Edición de la Solicitud') }}</div>
            <div class="card-body">
            <form method="POST" action="/genfar-supliers/{{$request_risk->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if($request_risk != null)
                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                    @endif
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Modificar Tarea:</label>
                                <select name="action" id="action" class="form-control input-lg" required>
                                    <option value="">--- Seleccione una tarea ---</option>
                                    <option value="Crear">Crear</option>
                                    <option value="Editar">Editar</option>
                                    <option value="Activar">Activar</option>
                                    <option value="Bloquear">Bloquear</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Editar la sociedad Solicitante:</label>
                                <select name="country_homologation" id="country_homologation" class="form-control input-lg" required>
                                    <option value="">--- Seleccione la sociedad Solicitante ---</option>
                                    @foreach($societies as $society)
                                        <option value={{ $society->id }}>{{ $society->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_homologation') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Editar el tipo de Proveedor</label>
                                <select name="genfar_provider" id="genfar_provider" class="form-control input-lg" required>
                                    <option value="">--- Seleccione tipo proveedor ---</option>
                                    @foreach($providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                    @endforeach
                                        <option value="7">Empleados</option> 
                                </select>
                                @error('genfar_provider') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" id ="seleccionHACAT">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Editar HACAT:</label>
                                <select name="hacat" id="hacat" class="form-control input-lg">
                                    <option value="">--- Seleccione HACAT ---</option>
                                    @foreach($hacats as $hacat)
                                        <option value="{{ $hacat->name }}">{{ $hacat->name }}</option>
                                    @endforeach
                                </select>
                                @error('hacat') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" id ="seleccionIndustryKey">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Editar Industry Key :</label>
                                <select name="industrykey" id="industrykey" class="form-control input-lg">
                                    <option value="">--- Seleccione Industry Key ---</option>
                                    @foreach($industrykeys as $keys)
                                        <option value="{{ $keys->name }}">{{ $keys->name }}</option>
                                    @endforeach
                                </select>
                                @error('industrykey') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    @if($request_risk != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Editar Nacionalidad del proveedor:</label>
                                    <input class="form-control" type="text" name="nacionality" value="{{$request_risk->nacionality}}"  required>
                                </div>
                            </div>
                        </div>
                    
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Nacionalidad del proveedor:</label>
                                    <input class="form-control" type="text" name="nacionality"  required>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label">Editar Países </label>
                                <div class="col-md-9 col-form-label">
                                  <div class="form-check checkbox">
                                      <label><input type="checkbox"  id="check_co" name="paises[]" value="2"> Colombia</label>
                                  </div>
                                  <div class="form-check checkbox">
                                      <label><input type="checkbox" id="check_pe" name="paises[]" value="3"> Perú</label>
                                  </div>
                                  <div class="form-check checkbox">
                                      <label><input type="checkbox" id="check_ec" name="paises[]" value="4"> Ecuador</label>
                                  </div>
                                  @error('paises') <span class="text-danger error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" id="suplierCodeForm">
                        <div class="row" id="suplierCodeForm_CO">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Supplier Code Colombía:</label>
                                    <input class="form-control" type="text" name="suplier_code_co" id="suplier_code_co" value="{{ $request_risk->supplier_code_co ? $request_risk->supplier_code_co:" "}}">
                                </div>
                            </div>
                        </div>

                        <div class="row" id="suplierCodeForm_PE">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Supplier Code Perú:</label>
                                    <input class="form-control" type="text" name="suplier_code_pe" id="suplier_code_pe" value="{{ $request_risk->supplier_code_pe ? $request_risk->supplier_code_pe:" "}}">
                                </div>
                            </div>
                        </div>

                        <div class="row" id="suplierCodeForm_EC">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Supplier Code Ecuador:</label>
                                    <input class="form-control" type="text" name="suplier_code_ec" id="suplier_code_ec" value="{{ $request_risk->supplier_code_ec ? $request_risk->supplier_code_ec:" "}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($request_risk != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Nombre del Proveedor:</label>
                                    <input class="form-control" type="text" value="{{$request_risk->provider_name}}" name="name_proveedor" required>
                                </div>
                            </div>
                        </div>
                    
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Nombre del Proveedor:</label>
                                    <input class="form-control" type="text" name="name_proveedor" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($request_risk != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Tax ID:</label>
                                    <input class="form-control" type="text"  value="{{$request_risk->tax_id}}" name="tax_id" id="tax_id" required>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Tax ID:</label>
                                    <input class="form-control" type="text" name="tax_id" id="tax_id" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($request_risk != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Correo electrónico del Proveedor:</label>
                                    <input class="form-control" value="{{$request_risk->provider_mail}}" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Correo electrónico del Proveedor:</label>
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($request_risk != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Teléfono del Proveedor:</label>
                                    <input class="form-control" type="text" value="{{$request_risk->provider_phone}}" name="telefono" required >
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Teléfono del Proveedor:</label>
                                    <input class="form-control" type="text" name="telefono" required >
                                </div>
                            </div>
                        </div>
                    @endif

                    <hr>
                                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Reemplazar Adjunto:</label>
                                <label>Si se requiere subir más de un archivo se debe comprimir en cualquier formato:</label>
                                <input class="form-control" type="file" name="attachment" id="attachment">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Comentarios:</label>
                                <textarea class="form-control" name="comments" id="comments" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                            </div>
                        </div>
                    </div>
                
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-block btn-success" type="submit">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="/icons/sprites/free.svg#cil-media-play"></use>
                                </svg><span>{{ __('Solicitar') }}</span>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ url('/genfar-supliers') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
                        </div>
                    </div>
                </form>
          </div>
      </div>
      @endif
      <hr>
    
    @role('eprovedores')
      @if($request_risk->approve != "APROBADO")
      <div class="row">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Formulario Aprobación Genfar') }}
          </div>
          <div class="card-body">
            <!-- FORMULARIO APROBAR SUPLIER -->
            <div id="div-genfar-aprobar">
              <div class="card">
                <div class="card-header">
                  <strong class="card-title">APROBAR TAREA</strong>
                </div>
                <div class="card-body">
                  <form action="{{route('genfar.aprobar')}}" id="form-genfar-aprobar" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $request_risk->id }}">
                    <div class="form-group">
                        @isset($request_risk->supplier_code_co_q)
                        <div class="row">
                          <div class="col-sm-9">
                              <div class="form-group">
                                  <label>Supplier Code Colombía:</label>
                                  <input class="form-control" type="text" value="{{ $request_risk->supplier_code_co ?? '' }}" name="supplier_code_co" id="supplier_code_co">
                              </div>
                          </div>
                        </div>
                        @endisset
                        @isset($request_risk->supplier_code_ec_q)
                        <div class="row">
                          <div class="col-sm-9">
                              <div class="form-group">
                                  <label>Supplier Code Ecuador:</label>
                                  <input class="form-control" type="text" value="{{ $request_risk->supplier_code_ec ?? '' }}" name="supplier_code_ec" id="supplier_code_ec">
                              </div>
                          </div>
                        </div>
                        @endisset                        
                        @isset($request_risk->supplier_code_pe_q)
                        <div class="row">
                          <div class="col-sm-9">
                              <div class="form-group">
                                  <label>Supplier Code Perú:</label>
                                  <input class="form-control" type="text" value="{{ $request_risk->supplier_code_pe ?? '' }}" name="supplier_code_pe" id="supplier_code_pe">                              </div>
                          </div>
                        </div>
                        @endisset

                      <div class="col col-md-9">
                        <div class="form-check" id="form-check-resume" required>
                          <div class="radio">
                            <label for="radio1" class="form-check-label ">
                            <input type="radio" name="resumen" value="APROBAR" class="form-check-input" required >
                              Aprobar
                            </label>
                          </div>
                          <div class="radio">
                            <label for="radio2" class="form-check-label ">
                            <input type="radio" name="resumen" value="RECHAZAR" class="form-check-input" required>
                            Rechazar
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Adjunto Aprobación:</label>
                                <input class="form-control" type="file" name="approve_file" id="approve_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="observacion" class="control-label mb-1">Comentarios / Observaciones a la Aprobación.</label>
                        <textarea form="form-genfar-aprobar" id="observacion" name="observacion" type="text" class="form-control cc-info-soporte valid" data-val="true" data-val-required="Please enter the link font"
                        aria-required="true" aria-invalid="false" placeholder="p. ej. Motivo de aceptación o rechazo." required></textarea>
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-info-soporte" data-valmsg-replace="true"></span>
                    </div>
                    <div class="row form-group">
                      <div class="col col-12 col-md-9">
                          <button type="submit" form="form-genfar-aprobar" class="btn btn-outline-primary btn-block">
                            ENVIAR
                          </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    @endrole
    <hr>
    <hr>
    @role('masterdata')
      @if($request_risk->approve != "RECHAZAR" && $request_risk->confirm != "CONFIRMADO" )
      <!-- FORMULARIO EN CONFIRMAR TAREA -->
      <div id="div-genfar-confirmar">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">CONFIRMAR TAREA</strong>
          </div>
          <div class="card-body">
            <hr>                  
            <form action="{{route('genfar.confirmar')}}" id="form-genfar-confirmar" required method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{ $request_risk->id }}">
              <div class="row form-group">
                    <div class="col col-md-3">
                      <label class=" form-control-label">CONFIRMAR TASK</label>
                    </div>
                    <div class="col col-md-9">
                      <div class="form-check">
                        <div class="radio">
                          <label for="radio1" class="form-check-label ">
                          <input type="radio" name="resumen" value="CONFIRMAR" class="form-check-input" required >
                            Aprobación del Master Data
                          </label>
                        </div>
                        <div class="radio">
                          <label for="radio2" class="form-check-label ">
                          <input type="radio" name="resumen" value="RECHAZAR" class="form-check-input" required>
                          Rechazo del Master Data
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label>Adjunto Confirmación:</label>
                            <input class="form-control" type="file" name="confirm_file" id="confirm_file">
                        </div>
                    </div>
                </div>

                  <div class="form-group">
                      <label for="observacion" class="control-label mb-1">Comentarios de aprobación o rechazo.</label>
                      <textarea form="form-genfar-confirmar" id="observacion" name="observacion" type="text" class="form-control cc-info-soporte valid" data-val="true" data-val-required="Please enter the link font"
                      autocomplete="observacion" aria-required="true" aria-invalid="false" placeholder="p. ej. La solicitud de Debida Diligencia Ampliada no tuvo ningun inconveniente." required></textarea>
                      <span class="help-block field-validation-valid" data-valmsg-for="cc-info-soporte" data-valmsg-replace="true"></span>
                  </div>
                  <div class="row form-group">
                    <div class="row col-12 col-md-9">
                      <button type="submit" form="form-genfar-confirmar" class="btn btn-outline-warning btn-block">
                        CONFIRMAR
                      </button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
      @endif
    @endrole
        
      
    </div>
  </div>
</div>

@endsection
@section('javascript') 
<script>
    $(function() {

        var selectProviderType = document.getElementById("genfar_provider");

        if(selectProviderType.value == 2 || selectProviderType.value == 3 || selectProviderType.value == 4 || selectProviderType.value == 5 || selectProviderType.value == 6 ){
            $.get('/getIndustryKey/' + selectProviderType.value, function(data) {
                $('select[name="industrykey"]').empty();

                $.each(data,function(key, value) {
                    $('select[name="industrykey"]').append('<option value="' + key + '">' + value + '</option>');
                });
            }, 'json');
        }

        $('select[name="genfar_provider"]').on('change', function () {
            var processID = $(this).val();

            if (processID) {
                $.get('/getIndustryKey/' + processID, function(data) {
                    $('select[name="industrykey"]').empty();

                    $.each(data,function(key, value) {
                        $('select[name="industrykey"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $.get('/getIndustryKey/' + processID, function(data) {
                    $('select[name="industrykey"]').empty();

                    $.each(data,function(key, value) {
                        $('select[name="industrykey"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            }
        });
    });
</script> 
<script>

    $(function() {

        $('#seleccionHACAT').hide('fast');
        $('#seleccionIndustryKey').hide('fast');
        
        var selectProviderType = document.getElementById("genfar_provider");

        if (selectProviderType.value == 1 || selectProviderType.value == 3 || selectProviderType.value == 4 || selectProviderType.value == 5) {
            $('#seleccionHACAT').show('fast');
        } else {
            $('#seleccionHACAT').hide('fast');
        }

        if (selectProviderType.value == 2 || selectProviderType.value == 3 || selectProviderType.value == 4 || selectProviderType.value == 5 || selectProviderType.value == 6 ) {
            $('#seleccionIndustryKey').show('fast');
        } else {
            $('#seleccionIndustryKey').hide('fast');
        }


        selectProviderType.addEventListener('change',
        function () {

            if (selectProviderType.value == 1 || selectProviderType.value == 3 || selectProviderType.value == 4 || selectProviderType.value == 5) {
                $('#seleccionHACAT').show('fast');
            } else {
                $('#seleccionHACAT').hide('fast');
            }

            if (selectProviderType.value == 2 || selectProviderType.value == 3 || selectProviderType.value == 4 || selectProviderType.value == 5 || selectProviderType.value == 6 ) {
                $('#seleccionIndustryKey').show('fast');
            } else {
                $('#seleccionIndustryKey').hide('fast');
            }

        });
    });
</script>
<script>
    $(function() {
        $('#suplierCodeForm').hide('fast');

        var selectProviderType = document.getElementById("action");


        selectProviderType.addEventListener('change',
        function () {
            if (selectProviderType.value != "Crear" ) {
                $('#suplierCodeForm').show('fast');
            } else {
                $('#suplierCodeForm').hide('fast');
            }
        });
    });
</script>

<script>
    $(function() {
        $('#suplierCodeForm_CO').hide('fast');
        $('#suplierCodeForm_PE').hide('fast');
        $('#suplierCodeForm_EC').hide('fast');

        checkbox_co = document.getElementById('check_co');
        checkbox_pe = document.getElementById('check_pe');
        checkbox_ec = document.getElementById('check_ec');

        checkbox_co.addEventListener('change', e => {
            if(e.target.checked){
                $('#suplierCodeForm_CO').show('fast');
            }else{
                $('#suplierCodeForm_CO').hide('fast');
            }
        });

        checkbox_pe.addEventListener('change', e => {
            if(e.target.checked){
                $('#suplierCodeForm_PE').show('fast');
            }else{
                $('#suplierCodeForm_PE').hide('fast');
            }
        
        });

        checkbox_ec.addEventListener('change', e => {
            if(e.target.checked){
                $('#suplierCodeForm_EC').show('fast');
            }else{
                $('#suplierCodeForm_EC').hide('fast');
            }
        });
});
</script>

@endsection
