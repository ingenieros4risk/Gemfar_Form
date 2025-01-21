@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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
              <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Beneficiarios Finales') }}
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="coincidences-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>ID Formulario</th>
                            <th>Tipo de Respuesta</th>
                            <th>Ver Formulario</th>
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
                          @foreach($coincidences as $coincidence)
                            <tr>
                              <td>{{ $coincidence->id }}</td>
                              <td>{{ $coincidence->forms_id }}</td>
                              <td>{{ $coincidence->type_bf_texto }}</td>
                              <td>
                                <a href="{{ url('/genfar-request-risk/' . $coincidence->forms_id . '/') }}" target="_blank" class="btn btn-outline-danger">Ver Formulario</a>
                              </td>
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
                </div>
              </div>  
            </div>
          </div>
        </div>

@endsection


@section('javascript')

<script charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#coincidences-table').DataTable({
    });
  });
</script>

@endsection