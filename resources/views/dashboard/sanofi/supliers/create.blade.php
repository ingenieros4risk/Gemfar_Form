@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Formulario Suppliers creation or Modification') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('genfar-supliers.store') }}" enctype="multipart/form-data">
                    @csrf

                    @if($solicitud != null)
                        <input type="hidden" name="id" value="{{ $solicitud->id }}">
                    @else
                        <input type="hidden" name="id" value="0">
                    @endif
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tarea:</label>
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
                                <label>Seleccione la sociedad Solicitante:</label>
                                @if($solicitud != null)
                                    <select name="country_homologation" id="country_homologation" class="form-control input-lg" required>
                                        @foreach($societies as $society)
                                            <option value={{ $society->id }} {{ $society->id == $solicitud->country_homologation ? 'selected' : '' }} >{{ $society->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_homologation') <span class="text-danger error">{{ $message }}</span> @enderror
                                @else
                                    <select name="country_homologation" id="country_homologation" class="form-control input-lg" required>
                                        <option value="">Seleccione una opción</option>
                                        @foreach($societies as $society)
                                            <option value={{ $society->id }}>{{ $society->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Seleccione el tipo de Proveedor</label>
                                @if($solicitud != null)
                                    <select name="genfar_provider" id="genfar_provider" class="form-control input-lg" required>
                                        @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}" {{ $provider->id == $solicitud->sanofi_provider ? 'selected' : '' }}>{{ $provider->name }}</option>
                                        @endforeach
                                            <option value="7">Empleados</option> 
                                    </select>
                                    @error('genfar_provider') <span class="text-danger error">{{ $message }}</span> @enderror
                                @else
                                    <select name="genfar_provider" id="genfar_provider" class="form-control input-lg" required>
                                        <option value="">Seleccione una opción</option>
                                        @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}" >{{ $provider->name }}</option>
                                        @endforeach
                                            <option value="7">Empleados</option> 
                                    </select>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <div class="row" id ="seleccionHACAT">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>HACAT:</label>
                                <select name="hacat" id="hacat" class="form-control input-lg">
                                    @if($solicitud != null)
                                        @foreach($hacats as $hacat)
                                            <option value="{{ $hacat->name }}" {{ $hacat->id == $solicitud->hacat ? 'selected' : '' }}>{{ $hacat->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Seleccione una opción</option>
                                        @foreach($hacats as $hacat)
                                            <option value="{{ $hacat->name }}">{{ $hacat->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('hacat') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" id ="seleccionIndustryKey">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Industry Key :</label>
                                <select name="industrykey" id="industrykey" class="form-control input-lg">
                                    <option value="">--- Seleccione Industry Key ---</option>
                                </select>
                                @error('industrykey') <span class="text-danger error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    @if($solicitud != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nacionalidad del proveedor:</label>
                                    <input class="form-control" type="text" name="nacionality" value="{{$solicitud->nacionality}}"  required>
                                </div>
                            </div>
                        </div>
                    
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nacionalidad del proveedor:</label>
                                    <input class="form-control" type="text" name="nacionality"  required>
                                </div>
                            </div>
                        </div>
                    @endif

                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label">Países </label>
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
                                    <input class="form-control" type="text" name="suplier_code_co" id="suplier_code_co">
                                </div>
                            </div>
                        </div>

                        <div class="row" id="suplierCodeForm_PE">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Supplier Code Perú:</label>
                                    <input class="form-control" type="text" name="suplier_code_pe" id="suplier_code_pe">
                                </div>
                            </div>
                        </div>

                        <div class="row" id="suplierCodeForm_EC">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Supplier Code Ecuador:</label>
                                    <input class="form-control" type="text" name="suplier_code_ec" id="suplier_code_ec">
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    @if($solicitud != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nombre del Proveedor:</label>
                                    <input class="form-control" type="text" value="{{$solicitud->provider_name}}" name="name_proveedor" required>
                                </div>
                            </div>
                        </div>
                    
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nombre del Proveedor:</label>
                                    <input class="form-control" type="text" name="name_proveedor" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($solicitud != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tax ID:</label>
                                    <input class="form-control" type="text"  value="{{$solicitud->provider_id}}" name="tax_id" id="tax_id" required>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tax ID:</label>
                                    <input class="form-control" type="text" name="tax_id" id="tax_id" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($solicitud != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Correo electrónico del Proveedor:</label>
                                    <input class="form-control" value="{{$solicitud->provider_email}}" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Correo electrónico del Proveedor:</label>
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($solicitud != null)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Teléfono del Proveedor:</label>
                                    <input class="form-control" type="text" value="{{$solicitud->provider_phone}}" name="telefono" required >
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Teléfono del Proveedor:</label>
                                    <input class="form-control" type="text" name="telefono" required >
                                </div>
                            </div>
                        </div>
                    @endif

                    <hr>
                                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Adjunto:</label>
                                <label>Si se requiere subir más de un archivo se debe comprimir en cualquier formato:</label>
                                <input class="form-control" type="file" name="attachment" id="attachment">
                            </div>
                        </div>
                    </div>

                    @if($solicitud != null)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Comentarios:</label>
                                <textarea class="form-control" name="comments" rows="9" required></textarea>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Comentarios:</label>
                                    <textarea class="form-control" name="comments" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                                </div>
                            </div>
                        </div>
                    @endif
                
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
