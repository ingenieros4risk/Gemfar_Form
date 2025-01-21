@extends('dashboard.base')
@section('css')

@endsection
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Información del Registro de Proveedor en RISK International') }}</div>
            <div class="card-body">
              <hr>
              <table class="table table-striped table-bordered" id="queries-table">
                <thead>
                  <tr>
                    <th>INFORMACIÓN ADJUNTOS: </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>FECHA DILIGENCIAMIENTO: </td>
                    <td>{{ $request_old->fecha_diligenciamiento }}</td>
                  </tr>
                  <tr>
                    <td>FECHA FIN HOMOLOGACIÓN: </td>
                    <td>{{ $request_old->fecha_homologacion }}</td>
                  </tr>
                  <tr>
                    <td>DOCUMENTOS ADJUNTOS PROVEEDOR: </td>
                    <td><a href="{{ route('genfar-old.downloadReportProvider',$request_old->id)}}" target="_blank">Descargar</a></td>
                    <td>{{ $request_old->url_doc_proveedor }}</td>
                  </tr>
                  <tr>
                    <td>DOCUMENTOS ADJUNTOS HOMOLOGACIÓN: </td>
                    <td><a href="{{ route('genfar-old.downloadReportHomologation',$request_old->id)}}" target="_blank">Descargar</a></td>
                    <td>{{ $request_old->url_doc_homologacion }}</td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <table class="table table-responsive-sm table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>Información de la consulta</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>id: </td>
                    <td>{{ $request_old->id }}</td>
                  </tr>
                  <tr>
                    <td>COD. HOMOLOGACIÓN: </td>
                    <td>{{ $request_old->cod_homologacion }}</td>
                  </tr>
                  <tr>
                    <td>NOMBRE/RAZÓN SOCIAL: </td>
                    <td>{{ $request_old->nombre }}</td>
                  </tr>
                  <tr>
                    <td>TIPO DE IDENTIFICACIÓN: </td>
                    <td>{{ $request_old->tipo_documento }}</td>
                  </tr>
                  <tr>
                    <td>IDENTIFICACIÓN: </td>
                    <td>{{ $request_old->identificacion }}</td>
                  </tr>
                  <tr>
                    <td>TIPO HOMOLOGACIÓN: </td>
                    <td>{{ $request_old->tipo_homologacion }}</td>
                  </tr>
                  <tr>
                    <td>PAÍS: </td>
                    <td>{{ $request_old->pais }}</td>
                  </tr>
                  <tr>
                    <td>DEPARTAMENTO: </td>
                    <td>{{ $request_old->departamento }}</td>
                  </tr>
                  <tr>
                    <td>CIUDAD: </td>
                    <td>{{ $request_old->ciudad }}</td>
                  </tr>
                  <tr>
                    <td>DIRECCIÓN: </td>
                    <td>{{ $request_old->direccion }}</td>
                  </tr>
                  <tr>
                    <td>CORREO: </td>
                    <td>{{ $request_old->correo }}</td>
                  </tr>
                  <tr>
                    <td>ESPECIALIDAD MÉDICA: </td>
                    <td>{{ $request_old->especialidad }}</td>
                  </tr>
                  <tr>
                    <td>OTRA ESPECIALIDAD MÉDICA: </td>
                    <td>{{ $request_old->especialidad_otra }}</td>
                  </tr>
                  <tr>
                    <td>Es funcionario de empresa pública o privada?: </td>
                    <td>{{ $request_old->funcionario }}</td>
                  </tr>
                  <tr>
                    <td>¿Cuál es su grado académico?: </td>
                    <td>{{ $request_old->grado_academico }}</td>
                  </tr>
                  <tr>
                    <td>¿Tiene alguna posición en una institución académica?: </td>
                    <td>{{ $request_old->posicion_academico }}</td>
                  </tr>
                  <tr>
                    <td>¿Es miembro o exmiembro de una junta directiva de una sociedad científica?: </td>
                    <td>{{ $request_old->miembro_cientifico }}</td>
                  </tr>
                  <tr>
                    <td>¿Es miembro de uno o varios grupos de investigación registrados ante Colciencias?: </td>
                    <td>{{ $request_old->miembro_colciencias }}</td>
                  </tr>
                  <tr>
                    <td>¿Cuál ha sido su experiencia como investigador en estudios clínicos?: </td>
                    <td>{{ $request_old->experiencia_investigador }}</td>
                  </tr>
                  <tr>
                    <td>¿Cuántas publicaciones de artículos científicos ha realizado en los últimos 10 años?: </td>
                    <td>{{ $request_old->publicaciones }}</td>
                  </tr>
                  <tr>
                    <td>¿Ha publicado libros de medicina?: </td>
                    <td>{{ $request_old->tiene_libros }}</td>
                  </tr>
                  <tr>
                    <td>¿Ha sido conferencista en los últimos 5 años?: </td>
                    <td>{{ $request_old->conferencista }}</td>
                  </tr>
                  <tr>
                    <td>¿Ha realizado presentación de posters?: </td>
                    <td>{{ $request_old->posters }}</td>
                  </tr>
                  <tr>
                    <td>¿Ha recibido premios en medicina?: </td>
                    <td>{{ $request_old->premios }}</td>
                  </tr>
                  <tr>
                    <td>Grado académico: </td>
                    <td>{{ $request_old->grados_academico }}</td>
                  </tr>
                  <tr>
                    <td>Tiene experiencia como investigador en Estudios Clínicos: </td>
                    <td>{{ $request_old->experiencia_clinica }}</td>
                  </tr>
                  <tr>
                    <td>Experiencia previa en presentaciones/conferencias en Programas de Educación Médica independientes,programas de la Industria Farmacéuticos o la Académia: </td>
                    <td>{{ $request_old->experiencia_conferencia }}</td>
                  </tr>
                  <tr>
                    <td>Asociado a Hospital o Centro Docente: </td>
                    <td>{{ $request_old->asociado_hospital }}</td>
                  </tr>
                  <tr>
                    <td>Articulos como Autor principal en revistas reconocidas en los ultimos 5 años: </td>
                    <td>{{ $request_old->articulos }}</td>
                  </tr>
                  <tr>
                    <td>Autor o Coautor en Libros de medicina: </td>
                    <td>{{ $request_old->libros }}</td>
                  </tr>
                  <tr>
                    <td>Profesor Principal o Posición de Liderazgo en una institución médica académica o de investigación: </td>
                    <td>{{ $request_old->profesor_principal }}</td>
                  </tr>
                  <tr>
                    <td>Ponencias Regionales (En los ultimos 5 años): </td>
                    <td>{{ $request_old->ponencia_regional }}</td>
                  </tr>
                  <tr>
                    <td>Ponencias Internacionales (fuera de su Region en los ultimos 5 años): </td>
                    <td>{{ $request_old->ponencia_internacional }}</td>
                  </tr>
                  <tr>
                    <td>Presidencia de una Sociedad Médica Internacional: </td>
                    <td>{{ $request_old->presidencia_sociedad }}</td>
                  </tr>
                  <tr>
                    <td>Miembro del Consejo Directivo de una Sociedad Internacional: </td>
                    <td>{{ $request_old->miembro_internacional }}</td>
                  </tr>
                  <tr>
                    <td>Presidente de una Sociedad Medica Nacional: </td>
                    <td>{{ $request_old->presidencia_nacional }}</td>
                  </tr>
                  <tr>
                    <td>Premios Nacionales y/o Internacionales en Medicina: </td>
                    <td>{{ $request_old->premios_internacionales }}</td>
                  </tr>
                  <tr>
                    <td>Especialista y/o condición de experto en materia médica a tratar: </td>
                    <td>{{ $request_old->especialista }}</td>
                  </tr>
                  <tr>
                    <td>Capacidad de Influir y/o credibilidad sobre colegas: </td>
                    <td>{{ $request_old->influencia }}</td>
                  </tr>
                  <tr>
                    <td>PUNTAJE: </td>
                    <td>{{ $request_old->score }}</td>
                  </tr>
                  <tr>
                    <td>CODIGO DE COLEGIATURA: </td>
                    <td>{{ $request_old->codigo_colegiatura }}</td>
                  </tr>
                  <tr>
                    <td>NOMBRE BANCO BENEFICIARIO: </td>
                    <td>{{ $request_old->banco_beneficiario }}</td>
                  </tr>
                  <tr>
                    <td>PAÍS BANCO BENEFICIARIO: </td>
                    <td>{{ $request_old->país_banco_beneficiario }}</td>
                  </tr>
                  <tr>
                    <td>CIUDAD BANCO BENEFICIARIO: </td>
                    <td>{{ $request_old->ciudad_banco_beneficiario }}</td>
                  </tr>
                  <tr>
                    <td>No CUENTA BANCO BENEFICIARIO: </td>
                    <td>{{ $request_old->cuenta_beneficiario }}</td>
                  </tr>
                  <tr>
                    <td>TIPO DE CUENTA: </td>
                    <td>{{ $request_old->tipo_cuenta }}</td>
                  </tr>
                  <tr>
                    <td>MONEDA: </td>
                    <td>{{ $request_old->moneda }}</td>
                  </tr>
                  <tr>
                    <td>IBAN: </td>
                    <td>{{ $request_old->iban }}</td>
                  </tr>
                  <tr>
                    <td>SWIFT/BIC: </td>
                    <td>{{ $request_old->swift }}</td>
                  </tr>
                  <tr>
                    <td>CUENTA INTERBANCARIA: </td>
                    <td>{{ $request_old->cuenta_interbancaria }}</td>
                  </tr>
                  <tr>
                    <td>BANCO INTERMEDIARIO: </td>
                    <td>{{ $request_old->banco_intermediario }}</td>
                  </tr>
                  <tr>
                    <td>CUENTA INTERMEDIARIO: </td>
                    <td>{{ $request_old->cuenta_intermediario }}</td>
                  </tr>
                  <tr>
                    <td>CIUDAD INTERMEDIARIO: </td>
                    <td>{{ $request_old->ciudad_intermediario }}</td>
                  </tr>
                  <tr>
                    <td>PAÍS INTERMEDIARIO: </td>
                    <td>{{ $request_old->pais_intermediario }}</td>
                  </tr>
                  <tr>
                    <td>ABA INTERMEDIARIO: </td>
                    <td>{{ $request_old->aba_intermediario }}</td>
                  </tr>
                  <tr>
                    <td>TIPO CUENTA INTERMEDIARIO: </td>
                    <td>{{ $request_old->tipo_cuenta_intermediario }}</td>
                  </tr>
                  <tr>
                    <td>GESTIONES HCP: </td>
                    <td>{{ $request_old->gestiones_hcp }}</td>
                  </tr>
                  <tr>
                    <td>NOMBRE REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->nombre_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>TIPO DOCUMENTO REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->tipo_documento_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>PoNUMERO DOCUMENTO REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->documento_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>CARGO REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->cargo_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>TELEFONO REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->telefono_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>CELULAR REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->celular_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>EMAIL REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->email_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>FAX REPRESENTANTE LEGAL: </td>
                    <td>{{ $request_old->fax_representante_legal }}</td>
                  </tr>
                  <tr>
                    <td>PERSONAS DE CONTACTO: </td>
                    <td>{{ $request_old->persona_contacto }}</td>
                  </tr>
                  <tr>
                    <td>TAXONOMIA DOCUMENTOS: </td>
                    <td>{{ $request_old->taxonomia_documentos }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <a href="{{ route('genfar-old.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
          </div>
      </div>
    </div>
  </div>
</div>
        

@endsection
@section('javascript')

@endsection