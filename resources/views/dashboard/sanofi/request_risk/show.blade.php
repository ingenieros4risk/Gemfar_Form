@extends('dashboard.base')
@section('css')

<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">

@endsection
@section('content')
@role('risk')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('Administración Solicitud Genfar Risk') }}
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
                                            <a target="_blank" href="https://ambientetest.datalaft.com:2091/es/genfar/create/{{ $request_risk->id }}" class="btn btn-block btn-secondary">Enlace Formulario Proveedor Español</a>
                                            <a target="_blank" href="https://ambientetest.datalaft.com:2091/en/genfar/create/{{ $request_risk->id }}" class="btn btn-block btn-secondary">Enlace Formulario Proveedor Ingles</a>
                                            </div>
                                        </div>
                                    </div>
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

                                    <div class="row" id="seleccionDDA">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Adjunto DDA Simple:</label>
                                                    <input class="form-control" type="file" name="attachment_dds" id="attachment_dds">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Adjunto DDA Simple Ampliada:</label>
                                                    <input class="form-control" type="file" name="attachment_dda" id="attachment_dda">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>¿Ha identificado algún posible problema relacionado con la reputación del tercero expuesto o cualquier litigio existente o potencial que involucre al tercero expuesto o a su personal clave?:</label>
                                                <select name="dda_acept" id="dda_acept" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Hay coincidencias o hallazgo en Listas LA/FT/CO:</label>
                                                <select name="coincidencia_laft" id="coincidencia_laft" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tienen Antecedentes Disciplianarios:</label>
                                                <select name="antecedentes_disciplinarios" id="antecedentes_disciplinarios" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tienen Antecedentes Penales o condenas:</label>
                                                <select name="antecedentes_penales" id="antecedentes_penales" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tienen Antecedentes Fiscales:</label>
                                                <select name="antecedentes_fiscales" id="antecedentes_fiscales" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Se trata de un PEP:</label>
                                                <select name="coincidencia_pep" id="coincidencia_pep" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Hay coincidencias en otras listas:</label>
                                                <select name="coincidencia_listas" id="coincidencia_listas" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>¿Otros Hallazgos en fuentes abiertas?:</label>
                                                <select name="coincidencia_fuentes" id="coincidencia_fuentes" class="form-control input-lg">
                                                <option value="">--- Seleccione una Respuesta ---</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
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
            </div>
        </div>
    </div>
