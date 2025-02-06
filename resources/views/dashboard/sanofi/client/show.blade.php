@extends('dashboard.base')

@section('css')
<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">
<style>
.list-group-item-action {
    transition: all 0.3s ease;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}

.form-section {
    border-left: 3px solid #007bff;
    padding-left: 1rem;
    margin-bottom: 2rem;
}

.card-header {
    background-color: #f8f9fa;
    font-weight: bold;
}

.table th {
    background-color: #f1f1f1;
}

.table-responsive {
    max-height: 400px;
    overflow-y: auto;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    background-color: #007bff;
    color: white;
}

.nav-tabs .nav-link {
    color: #333;
}

.sub-nav-tabs .nav-link.active {
    background-color: #6c757d;
    color: white;
}

.card-header-gray {
    background-color: #555555;
    color: #fff;
    border-bottom: 1px solid #444;
  }
  .section-title {
    color: #555555;
    border-bottom: 2px solid #eee;
    padding-bottom: 5px;
    margin-bottom: 15px;
  }
</style>
@endsection

@section('content')
@php
    $isFormResponses = isset($clientForm) && !is_null($clientForm->qc8) && $clientForm->qc8 != '';

    $isDocuments = isset($uploadedDocuments) && count($uploadedDocuments) > 0;
@endphp
<div class="container-fluid">
    <div class="animated fadeIn">
        <ul class="nav nav-tabs" id="mainTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">
                    <i class="fa fa-bars"></i> Menú
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ !$isFormResponses ? 'disabled' : '' }}"
                   id="formulario-tab"
                   data-toggle="{{ $isFormResponses ? 'tab' : '' }}"
                   href="#formulario" role="tab" aria-controls="formulario" aria-selected="false">
                   <i class="fa fa-edit"></i> Formulario
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ !$isDocuments ? 'disabled' : '' }}"
                   id="documentos-tab"
                   data-toggle="{{ $isDocuments ? 'tab' : '' }}"
                   href="#documentos" role="tab" aria-controls="documentos" aria-selected="false">
                   <i class="fa fa-paperclip"></i> Documentos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="aprobaciones-tab" data-toggle="tab" href="#aprobaciones" role="tab" aria-controls="aprobaciones" aria-selected="false">
                    <i class="fa fa-paperclip"></i> Aprobadores
                </a>
            </li>
        </ul>

        <div class="tab-content" id="mainTabsContent">
            <!--Menú -->
            <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
            
                <div class="row mt-4">
                    <div class="col-md-8 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <i class="fa fa-users-cog"></i> Gestión de Clientes Genfar Risk
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('clients.manage') }}" id="form-manage">
                                    @csrf
                                    <input type="hidden" name="client_id" value="{{ $Client->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">

                                    <div class="form-section">
                                        <a target="_blank"
                                            href="https://ambientetest.datalaft.com:2150/es/genfar/clients/{{ $Client->id }}"
                                            class="btn btn-outline-secondary btn-block mb-3">
                                            <i class="fa fa-external-link-alt"></i> Formulario Proveedor (ES)
                                        </a>
                                    </div>

                                    <div class="form-section">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Estado de la Solicitud:</label>
                                        <select name="id_status" id="id_status" class="form-control input-lg">
                                                    <option value="">--- Seleccione Estado ---</option>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Observaciones:</label>
                                        <textarea class="form-control" name="observation" rows="3"
                                            placeholder="Describa el motivo del cambio de estado..." required></textarea>
                                    </div>
                                </div>

                                <button class="btn btn-warning btn-block" type="submit">
                                    <i class="fa fa-sync-alt"></i> Actualizar Estado
                                </button>

                                </form>
                                <!--Datos del Cliente -->
                                <div class="card shadow-sm mt-4">
                                <div class="card-header bg-light text-dark border-bottom">
                                    <h5 class="m-0">
                                    <i class="fa fa-user-circle mr-2"></i>
                                    Datos del Cliente
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-secondary mb-3">
                                        <i class="fa fa-user-tie mr-2"></i> Información del Solicitante
                                        </h6>
                                        <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                            <th class="w-50 text-muted">Nombre de solicitante:</th>
                                            <td>{{ $Client->third_party_name }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Área solicitante:</th>
                                            <td>{{ $Client->area_solicitante }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">País de radicación:</th>
                                            <td>{{ optional($Client->country)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Tipo de solicitud:</th>
                                            <td>{{ optional($Client->tipoSolicitud)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Tipo de cliente:</th>
                                            <td>{{ optional($Client->clientType)->name ?? 'N/A' }}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-secondary mb-3">
                                        <i class="fa fa-address-card mr-2"></i> Contacto
                                        </h6>
                                        <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                            <th class="w-50 text-muted">Nombre de contacto:</th>
                                            <td>{{ $Client->name_contact_client }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Número de contacto:</th>
                                            <td>{{ $Client->number_client }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Email de contacto:</th>
                                            <td>{{ $Client->email }}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-secondary mb-3">
                                        <i class="fa fa-building mr-2"></i> Empresa / Entidad Legal
                                        </h6>
                                        <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                            <th class="w-50 text-muted">Compañía o Entidad Legal:</th>
                                            <td>{{ optional($Client->sociedadSolicitante)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Organización de Ventas:</th>
                                            <td>{{ optional($Client->salesOrganization)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Oficina de Ventas:</th>
                                            <td>{{ optional($Client->oficinaVentas)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Grupo de Vendedores:</th>
                                            <td>{{ $Client->grupo_vendedores }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Nombre Comercial:</th>
                                            <td>{{ $Client->name_comercial }}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-secondary mb-3">
                                        <i class="fa fa-chart-line mr-2"></i> Información Comercial
                                        </h6>
                                        <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                            <th class="w-50 text-muted">Canal:</th>
                                            <td>{{ optional($Client->channel)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Sector:</th>
                                            <td>{{ optional($Client->sector)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Tipo de venta:</th>
                                            <td>{{ optional($Client->typeSale)->name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Grupo de clientes:</th>
                                            <td>{{ optional($Client->groupClient)->name ?? 'N/A' }}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-secondary mb-3">
                                        <i class="fa fa-chart-area mr-2"></i> Proyecciones
                                        </h6>
                                        <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                            <th class="w-50 text-muted">Volumen mensual estimado de Compras:</th>
                                            <td>{{ $Client->vol_men_esti_comp }}</td>
                                            </tr>
                                            <tr>
                                            <th class="text-muted">Proyección de Ventas:</th>
                                            <td>
                                                @if($Client->update_attachment_sales)
                                                <a href="{{ route('cliente.descargar', [
                                                    'clientId' => $Client->id,
                                                    'filename' => basename($Client->update_attachment_sales)
                                                ]) }}" target="_blank">
                                                    Ver archivo
                                                </a>
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>          
            </div>

            <!--Documentos -->
            <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <!-- Descarga de Documentos -->
                <div class="row mt-4" id="descargaDocumentos">
                    <div class="col-md-8 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white">
                                <i class="fa fa-paperclip"></i> Documentos del Cliente
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tipo de Documento</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($uploadedDocuments as $doc)
                                            <tr>
                                                <td>{{ $doc['name'] }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('cliente.descargar', [
                                                'clientId' => $Client->id,
                                                'filename' => basename($doc['path'])]) }}" class="btn btn-sm btn-outline-primary" download>
                                                        <i class="fa fa-file-download"></i> Descargar
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

                <!--Formulario -->
            <div class="tab-pane fade" id="formulario" role="tabpanel" aria-labelledby="formulario-tab">
            <div class="row mt-4" id="respuestasFormulario">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-dark">
                            <i class="fa fa-user"></i> Respuestas Formulario
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs sub-nav-tabs" id="subTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tercero-tab" data-toggle="tab" href="#tercero" role="tab" aria-controls="tercero" aria-selected="true">Información del Tercero</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="distribucion-tab" data-toggle="tab" href="#distribucion" role="tab" aria-controls="distribucion" aria-selected="false">Datos de Distribución</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="finanzas-tab" data-toggle="tab" href="#finanzas" role="tab" aria-controls="finanzas" aria-selected="false">Datos Finanzas</a>
                                </li>
                            </ul>

                            <div class="tab-content mt-3" id="subTabsContent">
                                <div class="tab-pane fade show active" id="tercero" role="tabpanel" aria-labelledby="tercero-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach(range(8, 32) as $num)
                                                <tr>
                                                    <td><strong>{{ __("qc$num") }}:</strong></td>
                                                    <td>
                                                        @if($num == 9)
                                                        {{ $document_types[$clientForm->qc9] ?? 'N/A' }}
                                                        @elseif($num == 32)
                                                        {{ $clientForm->qc32 ? 'Sí' : 'No' }}
                                                        @else
                                                        {{ $clientForm["qc$num"] ?? 'N/A' }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="distribucion" role="tabpanel" aria-labelledby="distribucion-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach(range(58, 61) as $num)
                                                <tr>
                                                    <td><strong>{{ __("qc$num") }}:</strong></td>
                                                    <td>{{ $clientForm["qc$num"] ?? 'N/A' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="finanzas" role="tabpanel" aria-labelledby="finanzas-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>{{ __('qc70') }}:</strong></td>
                                                    <td>{{ $clientForm->qc70 ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ __('qc73') }}:</strong></td>
                                                    <td>{{ $money[$clientForm->qc73] ?? 'N/A' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> 
            </div>
            <!--Aprobador -->
            <div class="tab-pane fade" id="aprobaciones" role="tabpanel"
                 aria-labelledby="aprobaciones-tab">
                <div class="row mt-4" id="aprobacionesCliente">
                    <div class="col-md-8 mx-auto">
                        <div class="card shadow-sm">
                            <div class="card-header text-white bg-dark">
                                <i class="fa fa-user"></i> Aprobaciones
                            </div>
                            <div class="card-body">
                                @php
                                    $clientTypeId   = optional($Client->clientType)->id;
                                    $clientTypeName = optional($Client->clientType)->name;
                                @endphp

                                <p><strong>Tipo de cliente seleccionado:</strong> {{ $clientTypeName }}</p>

                                @if($clientTypeId == 1) 
                                    <!-- Cliente Nacional-->
                                    @include('partials._aprobacion_tesoreria_cartera')
                                    @include('partials._aprobacion_datos_maestros')
                                    @include('partials._aprobacion_control_interno')
                                    @include('partials._aprobacion_cumplimiento_sagrilaft')
                                    @include('partials._aprobacion_asuntos_regulatorios')

                                @elseif($clientTypeId == 2)
                                    <!-- Exportaciones-->
                                    @include('partials._aprobacion_tesoreria_cartera')
                                    @include('partials._aprobacion_datos_maestros')
                                    @include('partials._aprobacion_control_interno')
                                    @include('partials._aprobacion_cumplimiento_sagrilaft')

                                @elseif($clientTypeId == 3)
                                    <!-- Interco-->
                                    @include('partials._aprobacion_tesoreria_cartera')
                                    @include('partials._aprobacion_datos_maestros')
                                    @include('partials._aprobacion_control_interno')
                                    @include('partials._aprobacion_cumplimiento_sagrilaft')

                                @elseif($clientTypeId == 4)
                                    <!-- Empleados-->
                                    @include('partials._aprobacion_datos_maestros')

                                @elseif($clientTypeId == 5)
                                    <!-- No Stock-->
                                    @include('partials._aprobacion_tesoreria_cartera')
                                    @include('partials._aprobacion_datos_maestros')
                                    @include('partials._aprobacion_control_interno')
                                    @include('partials._aprobacion_cumplimiento_sagrilaft')

                                @else
                                    <p>Aprobaciones no disponibles para este cliente.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    $('#mainTabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#subTabs a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('.submenu-link').click(function(e) {
        e.preventDefault();
        var target = $(this).attr('href');

        if (!$('#documentos-tab').hasClass('active')) {
            $('#documentos-tab').tab('show');

            $('#documentos-tab').on('shown.bs.tab', function () {
                $('html, body').animate({
                    scrollTop: $(target).offset().top - 100
                }, 500);
            });
        } else {
            $('html, body').animate({
                scrollTop: $(target).offset().top - 100
            }, 500);
        }
    });
});
</script>
@endsection
