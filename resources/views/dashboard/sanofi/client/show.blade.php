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
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <ul class="nav nav-tabs" id="mainTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">
                    <i class="fa fa-bars"></i> Menú
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="formulario-tab" data-toggle="tab" href="#formulario" role="tab" aria-controls="formulario" aria-selected="false">
                    <i class="fa fa-edit"></i> Formulario
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="documentos-tab" data-toggle="tab" href="#documentos" role="tab" aria-controls="documentos" aria-selected="false">
                    <i class="fa fa-paperclip"></i> Documentos
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
                                <form method="POST" action="{{ route('genfar.manage') }}" id="form-manage">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $Client->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">

                                    <div class="form-section">
                                        <a target="_blank"
                                            href="https://ambientetest.datalaft.com:2091/es/genfar/clients/{{ $Client->id }}"
                                            class="btn btn-outline-secondary btn-block mb-3">
                                            <i class="fa fa-external-link-alt"></i> Formulario Proveedor (ES)
                                        </a>
                                    </div>

                                    <div class="form-section">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Estado de la Solicitud:</label>
                                            <select name="status" id="status" class="form-control input-lg" required>
                                                <option value="">--- Seleccione Estado ---</option>
                                                @foreach($statuses as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ isset($currentStatus) && $status->id == $currentStatus ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
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
