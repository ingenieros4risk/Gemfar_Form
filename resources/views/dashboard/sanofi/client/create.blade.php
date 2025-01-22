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
                <form method="POST" action="{{ route('genfar-request-clients.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="third_party_name">Nombre de solicitante</label>
                    <input type="text" class="form-control" id="third_party_name" name="third_party_name" required>
                </div>

                <div class="form-group">
                    <label for="area_solicitante">Área solicitante</label>
                    <input type="text" class="form-control" id="area_solicitante" name="area_solicitante" required>
                </div>

                <div class="form-group">
                    <label for="id_country">País de radicación de la solicitud</label>
                    <select class="form-control" id="id_country" name="id_country" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_tipo_solicitud">Tipo de solicitud</label>
                    <select class="form-control" id="id_tipo_solicitud" name="id_tipo_solicitud" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($tipos_solicitudes as $tipo_solicitud)
                            <option value="{{ $tipo_solicitud->id }}">{{ $tipo_solicitud->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_client_type">Tipo de cliente</label>
                    <select class="form-control" id="id_client_type" name="id_client_type" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($clients_types as $client_type)
                            <option value="{{ $client_type->id }}">{{ $client_type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_sociedad_solicitante">Compañía o Entidad Legal</label>
                    <select class="form-control" id="id_sociedad_solicitante" name="id_sociedad_solicitante" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($sociedad_solicitantes as $sociedad_solicitante)
                            <option value="{{ $sociedad_solicitante->id }}">{{ $sociedad_solicitante->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_sales_organization">Organización de Ventas</label>
                    <select class="form-control" id="id_sales_organization" name="id_sales_organization" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($sales_organization as $sale_organization)
                            <option value="{{ $sale_organization->id }}">{{ $sale_organization->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_channel">Canal</label>
                    <select class="form-control" id="id_channel" name="id_channel" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_sector">Sector</label>
                    <select class="form-control" id="id_sector" name="id_sector" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($sectors as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_type_sale">Tipo de Venta</label>
                    <select class="form-control" id="id_type_sale" name="id_type_sale" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($type_sales as $type_sale)
                            <option value="{{ $type_sale->id }}">{{ $type_sale->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_group_client">Grupo de Clientes</label>
                    <select class="form-control" id="id_group_client" name="id_group_client" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($group_clients as $group_client)
                            <option value="{{ $group_client->id }}">{{ $group_client->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- <div class="form-group" id="gcid_code_group" style="display: none;">
                    <label for="gcid_code">Código del GCID</label>
                    <input type="text" class="form-control" id="gcid_code" name="gcid_code">
                </div> -->

                <div class="form-group">
                    <label for="vol_men_esti_comp">Volumen mensual estimado de Compras</label>
                    <input type="number" class="form-control" id="vol_men_esti_comp" name="vol_men_esti_comp" required>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Proyección de Ventas</label>
                            <input class="form-control" type="file" name="update_attachment_sales" id="update_attachment_sales">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_oficina_ventas">Oficina de Ventas</label>
                    <select class="form-control" id="id_oficina_ventas" name="id_oficina_ventas" required>
                        <option value="">--- Seleccione ---</option>
                        @foreach($oficinas_ventas as $oficinas_venta)
                            <option value="{{ $oficinas_venta->id }}">{{ $oficinas_venta->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="grupo_vendedores">Grupo de Vendedores</label>
                    <input type="text" class="form-control" id="grupo_vendedores" name="grupo_vendedores" required>
                </div>

                <div class="form-group">
                    <label for="name_comercial">Nombre Comercial</label>
                    <input type="text" class="form-control" id="name_comercial" name="name_comercial" required>
                </div>

                <div class="form-group">
                    <label for="number_client">Número de contacto del cliente</label>
                    <input type="number" class="form-control" id="number_client" name="number_client" required>
                </div>

                <div class="form-group">
                    <label for="name_contact_client">Nombre de contacto del cliente</label>
                    <input type="text" class="form-control" id="name_contact_client" name="name_contact_client" required>
                </div>

                <div class="form-group">
                    <label for="email">Email de contacto del cliente</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Adjunto Aprobación de Compra (Este archivo es mandatorio para el scope de Proveedores de Compras)</label>
                            <input class="form-control" type="file" name="update_attachment_compras" id="update_attachment_compras">
                        </div>
                    </div>
                </div> -->

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
                        <a href="{{ url('/genfar-request-clients') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a>
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
document.addEventListener('DOMContentLoaded', function () {
    const clientTypeSelector = document.getElementById('id_client_type');
    const gcidCodeGroup = document.getElementById('gcid_code_group');
    const gcidCodeInput = document.getElementById('gcid_code');

    clientTypeSelector.addEventListener('change', function () {
        // Asume que el valor 'especifico' es el que debe mostrar el campo GCID
        // Reemplaza 'especifico' con el valor real del ID del tipo de cliente que debe mostrar el campo
        if (this.value === 3) {
            gcidCodeGroup.style.display = 'block';
            gcidCodeInput.setAttribute('required', ''); // Hace el campo obligatorio
        } else {
            gcidCodeGroup.style.display = 'none';
            gcidCodeInput.removeAttribute('required'); // Elimina el atributo, haciendo el campo no obligatorio
        }
    });
});
</script>

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

        var selectProviderType = document.getElementById("id_client_type");

        if (selectProviderType.value == 3) {
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