</div>
@endrole
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <!-- Menú -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Menú de Navegación
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="{{ $request_risk->id }}#descargaDocumentos">Solicitud de Homologación / Descarga de Documentos</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#informacionSolicitud">Información de la Solicitud</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#cuestionarioInterno">Cuestionario Interno</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#listaFormularios">Lista de Formularios Requeridos</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#respuestasFormulario">Respuestas Formulario</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#CadenaSuministro">Cuestionario Cadena Suministro Internacional</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#BeneficiariosFinales">Beneficiarios Finales</a>
                            </li>
                            <li>
                                <a href="{{ $request_risk->id }}#cuestionarioEtica">Cuestionario Ético</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card"  id="descargaDocumentos">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Solicitud de Homologación GENFAR: #{{ $request_risk->id }}
                    </div>
                  <div class="card-body">
                    <div class="card-title">
                        <h5 class="text-right title-3">Descarga de Documentos</h5>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="card-body">
                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Lista de Adjuntos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Consentimientos:</td>
                                        <td>
                                            <a href="{{ route('genfar.consentimiento', ['diligencia' => $request_form->id, 'language' => 'es']) }}" target="_blank">Descargar (Español)</a> /
                                            <a href="{{ route('genfar.consentimiento', ['diligencia' => $request_form->id, 'language' => 'en']) }}" target="_blank">Descargar (Inglés)</a>
                                        </td>
                                    </tr>

                                    @isset($request_risk->dds)
                                    <tr>
                                        <td>Respuesta DDS por parte de Risk:</td>
                                        <td><a href="{{ route('genfar.downloadDDS',$request_risk->id)}}" target="_blank">Descargar Respuesta DDS: {{$request_risk->dds}} </a>
                                        @role('risk')
                                            <button class="btn btn-outline-warning cc_pointer float-right" data-toggle="modal" data-target="#editModalDDS">
                                                <a>
                                                    <svg class="c-icon">
                                                    <use xlink:href="../assets/icons/coreui/free-symbol-defs.svg#cui-pencil"></use>
                                                    </svg>
                                                </a>
                                            </button>
                                        @endrole</td>
                                    </tr>
                                    @endisset

                                    @isset($request_risk->dda)
                                    <tr>
                                        <td>Respuesta DDA por parte de Risk:</td>
                                        <td><a href="{{ route('genfar.downloadDDA',$request_risk->id)}}" target="_blank">Descargar Respuesta DDA: {{$request_risk->dda}}</a>
                                        @role('risk')
                                            <button class="btn btn-outline-warning cc_pointer float-right" data-toggle="modal" data-target="#editModalDDA">
                                                <a>
                                                    <svg class="c-icon">
                                                    <use xlink:href="../assets/icons/coreui/free-symbol-defs.svg#cui-pencil"></use>
                                                    </svg>
                                                </a>
                                            </button>
                                        @endrole</td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->curriculum_vitae)
                                    <tr>
                                        <td>Curriculum Vitae:</td>
                                        <td><a href="{{ route('genfar.curriculum_vitae',$request_form->id)}}" target="_blank">Descargar</a></td>
                                    </tr>
                                    @endisset
                                    @isset($request_form->certificado_existencia)
                                    <tr>
                                        <td>Certificado de Existencia:</td>
                                        <td><a href="{{ route('genfar.certificado_existencia',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_existencia}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->rut)
                                    <tr>
                                        <td>RUT:</td>
                                        <td><a href="{{ route('genfar.rut',$request_form->id)}}" target="_blank">Descargar: {{$request_form->rut}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->cedula_rep)
                                    <tr>
                                        <td>Cedula Representante:</td>
                                        <td><a href="{{ route('genfar.cedula_rep',$request_form->id)}}" target="_blank">Descargar: {{$request_form->cedula_rep}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->licencia_medica)
                                    <tr>
                                        <td>Licencia Médica:</td>
                                        <td><a href="{{ route('genfar.licencia_medica',$request_form->id)}}" target="_blank">Descargar: {{$request_form->licencia_medica}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->certificado_bancaria)
                                    <tr>
                                        <td>Certificado Bancario:</td>
                                        <td><a href="{{ route('genfar.certificado_bancaria',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_bancaria}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->certificado_oea)
                                    <tr>
                                        <td>Certificado OEA:</td>
                                        <td><a href="{{ route('genfar.certificado_oea',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_oea}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->certificado_laft)
                                    <tr>
                                        <td>Certificado LAFT:</td>
                                        <td><a href="{{ route('genfar.certificado_laft',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_laft}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->certificado_iso)
                                    <tr>
                                        <td>Certificado ISO:</td>
                                        <td><a href="{{ route('genfar.certificado_iso',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_iso}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->certificado_politicas)
                                    <tr>
                                        <td>Certificado/Políticas:</td>
                                        <td><a href="{{ route('genfar.certificado_politicas',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_politicas}}</a></td>
                                    </tr>
                                    @endisset
                                    @isset($request_form->certificado_financiero)
                                    <tr>
                                        <td>Certificado Financiero:</td>
                                        <td><a href="{{ route('genfar.certificado_financiero',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_financiero}}</a></td>
                                    </tr>
                                    @endisset

                                    @isset($request_form->certificado_comercial)
                                    <tr>
                                        <td>Certificado Comercial:</td>
                                        <td><a href="{{ route('genfar.certificado_comercial',$request_form->id)}}" target="_blank">Descargar: {{$request_form->certificado_comercial}}</a></td>
                                    </tr>
                                    @endisset
                                    <tr>
                                        <td>Aprobación de Compra:</td>
                                        @isset($request_risk->aprobacion_compra)
                                            <td><a href="{{ route('genfar.aprobacion_compra',$request_form->id)}}" target="_blank">Descargar: {{$request_risk->aprobacion_compra}}</a></td>
                                        @endisset
                                        <button class="btn btn-outline-warning cc_pointer float-right" data-toggle="modal" data-target="#editModalAprobacionCompra">
                                            <a>Agregar Aprobación de Compras
                                                <svg class="c-icon">
                                                <use xlink:href="../assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                                                </svg>
                                            </a>
                                        </button>
                                    @isset($request_risk->manifestacion_suscrita)
                                        </tr>
                                            <td>Manifestacion Suscrita:</td>

                                                <td><a href="{{ route('genfar.manifestacion_suscrita',$request_form->id)}}" target="_blank">Descargar: {{$request_risk->manifestacion_suscrita}}</a></td>

                                            <button class="btn btn-outline-info cc_pointer float-right" data-toggle="modal" data-target="#editModalManifestacionSuscrita">
                                                <a>Agregar Manifestación Suscrita
                                                    <svg class="c-icon">
                                                    <use xlink:href="../assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                                                    </svg>
                                                </a>
                                            </button>
                                        <tr>
                                    @endisset
                                    @if($request_form->csi == 1)
                                    <tr>
                                        <td>Descargar Manifestación Suscrita:</td>
                                        <td>
                                            <a href="{{ route('genfar.manifestacion', ['diligencia' => $request_form->id, 'language' => 'es']) }}" target="_blank">Descargar (Español)</a> /
                                            <a href="{{ route('genfar.manifestacion', ['diligencia' => $request_form->id, 'language' => 'en']) }}" target="_blank">Descargar (Inglés)</a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="card" id="informacionSolicitud">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> <strong>{{ __('Información de la Solicitud') }}</strong>
                    </div>
                    <!-- Información de la Solicitud -->
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                            <th>Información de la Solicitud</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID de la Solicitud:</td>
                                <td>{{ $request_risk->id}}</td>
                            </tr>
                            <tr>
                                <td>Nombre del Proveedor:</td>
                                <td>{{ $request_risk->provider_name}}</td>
                            </tr>
                            <tr>
                                <td>Número de identificación:</td>
                                <td>{{ $request_risk->provider_id}}</td>
                            </tr>
                            <tr>
                                <td>Estado de la Solicitud:</td>
                                <td>{{ $request_risk->status_id_name}}</td>
                            </tr>
                            <tr>
                                <td>Tipo de Solicitud:</td>
                                <td>{{ $request_risk->request_type}}</td>
                            </tr>
                            <tr>
                                <td>HACAT:</td>
                                <td>{{ $request_risk->hacat}}</td>
                            </tr>
                            <tr>
                                <td>Solicitante:</td>
                                <td>{{ $request_risk->user_solicitante}}</td>
                            </tr>
                            <tr>
                                <td>Email del Solicitante:</td>
                                <td>{{ $request_risk->user_email}}</td>
                            </tr>
                            <tr>
                                <td>Sociedad Solicitante:</td>
                                <td>{{ $request_risk->country_homologation}}</td>
                            </tr>
                            <tr>
                                <td>Países Solicitados:</td>
                                <td>{{ $request_risk->paises}}</td>
                            </tr>
                            <tr>
                                <td>Fecha de Solicitud:</td>
                                <td>{{ $request_risk->date_solicitud}} (GMT-5)</td>
                            </tr>
                            <tr>
                                <td>El Proveedor hace parte de la cadena de suministro internacional?:</td>
                                <td>{{ ($request_form->csi == 1) ? 'Si' : 'No';}}</td>
                            </tr>
                            <tr>
                                <td>¿La organización se encuentra dentro del alcance del Due Diligence Antisoborno de acuerdo con la Matriz Riesgo y/o Documentos Soporte aplicables a la Categoria?:</td>
                                <td>{{ ($request_risk->matriz_question == 1) ? 'Si' : 'No';}}</td>
                            </tr>
                            <tr>
                                <td>Justificación de la pregunta anterior</td>
                                <td>{{ $request_risk->matriz_justification}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>

                    <div class="card-body" id="cuestionarioInterno">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                            <th>Cuestionario Interno y Preguntas de Control Sagrilaft</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>¿Ha identificado algún posible problema relacionado con la reputación del tercero expuesto o cualquier litigio existente o potencial que involucre al tercero expuesto o a su personal clave?</td>
                                <td>{{ ($request_form->alert_dda == 1) ? 'Si' : 'No';}}</td>
                            </tr>
                            <tr>
                                <td>¿La organización se encuentra dentro del alcance del Due Diligence Antisoborno de acuerdo con la Matriz Riesgo y/o Documentos Soporte aplicables a la Categoria?:</td>
                                <td>{{ ($request_risk->matriz_question == 1) ? 'Si' : 'No';}}</td>
                            </tr>
                            <tr>
                                <td>Justificación de la pregunta anterior</td>
                                <td>{{ $request_risk->matriz_justification}}</td>
                            </tr>

                            <tr>
                                <td>¿Hay coincidencias o hallazgo en Listas LA/FT/CO?</td>
                                <td>{{ ($request_form->coincidencia_laft == 1) ? 'Si' : 'No' }}</td>
                            <tr>
                                <td>¿Tiene Antecedentes Disciplianarios?</td>
                                <td>{{ ($request_form->antecedentes_disciplinarios == 1) ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>¿Tiene Antecedentes Penales o condenas?</td>
                                <td>{{ ($request_form->antecedentes_penales == 1) ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>Tiene Antecedentes Fiscales?</td>
                                <td>{{ ($request_form->antecedentes_fiscales == 1) ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>¿Se trata de un PEP?</td>
                                <td>{{ ($request_form->coincidencia_pep == 1) ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>¿Hay coincidencias en otras listas?</td>
                                <td>{{ ($request_form->coincidencia_listas == 1) ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>¿Otros Hallazgos en fuentes abiertas?</td>
                                <td>{{ ($request_form->coincidencia_fuentes == 1) ? 'Si' : 'No' }}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                            <th>Información del Proveedor</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre del Proveedor:</td>
                                <td>{{ $request_risk->provider_name}}</td>
                            </tr>
                            <tr>
                                <td>Número de identificación:</td>
                                <td>{{ $request_risk->provider_id}}</td>
                            </tr>
                            <tr>
                                <td>Email de contacto del Proveedor:</td>
                                <td>{{ $request_risk->provider_email}}</td>
                            </tr>
                            <tr>
                                <td>Teléfono de contacto del Proveedor:</td>
                                <td>{{ $request_risk->provider_phone}}</td>
                            </tr>
                            <tr>
                                <td>Nacionalidad de Origen del Proveedor:</td>
                                <td>{{ $request_risk->nacionality}}</td>
                            </tr>
                        </tbody>
                        </table>
                        <div class="row" id="listaFormularios">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="card-header"> Lista de Formularios Requeridos</div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">Requiere DDAB<span class="badge badge-primary badge-pill">{{ $request_form->dda == 1 ? "SI" : "NO" }}</span></li>
                                        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">Requiere Cuestionario Ético<span class="badge badge-primary badge-pill">{{ $request_form->ethics == 1 ? "SI" : "NO" }}</span></li>
                                        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">Requiere Cuestionario Health, Safety<span class="badge badge-primary badge-pill">{{ $request_form->hys == 1 ? "SI" : "NO" }}</span></li>
                                        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">Requiere Corporate Social Responsibility<span class="badge badge-primary badge-pill">{{ $request_form->csr == 1 ? "SI" : "NO" }}</span></li>
                                        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">Requiere Cuestionario Environment<span class="badge badge-primary badge-pill">{{ $request_form->env == 1 ? "SI" : "NO" }}</span></li>
                                        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">Requiere Cuestionario Cybersecurity<span class="badge badge-primary badge-pill">{{ $request_form->csy == 1 ? "SI" : "NO" }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Observación de la Solicitud:</label>
                                    <textarea class="form-control" rows="4" placeholder="" >{{ $request_risk->observation}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Quests-->
                <div class="card" id="respuestasFormulario">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> <strong>{{ __('RESPUESTAS FORMULARIO') }}</strong>
                    </div>
                    <!-- Información de la Solicitud -->
                    <div class="card-body">

                        <div style="text-align: right;" class="btn btn-block btn-primary" >Información General</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nombre/Razón Social:</td>
                                    <td>{{ $request_form->name}}</td>
                                </tr>
                                <tr>
                                    <td>Número de identificación:</td>
                                    <td>{{ $request_form->document}}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de Proveedor:</td>
                                    <td>{{ $request_form->sanofi_provider_name}}</td>
                                </tr>
                                <tr>
                                    <td>Países Solicitantes:</td>
                                    <td>{{ $request_form->multiple_select_country}}</td>
                                </tr>
                                <tr>
                                    <td>Paises Constitución:</td>
                                    <td>{{ $request_form->country_homologation_name}}</td>
                                </tr>
                                <tr>
                                    <td>Departamento/Estado/Provincia:</td>
                                    <td>{{ $request_form->quest_3}}</td>
                                </tr>
                                <tr>
                                    <td>Ciudad de la Solicitud:</td>
                                    <td>{{ $request_form->quest_4}}</td>
                                </tr>
                                <tr>
                                    <td>Razón Social:</td>
                                    <td>{{ $request_form->quest_5}}</td>
                                </tr>
                                <tr>
                                    <td>Razón Social:</td>
                                    <td>{{ $request_form->quest_6}}</td>
                                </tr>
                                <tr>
                                    <td>Número de Identificación fiscal (CÉDULA,PASAPORTE,NIT,RUT,RUC, NIF):</td>
                                    <td>{{ $request_form->quest_9}}</td>
                                </tr>
                                <tr>
                                    <td>DV - Dígito de Verificación:</td>
                                    <td>{{ $request_form->quest_10}}</td>
                                </tr>
                                <tr>
                                    <td>Si corresponde, cualquier otro nombre (s) de empresa / individuo bajo el cual la Organización hace negocios:</td>
                                    <td>{{ $request_form->quest_75}}</td>
                                </tr>
                                <tr>
                                    <td>Código postal de la entidad legal:</td>
                                    <td>{{ $request_form->quest_76}}</td>
                                </tr>
                                <tr>
                                    <td>Sitio Web (si lo hubiera)</td>
                                    <td>{{ $request_form->quest_77}}</td>
                                </tr>
                                <tr>
                                    <td>Email envíos certificados de retención:</td>
                                    <td>{{ $request_form->quest_16}}</td>
                                </tr>
                                <tr>
                                    <td>Dirección:</td>
                                    <td>{{ $request_form->quest_11}}</td>
                                </tr>
                                <tr>
                                    <td>Teléfono Empresarial:</td>
                                    <td>{{ $request_form->quest_12}}</td>
                                </tr>
                                <tr>
                                    <td>Email notificación de pagos:</td>
                                    <td>{{ $request_form->quest_14}}</td>
                                </tr>
                                <tr>
                                    <td>Email Envíos de Orden de compra:</td>
                                    <td>{{ $request_form->quest_15}}</td>
                                </tr>
                                <tr>
                                    <td>Producto o servicio que brinda:</td>
                                    <td>{{ $request_form->quest_17}}</td>
                                </tr>
                                <tr>
                                    <td>Representante de ventas:</td>
                                    <td>{{ $request_form->quest_18}}</td>
                                </tr>
                                <tr>
                                    <td>Email Representante ventas:</td>
                                    <td>{{ $request_form->quest_19}}</td>
                                </tr>
                                <tr>
                                    <td>País donde ejerce medicina:</td>
                                    <td>{{ $request_form->quest_21}}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de documento:</td>
                                    <td>{{ $request_form->quest_22}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="text-align: right;" class="btn btn-block btn-primary" >INFORMACIÓN FINANCIERA LOCAL</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nombre del Banco:</td>
                                    <td>{{ $request_form->quest_27}}</td>
                                </tr>
                                <tr>
                                    <td>Ciudad del Banco:</td>
                                    <td>{{ $request_form->quest_28}}</td>
                                </tr>
                                <tr>
                                    <td>Dirección del banco:</td>
                                    <td>{{ $request_form->quest_29}}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de cuenta:</td>
                                    <td>{{ $request_form->quest_30}}</td>
                                </tr>
                                <tr>
                                    <td>Número de cuenta:</td>
                                    <td>{{ $request_form->quest_31}}</td>
                                </tr>
                                <tr>
                                    <td>Cuenta Interbancaria:</td>
                                    <td>{{ $request_form->quest_32}}</td>
                                </tr>
                                <tr>
                                    <td>¿Tiene detracciones?:</td>
                                    <td>{{ $request_form->quest_36}}</td>
                                </tr>
                                <tr>
                                    <td>Cuenta Detracción:</td>
                                    <td>{{ $request_form->quest_96}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="text-align: right;" class="btn btn-block btn-primary" >INFORMACIÓN TRIBUTARIA</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Es auto retenedor?:</td>
                                    <td>{{ $request_form->quest_92}}</td>
                                </tr>
                                <tr>
                                    <td>N° de resolución:</td>
                                    <td>{{ $request_form->quest_93}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Detracción:</td>
                                    <td>{{ $request_form->quest_94}}</td>
                                </tr>
                                <tr>
                                    <td>¿Es Gran Contribuyente?:</td>
                                    <td>{{ $request_form->quest_95}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Detracción 2:</td>
                                    <td>{{ $request_form->quest_97}}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de contribuyente:</td>
                                    <td>{{ $request_form->quest_98}}</td>
                                </tr>
                                <tr>
                                    <td>N° de resolución:</td>
                                    <td>{{ $request_form->quest_99}}</td>
                                </tr>
                                <tr>
                                    <td>Actividad económica:</td>
                                    <td>{{ $request_form->quest_100}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Información tributaria:</td>
                                    <td>{{ $request_form->quest_101}}</td>
                                </tr>
                                <tr>
                                    <td>Código CIIU:</td>
                                    <td>{{ $request_form->quest_102}}</td>
                                </tr>
                                <tr>
                                    <td>Condiciones de Pago:</td>
                                    <td>{{ $request_form->quest_46}}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de Moneda:</td>
                                    <td>{{ $request_form->quest_47}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="text-align: right;" class="btn btn-block btn-primary" >INFORMACIÓN FINANCIERA - BANCO INTERMEDIARIO</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Tiene banco intermediario?:</td>
                                    <td>{{ $request_form->quest_38}}</td>
                                </tr>
                                <tr>
                                    <td>País del Banco:</td>
                                    <td>{{ $request_form->quest_39}}</td>
                                </tr>
                                <tr>
                                    <td>Nombre del Banco intermediario:</td>
                                    <td>{{ $request_form->quest_40}}</td>
                                </tr>
                                <tr>
                                    <td>Ciudad del Banco intermediario:</td>
                                    <td>{{ $request_form->quest_41}}</td>
                                </tr>
                                <tr>
                                    <td>Dirección de la sucursal:</td>
                                    <td>{{ $request_form->quest_42}}</td>
                                </tr>
                                <tr>
                                    <td>Número de cuenta Interbancaria:</td>
                                    <td>{{ $request_form->quest_43}}</td>
                                </tr>
                                <tr>
                                    <td>ABA o Swift:</td>
                                    <td>{{ $request_form->quest_44}}</td>
                                </tr>
                                <tr>
                                    <td>Codigo IBAN:</td>
                                    <td>{{ $request_form->quest_45}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="text-align: right;" class="btn btn-block btn-primary" >PREGUNTAS COPAC</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Tiene algún familiar trabajando en Genfar?:</td>
                                    <td>{{ $request_form->quest_59}}</td>
                                </tr>
                                <tr>
                                    <td>¿Sus familiares tiene negocios con Genfar?:</td>
                                    <td>{{ $request_form->quest_60}}</td>
                                </tr>
                                <tr>
                                    <td>¿Usted sustenta posición decisora en alguna organización pública?:</td>
                                    <td>{{ $request_form->quest_61}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="text-align: right;" class="btn btn-block btn-primary" >INFORMACIÓN REPRESENTANTE LEGAL</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nombre de representante legal:</td>
                                    <td>{{ $request_form->quest_49}}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de identificación:</td>
                                    <td>{{ $request_form->quest_50}}</td>
                                </tr>
                                <tr>
                                    <td>N° de Identificación:</td>
                                    <td>{{ $request_form->quest_51}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha de expedición:</td>
                                    <td>{{ $request_form->quest_52}}</td>
                                </tr>
                                <tr>
                                    <td>Nacionalidad del representante legal:</td>
                                    <td>{{ $request_form->quest_53}}</td>
                                </tr>
                                <tr>
                                    <td>Teléfono:</td>
                                    <td>{{ $request_form->quest_54}}</td>
                                </tr>
                                <tr>
                                    <td>Email representante legal:</td>
                                    <td>{{ $request_form->quest_55}}</td>
                                </tr>
                                <tr>
                                    <td>¿Maneja recursos públicos?:</td>
                                    <td>{{ $request_form->quest_56}}</td>
                                </tr>
                                <tr>
                                    <td>¿Tiene algún grado de poder público?:</td>
                                    <td>{{ $request_form->quest_57}}</td>
                                </tr>
                                <tr>
                                    <td>¿Goza de reconocimiento público?:</td>
                                    <td>{{ $request_form->quest_58}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-primary" >CERTIFICACIONES</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Tiene certificación OEA?:</td>
                                    <td>{{ $request_form->quest_103}}</td>
                                </tr>
                                <tr>
                                    <td>¿Cuenta con algún certificado LAFT?:</td>
                                    <td>{{ $request_form->quest_104}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-dark" >CUESTIONARIO PARA DEMOSTRAR SEGURIDAD EN LA CADENA DE SUMINISTRO INTERNACIONAL</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        @if($request_form->ethics == 1)
                        <div style="text-align: right;" class="btn btn-block btn-warning" id="cuestionarioEtica" >CUESTIONARIO DE ÉTICA - Cuestionario General</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Algún gobierno, entidad estatal o controlada por el estado (nacional o internacional) tiene alguna propiedad, interés financiero o control sobre su negocio?:</td>
                                    <td>{{ $request_form->quest_24}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Perfil e historial de negocio</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Proporcione el (los) nombre (s) de los propietarios, directores y / o miembros de la junta de su organización: Propietario (s): adjunte una hoja separada que identifique los nombres, el porcentaje de propiedad (%) y País de nacionalidad Directores/miembros de la junta: adjunte una hoja separada que identifique los nombres y el cargo</td>
                                    <td>{{ $request_form->quest_71}}</td>
                                </tr>
                                <tr>
                                    <td>Adjunto</td>
                                    @isset($request_form->quest_71f)
                                        <td><a href="{{ route('genfar.certificado_iso',$request_form->quest_71f)}}" target="_blank">Descargar</a></td>
                                    @endisset
                                </tr>
                                <tr>
                                    <td>Entidades relacionadas: Si su organización es una subsidiaria, filial, indique el nombre y la dirección de su organización matriz:</td>
                                    <td>{{ $request_form->quest_25}}</td>
                                </tr>
                                <tr>
                                    <td>Confirme que tiene todos los registros y licencias necesarios para operar: proporcione un número de registro válido o número de organización benéfica registrada o equivalente.</td>
                                    <td>{{ $request_form->quest_26}}</td>
                                </tr>
                                <tr>
                                    <td>Adjunte su certificado de registro</td>
                                    @isset($request_form->quest_33)
                                        <td><a href="{{ route('genfar.certificado_iso',$request_form->quest_33)}}" target="_blank">Descargar</a></td>
                                    @endisset
                                </tr>
                                <tr>
                                    <td>¿Tiene un código de ética/conducta y/o política antisoborno o código de conducta similar?</td>
                                    <td>{{ $request_form->quest_34}}</td>
                                </tr>
                                <tr>
                                    <td>Adjunte el Código ético/de conducta/o la política antisoborno de su organización en la página de carga de documentos.</td>
                                    @isset($request_form->quest_70)
                                        <td><a href="{{ route('genfar.certificado_iso',$request_form->quest_70)}}" target="_blank">Descargar</a></td>
                                    @endisset
                                </tr>
                                <tr>
                                    <td>¿Confirma que su organización está de acuerdo con la Política antisoborno de Genfar</td>
                                    <td>{{ $request_form->quest_37}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Relación con organizaciones, entidades o funcionarios gubernamentales / personas expuestas políticamente (PEP)</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Su organización ofrece un servicio exclusivo o servicios públicos en virtud de los términos de un contrato comercial con el gobierno o de una subvención gubernamental?</td>
                                    <td>{{ $request_form->quest_73}}</td>
                                </tr>
                                <tr>
                                    <td>Proporcione una descripción general</td>
                                    <td>{{ $request_form->quest_73_add}}</td>
                                </tr>
                                <tr>
                                    <td>¿Su organización cumple con las leyes y normativas antisoborno y antimonopolio en el país en el que está constituida?</td>
                                    <td>{{ $request_form->quest_74}}</td>
                                </tr>
                                <tr>
                                    <td>¿Tiene su organización o alguno de los miembros de su Junta Directiva o de la Gerencia clave una función de asesoramiento que permita influir en los precios, el estado del formulario, reembolso, aprobación, permisos de registro, autorización o la compra de productos de Genfar y/o activos o negocios de Genfar?</td>
                                    <td>{{ $request_form->quest_48}}</td>
                                </tr>
                                <tr>
                                    <td>Proporcione una descripción general</td>
                                    <td>{{ $request_form->quest_48f}}</td>
                                </tr>
                                <tr>
                                    <td>¿Hay alguna persona políticamente expuesta dentro de los miembros de su Junta o la Gerencia clave? *Proporcione la definición de PEP: ¿Trabaja o ha trabajado, durante los últimos 2 años, para el gobierno, entidad estatal o controlada por el estado (nacional o internacional)? ¿Tiene o ha ocupado, durante los últimos   años, un cargo o función de asesoramiento que permita influir en los precios, reembolsos, aprobaciones, registros o compras de productos de Genfar? ¿Tiene o ha ocupado,  durante los últimos 2 años, un cargo en un partido político o actúa en nombre de un partido político, o se postuló o ha presentado una candidatura a un partido político?"</td>
                                    <td>{{ $request_form->quest_72}}</td>
                                </tr>
                                <tr>
                                    <td>Proporcione una descripción general</td>
                                    <td>{{ $request_form->quest_72f}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Uso de terceros</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Espera subcontratar alguna actividad a terceros para realizar el trabajo requerido al interactuar con Genfar?(* proporcionar definición de actividades de subcontratación):</td>
                                    <td>{{ $request_form->quest_64}}</td>
                                </tr>
                                <tr>
                                    <td>Proporcione una descripción general</td>
                                    <td>{{ $request_form->quest_64f}}</td>
                                </tr>
                                <tr>
                                    <td>En caso afirmativo, ¿tienen esos terceros(s) funciones de asesoramiento que permitan influir en los precios, el estado del formulario, reembolso, aprobación, permisos de registro, autorización o la compra de productos de Genfar y/o activos o negocios de Genfar?</td>
                                    <td>{{ $request_form->quest_65}}</td>
                                </tr>
                                <tr>
                                    <td>Proporcione una descripción general</td>
                                    <td>{{ $request_form->quest_65f}}</td>
                                </tr>
                                <tr>
                                    <td>En caso afirmativo, ¿realizó comprobaciones adecuadas para asegurarse de que sus Tercero(s) cumplen con las leyes, normativas y principios legales?</td>
                                    <td>{{ $request_form->quest_66}}</td>
                                </tr>
                                <tr>
                                    <td>En caso afirmativo, ¿asume la responsabilidad total de la conducta de su tercero?</td>
                                    <td>{{ $request_form->quest_67}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Sanciones, investigaciones, suspensiones o inhabilitaciones</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Hay algo que declarar en relación con cualquier inhabilitación y/o suspensión profesional y/o cualquier condena penal de su Organización o cualquier persona clave de la Gerencia relacionada en particular con el soborno u otras acciones penales relevantes en los últimos 3 años?:</td>
                                    <td>{{ $request_form->quest_68}}</td>
                                </tr>
                                <tr>
                                    <td>Proporcione una descripción general y las medidas correctivas que se han tomado:</td>
                                    <td>{{ $request_form->quest_68f}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: right;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Certificación</div>
                        <hr>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Preguntas</th>
                                    <th>Respuestas (Si Aplica)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Por la presente certifico</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <th>Soy un representante debidamente autorizado de la Compañia</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <th>Que la información que he proporcionado es verdadera y completa a mi leal saber y entender y que no he omitido ninguna información que hubiera sido relevante para Genfar en el marco de esta Debida Diligencia.</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <th>Que, en relación con los negocios de la Organización con Genfar, ningún funcionario, director, propietario, agente o representante de la Organización ha dado o dará o intentará dar algo de valor a ningún funcionario del gobierno o funcionario público, partido político o candidato a un cargo político, ni a ningún otro profesional de la salud o persona o entidad, directa o indirectamente, para obtener o retener  negocios u obtener cualquier ventaja indebida.</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <td>Por la presente certifico:</td>
                                    <td>{{ $request_form->quest_69}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>

                <!-- Cuestionario Cadena Suministro Internacional-->
                @if($request_form->csi == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>Cuestionario Cadena Suministro Internacional
                    </div>
                    <hr>
                        <div style="text-align: left;" class="btn btn-block btn-secondary" >NIVEL DE RIESGO:</div>
                        @if($request_form->calificacion_oea <= 4)
                            <div style="text-align: left;" class="btn btn-block btn-success" >BAJO</div>

                        @elseif($request_form->calificacion_oea > 4 && $request_form->calificacion_oea <= 7)
                            <div style="text-align: left;" class="btn btn-block btn-warning" >MEDIO</div>
                        @else
                            <div style="text-align: left;" class="btn btn-block btn-danger" >ALTO</div>
                        @endif
                    <hr>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>De cuantos años de experiencia es la trayectoria de su empresa en el negocio:</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_1}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Su Empresa Cuenta Con Certificacion En Sistemas De Gestion De Seguridad De La Cadena De Suministro Internacional?</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_2}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Su empresa suministra material de empaque para exportacion?:</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_3}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Su empresa terceriza sus servicios a las empresas del grupo GENFAR relacionados con la cadena de suministro internacional?:</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="{{ $request_form->csi_10}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Que Incoterm Ha Sido Negociado Con Las Empresas Del Grupo Genfar?</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_4}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Si Usted Es Un Proveedor Extranjero En Que Paises Presta Servicios A Las Empresas Del Grupo Genfar:</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_5}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Su Empresa Maneja Informacion Confidencial De Las Empresas Del Grupo Genfar Relacionadas Con La Cadena De Suministro Internacional?</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_6}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Su Empresa Tiene Contacto Con La Carga De Exportacion De Las Empresas Del Grupo Genfar?</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_7}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Su Empresa Tiene Contacto Con La Carga De Importacion De Las Empresas Del Grupo Genfar?</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_8}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Empresa o asociado de negocio que pertenece al Grupo Genfar?</label>
                                </div>
                                <div class="col-md-3">
                                        <input type="text" class="form-control" value="{{ $request_form->csi_9}}" readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <form method="POST" action="{{ route('genfar.perfilamiento') }}" id="form-perfilamiento" required>
                        {{csrf_field()}}
                            <input type="hidden" name="id" value="{{ $request_risk->id }}">
                            <input type="hidden" name="user" value="{{ $user }}">
                            <div class="form-group">
                                <label>REPRESENTA MAS DEL 25% DE LA COMPRA TOTAL DEL EXTERIOR:</label>
                                <select name="perfilamiento_1" id="perfilamiento_1" class="form-control input-lg">
                                    <option value="">--- Seleccione una respuesta ---</option>
                                        <option value="1">No impacto bajo</option>
                                        <option value="10">Si impacto alto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>PROVEEDOR UBICADO EN UN PAÍS IDENTIFICADO COMO PARAISO FISCAL:</label>
                                <select name="perfilamiento_2" id="perfilamiento_2" class="form-control input-lg">
                                    <option value="">--- Seleccione una respuesta ---</option>
                                        <option value="1">Pais no considerado Paraiso Fiscal</option>
                                        <option value="10">País considerado Paraiso Fiscal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>MANEJO DE INFORMACION CONFIDENCIAL DE GENFAR:</label>
                                <select name="perfilamiento_3" id="perfilamiento_3" class="form-control input-lg">
                                    <option value="">--- Seleccione una respuesta ---</option>
                                        <option value="1">No maneja informacion confidencial</option>
                                        <option value="10">Si maneja informacion confidencial</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>EMPRESA O ASOCIADO DE NEGOCIO QUE PERTENECE AL GRUPO GENFAR:</label>
                                <select name="perfilamiento_4" id="perfilamiento_4" class="form-control input-lg">
                                        <option value="">--- Seleccione respuesta ---</option>
                                        <option value="1">Intragrupo</option>
                                        <option value="10">Extragrupo</option>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-block btn-success" form="form-perfilamiento" type="submit">
                                        <span>Calificar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif


                <!-- Beneficiarios Finales-->
                <div class="card" id="BeneficiariosFinales">
                    <div class="card-header">
                        <strong><i class="fa fa-align-justify"></i>{{ __('Lista de Beneficiarios Finales') }}</strong>
                    </div>

                    @if($bfs != null && count($bfs) > 0)
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="coincidences-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>ID Formulario</th>
                                <th>Tipo de Respuesta</th>
                                <th>Nombre</th>
                                <th>Tipo de Documento</th>
                                <th>Documento de identidad</th>
                                <th>% de participación</th>
                                <th>Es PEP?</th>
                                <th>Respuesta NO</th>
                                <th>Archivo NO</th>
                                <th>Cantidad de Terceros</th>
                                <th>Archivo Terceros</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bfs as $coincidence)
                                <tr>
                                    <td>{{ $coincidence->id }}</td>
                                    <td>{{ $coincidence->forms_id }}</td>
                                    <td>{{ $coincidence->type_bf_texto }}</td>
                                    <td>{{ $coincidence->full_name }}</td>
                                    <td>{{ $coincidence->document_beneficial_ownership }}</td>
                                    <td>{{ $coincidence->bf_document }}</td>
                                    <td>{{ $coincidence->participation_control }}</td>
                                    <td>{{ $coincidence->is_pep }}</td>
                                    <td>{{ $coincidence->adicional_text }}</td>
                                    <td>{{ $coincidence->no_coincidences_file }}</td>
                                    <td>{{ $coincidence->amount_thirds }}</td>
                                    <td>
                                    @if($coincidence->type_bf == 2)
                                        <a href="{{ route('genfar.beneficial_ownership',$coincidence->id)}}" target="_blank" class="btn btn-outline-warning">Descargar</a>
                                    @elseif($coincidence->type_bf == 0)
                                        <a href="{{ route('genfar.no_beneficial_ownership',$coincidence->id)}}" target="_blank" class="btn btn-outline-warning">Descargar</a>
                                    @else
                                        {{ $coincidence->type_bf_texto }}
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div style="border-color: red" class="col-md-12">
                                        <div class="alert alert-info" role="alert"><p><strong>El tercero no suministra vinculación DECLARACIÓN JURADA DE BENEFICIARIOS FINALES </strong> porque no fué necesario ó no aplica por el tipo de persona</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


                <div class="modal fade" id="editModalDDS" tabindex="-1" role="dialog" aria-labelledby="updateDDS">
                    <form action="{{route('genfar.updatedds')}}" id="form-updatedate-dds" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateDDS">Actualizar DDS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label >Adjunta Debida Diligencia Simplificada</label>
                                        <input class="form-control" type="file" name="update_attachment_dds" id="update_attachment_dds" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="form-updatedate-dds" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="editModalDDA" tabindex="-1" role="dialog" aria-labelledby="updateDDS">
                    <form action="{{route('genfar.updatedda')}}" id="form-updatedate-dda" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateDDS">Actualizar DDA</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label >Adjunta Debida Diligencia Ampliada</label>
                                        <input class="form-control" type="file" name="update_attachment_dda" id="update_attachment_dda" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="form-updatedate-dda" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="editModalAprobacionCompra" tabindex="-1" role="dialog" aria-labelledby="updateCompras">
                    <form action="{{route('genfar.updateaprobacioncompras')}}" id="form-updatedate-compras" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateCompras">Actualizar Aprobación de Compra</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label >Adjunta Aprobación de Compra</label>
                                        <input class="form-control" type="file" name="update_attachment_compras" id="update_attachment_compras" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="form-updatedate-compras" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal fade" id="editModalManifestacionSuscrita" tabindex="-1" role="dialog" aria-labelledby="updateManifestacion">
                    <form action="{{route('genfar.updatemanifestacionsuscrita')}}" id="form-updatedate-manifestacion" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateManifestacion">Actualizar Manifestación Suscrita</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label >Adjunta Manifestación Suscrita</label>
                                        <input class="form-control" type="file" name="update_attachment_manifestacion" id="update_attachment_compras" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="form-updatedate-manifestacion" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- CUESTIONARIO CSR-->
                @if($request_form->csr == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>CUESTIONARIO CSR
                    </div>
                    <div class="card-body">
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-danger" >RESPUESTAS Y ALERTAS CUESTIONARIO CSR</div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se asegura de que ninguna persona menor de 15 años (o menor de la edad legal para terminar la educación obligatoria) participe en sus operaciones?:</label>
                                </div>
                                @if($request_form->csr_1 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3" >
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se asegura de que los trabajadores menores de 18 años no realicen trabajos peligrosos, extenuantes o físicamente exigentes?:</label>
                                </div>
                                @if($request_form->csr_2 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                            <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3" >
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Otorga a sus empleados el derecho a entrar en el empleo de forma voluntaria y libre, sin la amenaza de sanción y el derecho a rescindir libremente el empleo de forma voluntaria mediante un preaviso de duración razonable en cualquier momento y sin sanción?</label>
                                </div>
                                @if($request_form->csr_3 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se asegura de que todos los contratos de trabajo estén escritos y sean transparentes e incluyan disposiciones integrales para los empleados?</label>
                                    </div>
                                    @if($request_form->csr_4 == 0)
                                        <div class="col-md-3" style="border: 1px solid red;">
                                            <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                        </div>
                                    @else
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se asegura de que todos los empleados no enfrenten violencia y daños a la integridad física o psicológica, como tratos inhumanos, castigos físicos, insultos, hostigamiento, coacción mental o física?</label>
                                    </div>
                                    @if($request_form->csr_5 == 0)
                                        <div class="col-md-3" style="border: 1px solid red;">
                                            <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                        </div>
                                    @else
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se asegura de que no haya discriminación en la contratación, compensación, acceso a la capacitación, promoción, terminación o jubilación por motivos de raza, casta, origen nacional, religión, edad, discapacidad, género, estado civil, orientación sexual, afiliación sindical o política? discriminación por afiliación</label>
                                </div>
                                @if($request_form->csr_6 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se asegura de que el tiempo de trabajo de los empleados se ajuste a la legislación nacional?</label>
                                </div>
                                @if($request_form->csr_7 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Garantizan sus proveedores que los salarios se paguen con regularidad y permitan a los empleados y sus familias satisfacer sus necesidades básicas?</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Reconoce que todos los empleados son libres de formar y/o afiliarse a una organización de trabajadores de su propia elección y no interfieren con este derecho?</label>
                                </div>
                                @if($request_form->csr_9 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Reconoce el derecho a la negociación colectiva y el papel de las organizaciones de trabajadores a efectos de la negociación colectiva y se compromete a negociar de buena fe?</label>
                                </div>
                                @if($request_form->csr_10 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Permite que las organizaciones de trabajadores actúen con total independencia, dándoles un acceso razonable a la información, los recursos y los medios necesarios para cumplir su misión?</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><strong>Comentario o Plan de Acción Responsable CSR:</strong></label>
                                </div>
                                <div class="col-md-9">
                                <textarea class="form-control" rows="4" disabled>{{ $request_form->csr_comentario}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @role('csr')
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('genfar.csr') }}" id="form-csr" required>
                                {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">
                                    <div class="form-group">
                                        <label>Comentario o Plan de Acción Responsable CSR:</label>
                                        <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-block btn-danger" form="form-csr" type="submit">
                                                <span>Aprobar</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
                @endif

                <!-- CUESTIONARIO CSY-->
                @if($request_form->csy == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>RESPUESTAS CUESTIONARIO CSY
                    </div>
                    <div class="card-body">
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-warning" >ALERTAS CUESTIONARIO CSY</div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Está dispuesto a someterse a una evaluación de seguridad cibernética de Genfar (según VIRP 2.0)?:</label>
                                </div>
                                @if($request_form->csy_1 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><strong>Comentario o Plan de Acción Responsable CSY:</strong></label>
                                </div>
                                <div class="col-md-9">
                                <textarea class="form-control" rows="4" disabled>{{ $request_form->csy_comentario}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @role('csy')
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('genfar.csy') }}" id="form-csy" required>
                                {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">
                                    <div class="form-group">
                                        <label>Comentario o Plan de Acción Responsable CSY:</label>
                                        <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-block btn-warning" form="form-csy" type="submit">
                                                <span>Aprobar</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
                @endif

                <!-- CUESTIONARIO HYS-->
                @if($request_form->hys == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>CUESTIONARIO HYS
                    </div>
                    <div class="card-body">
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-info" >RESPUESTAS Y ALERTAS CUESTIONARIO HYS</div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>H100 ¿Cuenta con un Sistema de Gestión de HS que cumpla con los estándares locales y/o corporativos, si los hay? ¿Y con los recursos adecuados, incluido el personal?</label>
                                </div>
                                @if($request_form->hys_1 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                    <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Cumple con las normas locales y nacionales de salud y seguridad? ¿Cuenta con todos los permisos de salud y seguridad necesarios para operar de conformidad con las reglamentaciones locales?:</label>
                                    </div>
                                @if($request_form->hys_2 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                    <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Tiene algún tipo de demanda legal, denuncia formal, proceso sancionador, investigación o similar en curso por parte de una autoridad o parte interesada relacionada con la seguridad y salud?:</label>
                                    </div>
                                @if($request_form->hys_3 == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Ha tenido un evento en el que el resultado fue una fatalidad, un accidente grave/grave o registrable/notificable a las autoridades?</label>
                                    </div>
                                @if($request_form->hys_4 == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Identifica, implementa y garantiza el mantenimiento de controles adecuados y efectivos para reducir a niveles aceptables los peligros y riesgos en todas sus operaciones y actividades?</label>
                                    </div>
                                @if($request_form->hys_5 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Mide, inspecciona, audita y monitorea los indicadores clave de seguridad y salud, parámetros, peligros, riesgos, etc., e implementa las acciones adecuadas en caso de desviación?</label>
                                    </div>
                                @if($request_form->hys_6 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Cuenta con un plan de emergencia y continuidad comercial para sus operaciones y actividades implementado, probado y validado?</label>
                                    </div>
                                @if($request_form->hys_7 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Tiene la capacidad y el compromiso de informar a tiempo, comunicar e investigar cualquier tipo de evento, desviación o anormalidad que pueda generar un impacto en las operaciones, actividades o reputación de nuestro negocio en cualquier tema de Salud y Seguridad?</label>
                                    </div>
                                @if($request_form->hys_8 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><strong>Comentario o Plan de Acción Responsable HYS:</strong></label>
                                </div>
                                <div class="col-md-9">
                                <textarea class="form-control" rows="4" disabled>{{ $request_form->hys_comentario}}</textarea>
                                </div>
                            </div>
                            </div>
                        <hr>
                        @role('hys')
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('genfar.hys') }}" id="form-hys" required>
                                {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">
                                    <div class="form-group">
                                        <label>Comentario o Plan de Acción Responsable HYS:</label>
                                        <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-block btn-info" form="form-hys" type="submit">
                                                <span>Aprobar</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
                @endif

                <!-- CUESTIONARIO ENV-->
                @if($request_form->env == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>CUESTIONARIO ENV
                    </div>
                    <div class="card-body">
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-success" >RESPUESTA Y ALERTAS CUESTIONARIO ENV</div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Cuenta con un Sistema de Gestión Ambiental siguiendo estándares locales y/o corporativos si los hay? ¿Y con los recursos apropiados, incluido el personal para mantenerlo?</label>
                                </div>
                                @if($request_form->env_1 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Cumple usted (incluidos sus materiales o productos) con las reglamentaciones ambientales vigentes y aplicables, y cuenta con todos los permisos o seguros ambientales necesarios para operar de conformidad con las reglamentaciones locales?</label>
                                    </div>
                                @if($request_form->env_2 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong> ¿Tiene algún tipo de demanda judicial, denuncia formal, proceso sancionador, investigación o similar en curso o pendiente de cerrar por parte de alguna autoridad o grupo de interés relacionado con temas ambientales?</label>
                                    </div>
                                @if($request_form->env_3 == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Ha tenido un evento cuyo resultado fue una contaminación, contaminación, liberación o emisión registrable/notificable a las autoridades siguiendo las regulaciones locales que aún está pendiente de informar y/o resolver?</label>
                                </div>
                                @if($request_form->env_4 == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                    <div class="col-md-9">
                                        <label><strong>Pregunta:</strong>¿Identifica, valora y evalúa aspectos e impactos en todas sus operaciones y elementos de la cadena de suministro? ¿Especialmente relacionado con el vertido al medio ambiente de sustancias farmacéuticas?</label>
                                    </div>
                                @if($request_form->env_5 == 0)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se gestionan, controlan y tratan adecuadamente los aspectos de sus actividades y productos con el potencial de tener un impacto adverso en la salud humana o el medio ambiente antes de liberarlos al medio ambiente? ¿Son estos monitores o medidas para garantizar la efectividad de los controles?</label>
                                    </div>
                                @if($request_form->env_6 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Garantiza que los materiales suministrados por usted en cualquier forma están permitidos para su uso actual por las regulaciones ambientales locales y los acuerdos globales o internacionales y cumplen plenamente con estos? (No están en un plan para descontinuar, prohibir o convertirse en un pasivo ambiental potencial)</label>
                                    </div>
                                @if($request_form->env_7 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Tiene la capacidad y el compromiso de informar a tiempo, comunicar e investigar cualquier tipo de evento, desvío o anormalidad que pueda generar un impacto en las operaciones, actividades o reputación de nuestro negocio en materia ambiental?</label>
                                    </div>
                                @if($request_form->env_8 == 0)
                                    <div class="col-md-3" style="border: 1px solid red;">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><strong>Comentario o Plan de Acción Responsable ENV:</strong></label>
                                </div>
                                <div class="col-md-9">
                                <textarea class="form-control" rows="4" disabled>{{ $request_form->env_comentario}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @role('env')
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('genfar.env') }}" id="form-env" required>
                                {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">
                                    <div class="form-group">
                                        <label>Comentario o Plan de Acción Responsable ENV:</label>
                                        <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-block btn-success" form="form-env" type="submit">
                                                <span>Aprobar</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
                @endif

                <!-- CUESTIONARIO ETICO-->
                @if($request_form->ethics == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>RESPUESTAS CUESTIONARIO DE ÉTICA
                    </div>
                    <div class="card-body">
                        @if($request_form->alert_dda == 1)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Ha identificado algún posible problema relacionado con la reputación del tercero expuesto o cualquier litigio existente o potencial que involucre al tercero expuesto o a su personal clave?:</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($request_form->quest_26 == "NO")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Confirme que tiene todos los registros y licencias necesarios para operar: proporcione un número de registro válido o número de organización benéfica registrada o equivalente.</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($request_form->quest_37 == "NO")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label>
                                        <strong>
                                            ¿Confirma que su organización está de acuerdo con la Política antisoborno de Genfar:
                                        </strong>
                                    </label>
                                    <a target="_blank" href="https://www.sanofi.com/-/media/Project/One-Sanofi-Web/Websites/Global/Sanofi-COM/Home/common/docs/download-center/Anti_bribery_policy_Novembre_2017.pdf">Política antisoborno de Genfar</a>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Relación con organizaciones, entidades o funcionarios gubernamentales / personas expuestas políticamente (PEP)</div>
                        <hr>
                        @if($request_form->quest_73 == "SI")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>¿Su organización ofrece un servicio exclusivo o servicios públicos en virtud de los términos de un contrato comercial con el gobierno o de una subvención gubernamental?</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($request_form->quest_74 == "NO")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>¿Su organización cumple con las leyes y normativas antisoborno y antimonopolio en el país en el que está constituida?</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($request_form->quest_48 == "SI")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>¿Tiene su organización o alguno de los miembros de su Junta Directiva o de la Gerencia clave una función de asesoramiento que permita influir en los precios, el estado del formulario, reembolso, aprobación, permisos de registro, autorización o la compra de productos de Genfar y/o activos o negocios de Genfar?</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($request_form->quest_72 == "SI")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label>
                                        <strong>¿Hay alguna persona políticamente expuesta dentro de los miembros de su Junta o la Gerencia clave? *Proporcione la definición de PEP: ¿Trabaja o ha trabajado, durante los últimos 2 años, para el gobierno, entidad estatal o controlada por el estado (nacional o internacional)? ¿Tiene o ha ocupado, durante los últimos   años, un cargo o función de asesoramiento que permita influir en los precios, reembolsos, aprobaciones, registros o compras de productos de Genfar? ¿Tiene o ha ocupado,  durante los últimos 2 años, un cargo en un partido político o actúa en nombre de un partido político, o se postuló o ha presentado una candidatura a un partido político?</strong>
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Proporcione una descripción general:</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="{{$request_form->quest_72F}}" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        <hr>
                        <div style="text-align: left;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Uso de terceros</div>
                        <hr>
                        @if($request_form->quest_65 == "SI")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>En caso afirmativo, ¿tienen esos terceros(s) funciones de asesoramiento que permitan influir en los precios, el estado del formulario, reembolso, aprobación, permisos de registro, autorización o la compra de productos de Genfar y/o activos o negocios de Genfar?</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($request_form->quest_66 == "NO")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>En caso afirmativo, ¿realizó comprobaciones adecuadas para asegurarse de que sus Tercero(s) cumplen con las leyes, normativas y principios legales?</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($request_form->quest_67 == "NO")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>En caso afirmativo, ¿asume la responsabilidad total de la conducta de su tercero?</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-warning" >CUESTIONARIO DE ÉTICA - Sanciones, investigaciones, suspensiones o inhabilitaciones</div>
                        <hr>
                        @if($request_form->quest_68 == "SI")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>¿Hay algo que declarar en relación con cualquier inhabilitación y/o suspensión profesional y/o cualquier condena penal de su Organización o cualquier persona clave de la Gerencia relacionada en particular con el soborno u otras acciones penales relevantes en los últimos 3 años?:</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Proporcione una descripción general y las medidas correctivas que se han tomado:</strong></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="{{$request_form->quest_68f}}" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    @role('ethics')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('genfar.ethics') }}" id="form-ethics" required>
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                <input type="hidden" name="user" value="{{ $user }}">
                                <div class="form-group">
                                    <label>Comentario del E&BI Officer::</label>
                                    <textarea class="form-control" rows="3" placeholder="" name="observation" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-form-label"><strong>Plan de acción del E&BI Officer</strong></label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.1" type="checkbox" value="Un acuerdo por escrito por parte del tercero de cumplir con las políticas y programas anticorrupción de la organización y/o con las leyes y reglamentos aplicables.">
                                        <label class="form-check-label">Un acuerdo por escrito por parte del tercero de cumplir con las políticas y programas anticorrupción de la organización y/o con las leyes y reglamentos aplicables.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.2" type="checkbox" value="Una cláusula de 'derecho de auditoría' que permita el acceso a los registros pertinentes del tercero.">
                                        <label class="form-check-label">Una cláusula de 'derecho de auditoría' que permita el acceso a los registros pertinentes del tercero.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.3" type="checkbox" value="Una disposición que obligue al tercero a mantener libros y registros precisos y un sistema eficaz de controles internos.">
                                        <label class="form-check-label">Una disposición que obligue al tercero a mantener libros y registros precisos y un sistema eficaz de controles internos.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.4" type="checkbox" value="Un derecho contractual de rescisión en caso de incumplimiento de las leyes anticorrupción.">
                                        <label class="form-check-label">Un derecho contractual de rescisión en caso de incumplimiento de las leyes anticorrupción.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.5" type="checkbox" value="Disposiciones que limiten la capacidad del tercero para actuar en nombre de la empresa y/o interactuar con funcionarios públicos.">
                                        <label class="form-check-label">Disposiciones que limiten la capacidad del tercero para actuar en nombre de la empresa y/o interactuar con funcionarios públicos.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.6" type="checkbox" value="Una obligación contractual por parte del tercero de informar sobre los servicios prestados">
                                        <label class="form-check-label">Una obligación contractual por parte del tercero de informar sobre los servicios prestados</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.7" type="checkbox" value="Una renovación o actualización periódica de los procesos de evaluación de riesgos y Debida Diligencia">
                                        <label class="form-check-label">Una renovación o actualización periódica de los procesos de evaluación de riesgos y Debida Diligencia</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.8" type="checkbox" value="úsquedas periódicas en listas restrictivas y en bases de datos para identificar nuevas señales de alerta.">
                                        <label class="form-check-label">Búsquedas periódicas en listas restrictivas y en bases de datos para identificar nuevas señales de alerta.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.9" type="checkbox" value="Implantación de un programa posterior a la aprobación, que incluya capacitaciones del Código de Conducta, Política anticorrupción y auditorías periódicas basadas en el riesgo del tercero.">
                                        <label class="form-check-label">Implantación de un programa posterior a la aprobación, que incluya capacitaciones del Código de Conducta, Política anticorrupción y auditorías periódicas basadas en el riesgo del tercero.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.10" type="checkbox" value="Una solicitud para que el tercero presente una certificación anual de cumplimiento de las leyes anticorrupción aplicables.">
                                        <label class="form-check-label">Una solicitud para que el tercero presente una certificación anual de cumplimiento de las leyes anticorrupción aplicables.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective.11" type="checkbox" value="Una revisión periódica de las solicitudes de pago y los pagos del tercero.">
                                        <label class="form-check-label">Una revisión periódica de las solicitudes de pago y los pagos del tercero.</label>
                                        </div>
                                        <div class="form-check checkbox">
                                        <input class="form-check-input" name="objective_text" type="checkbox" value="Seguimiento de los gastos inusuales o excesivos del tercero.">
                                        <label class="form-check-label">Seguimiento de los gastos inusuales o excesivos del tercero.</label>
                                        </div>
                                        <div class="form-check">
                                        <div class="col-md-3">
                                            <label class="form-check-label">Otro?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="3" placeholder="" name="objective_other"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"><strong>Recomendación del E&BI Officer</strong></label>
                                    <div class="col-md-9 col-form-label">
                                    <div class="form-check">
                                        <input class="form-check-input" id="radio1" type="radio" value="Bandera(s)/señales de alerta adecuadamente mitigada(s)" name="recomendacion">
                                        <label class="form-check-label" for="radio1">Bandera(s)/señales de alerta adecuadamente mitigada(s)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="radio2" type="radio" value="No se recomienda" name="recomendacion">
                                        <label class="form-check-label" for="radio2">No se recomienda</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="radio3" type="radio" value="Plan(es) de acción antisoborno recomendado(s)" name="recomendacion">
                                        <label class="form-check-label" for="radio3">Plan(es) de acción antisoborno recomendado(s)</label>
                                    </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-block btn-warning" form="form-ethics" type="submit">
                                            <span>Revisar</span>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
                @endif

                <!-- CUESTIONARIO SARLAFT -->
                @if($request_form->coincidencia_laft == 1 || $request_form->antecedentes_disciplinarios == 1 || $request_form->antecedentes_penales == 1 || $request_form->antecedentes_fiscales == 1 || $request_form->coincidencia_pep == 1 || $request_form->coincidencia_listas == 1 || $request_form->coincidencia_fuentes == 1)
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>CUESTIONARIO SAGRILAFT
                    </div>
                    <div class="card-body">
                        <hr>
                            <div style="text-align: left;" class="btn btn-block btn-success" >RESPUESTA Y ALERTAS CUESTIONARIO SAGRILAFT</div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Hay coincidencias o hallazgo en Listas LA/FT/CO?</label>
                                </div>
                                @if($request_form->coincidencia_laft == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Tiene Antecedentes Disciplianarios?</label>
                                </div>
                                @if($request_form->antecedentes_disciplinarios == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Tiene Antecedentes Penales o condenas?</label>
                                </div>
                                @if($request_form->antecedentes_penales == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>Tiene Antecedentes Fiscales?</label>
                                </div>
                                @if($request_form->antecedentes_fiscales == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Se trata de un PEP?</label>
                                </div>
                                @if($request_form->coincidencia_pep == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Hay coincidencias en otras listas?</label>
                                </div>
                                @if($request_form->coincidencia_listas == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <label><strong>Pregunta:</strong>¿Otros Hallazgos en fuentes abiertas?</label>
                                </div>
                                @if($request_form->coincidencia_fuentes == 1)
                                <div class="col-md-3" style="border: 1px solid red;">
                                    <input type="text" class="form-control" value="Respuesta: SI" readonly>
                                </div>
                                @else
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" value="Respuesta: NO" readonly>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="POST" action="{{ route('genfar.sarlaft') }}" id="form-sarlaft" required>
                                    {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                        <input type="hidden" name="user" value="{{ $user }}">
                                        <div class="form-group">
                                            <label>Plan de Acción Responsable SAGRILAFT:</label>
                                            <select name="observation" id="observation" class="form-control input-lg">
                                                <option value="">--- Seleccione la acción a realizar ---</option>
                                                    <option value="APROBADO">APROBADO</option>
                                                    <option value="RECHAZADO">RECHAZADO</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="btn btn-block btn-success" form="form-sarlaft" type="submit">
                                                    <span>Gestionar</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <hr>
                        @role('sarlaft')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="POST" action="{{ route('genfar.sarlaft') }}" id="form-sarlaft" required>
                                    {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{ $request_risk->id }}">
                                        <input type="hidden" name="user" value="{{ $user }}">
                                        <div class="form-group">
                                            <label>Plan de Acción Responsable SAGRILAFT:</label>
                                            <select name="observation" id="observation" class="form-control input-lg" @if($request_form->sarlaft_comentario) disabled @else required @endif>
                                                <option value="">--- Seleccione la acción a realizar ---</option>
                                                <option value="APROBADO" @if($request_form->sarlaft_comentario == 'APROBADO') selected @endif>APROBADO</option>
                                                <option value="RECHAZADO" @if($request_form->sarlaft_comentario == 'RECHAZADO') selected @endif>RECHAZADO</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Comentario o Plan de Acción Responsable SAGRILAFT:</label>
                                            <textarea class="form-control" rows="3" placeholder="" name="sarlaft_observation" required @if($request_form->sarlaft_observation) disabled @endif>{{ $request_form->sarlaft_observation }}</textarea>
                                        </div>
                                        <hr>
                                        @if(!$request_form->sarlaft_observation)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="btn btn-block btn-success" form="form-sarlaft" type="submit">
                                                    <span>Gestionar</span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
                @endif
@endsection


@section('javascript')
<script>

    $(function() {

        $('#seleccionDDA').hide('fast');

        var selectStatusType = document.getElementById("status");
        selectStatusType.addEventListener('change',
        function () {

            if (selectStatusType.value == 5 ) {
                $('#seleccionDDA').show('fast');
            } else {
                $('#seleccionDDA').hide('fast');
            }

        });
    });
</script>
@endsection
