@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Formulario Solicitud Risk') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('genfar-request-risk.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Seleccione la sociedad Solicitante:</label>
                                <select name="country_homologation" id="country_homologation" class="form-control input-lg" required>
                                    <option value="">--- Seleccione la sociedad Solicitante ---</option>
                                    @foreach($societies as $society)
                                        <option value={{ $society->id }}>{{ $society->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Seleccione el tipo de Tercero</label>
                                <select name="sanofi_provider" id="sanofi_provider" class="form-control input-lg" required>
                                    <option value="">--- Seleccione tipo Tercero ---</option>
                                    @foreach($providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>País donde opera el tercero <a target="_blank" href="https://www.transparency.org/en/cpi/2022">(para calcular el índice de corrupción del IPC)</a></label>
                                <select name="country_cpy" id="country_cpy" class="form-control input-lg" required>
                                    <option value="">--- Seleccione un país del proveedor ---</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">País o países, donde la contraparte va a tener relación comercial con GENFAR</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-md-12 col-form-label">
                                @foreach($societies as $item)
                                    @if($item->id == 1)
                                        
                                    @else
                                    <div class="form-check checkbox">
                                        <label><input type="checkbox" name="paises[]" value="{{$item->id}}"> {{$item->country}}</label>
                                    </div>
                                    @endif
                                @endforeach
                            </div>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>HACAT:</label>
                                <select name="hacat" id="hacat" class="form-control input-lg">
                                    <option value="">--- Seleccione HACAT ---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tipo de servicio:</label>
                                <label>El comprador o solicitante debe proporcionar una breve descripción del servicio que debe realizar Risk ( Debida Dilgencia, Homologación, Consulta en Listas).</label>
                                <label><strong>Homologación:</strong>:Incluye contacto	con	el	tercero, diligenciamiento del formulario, y Debida Diligencia</label>
                                <label><strong>Listas Restrictiva Simple:</strong>:Se realiza la consulta en Listas del tercero y se emite Informe de Debida Diligencia Simplificado.</label>
                                <select name="request_type" id="request_type" class="form-control input-lg">
                                    <option value="">--- Seleccione el servicio ---</option>
                                    <option value="Homologación">Homologación</option>
                                    <option value="Lista Restrictiva Simple">Lista Restrictiva Simple</option>
                                </select>
                                <!--<textarea class="form-control" name="request_type" rows="4" placeholder="{{ __('El comprador o solicitante debe proporcionar una breve descripción del servicio que debe realizar Risk ( Debida Dilgencia, Homologación, Consulta en Listas).') }}" required></textarea>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>¿La organización se encuentra dentro del alcance del Due Diligence Antisoborno de acuerdo con la Matriz Riesgo y/o Documentos Soporte aplicables a la Categoria?</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="matriz_question" id="matriz_question" class="form-control input-lg" required>
                                    <option value="1">Si</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="justification_div">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Justificación de la pregunta anterior:</label>
                                <textarea class="form-control" name="matriz_justification" rows="4" placeholder="{{ __('Explique el motivo por el cual NO acepta la pregunta anterior.') }}"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Aplicar los términos y condiciones de los proveedores del alcance de compras.</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="terminos_question" id="terminos_question" class="form-control input-lg" required>
                                    <option value="1">Si</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                                        
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Información del Tercero:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nombre del Tercero:</label>
                                <input class="form-control" type="text" name="name_proveedor" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Número de Identificación fiscal (CÉDULA,PASAPORTE,NIT,RUT,RUC, NIF):</label>
                                <input class="form-control" type="text" name="provider_id" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nacionalidad del Tercero:</label>
                                <input class="form-control" type="text" name="nacionality" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Correo electrónico del Tercero:</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Teléfono del Tercero:</label>
                                <input class="form-control" type="text" name="telefono" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="condicionPago">
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
                                <label>Nombre Comprador o Solicitante :</label>
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
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Observación:</label>
                                <textarea class="form-control" name="observation" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label >Adjunto Aprobación de Compra (Este archivo es mandatorio para el scope de Proveedores de Compras)</label>
                                <input class="form-control" type="file" name="update_attachment_compras" id="update_attachment_compras">
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
                            <a href="{{ url('/genfar-request-risk') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('javascript')

<script>
    $(function() {

        $('#justification_div').hide('fast');
        var matriz_seletion = document.getElementById("matriz_question");

        matriz_seletion.addEventListener('change', function () {

            if (matriz_seletion.value == 0 ) {
                $('#justification_div').show('fast');
            } else {
                $('#justification_div').hide('fast');
            }
        });

    });
</script>
<script>
    $(function() {
        $('select[name="sanofi_provider"]').on('change', function () {
            var processID = $(this).val();
            if (processID) {
                $.get('/getHacat/' + processID, function(data) {
                    $('select[name="hacat"]').empty();

                    $.each(data,function(key, value) {
                        $('select[name="hacat"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $.get('/getHacat/' + processID, function(data) {
                    $('select[name="hacat"]').empty();

                    $.each(data,function(key, value) {
                        $('select[name="hacat"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            }
        });
    });
</script>
<script>
    $(function() {
        
        var selectProviderType = document.getElementById("sanofi_provider");
        
        if (selectProviderType.value == 2) {
            $('#condicionPago').hide('fast');
        } else {
            $('#condicionPago').show('fast');
        }

        selectProviderType.addEventListener('change',
        function () {

            if (selectProviderType.value == 2) {
                $('#condicionPago').hide('fast');
            } else {
                $('#condicionPago').show('fast');
            }            
        });
    });
</script>
@endsection