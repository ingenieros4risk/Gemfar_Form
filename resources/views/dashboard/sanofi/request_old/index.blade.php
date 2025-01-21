@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">
@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Proveedores RISK International') }}
                      <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                        <a target="_blank" href="{{ route('sanofi-old-export') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-data-transfer-down"></use>
                          </svg>          
                        </a>
                      </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="requests_olds-table">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Código solicitud (codsolicitud)</th>
                            <th>Ver</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Fecha de Homologación</th>
                            <th>SCORE</th>
                            <th>Responsable</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($requests_olds as $value)
                            <tr>
                              <td>{{ $value->id}}</td>
                              <th>{{ $value->cod_homologacion}}</th>
                              <td>
                                <a href="{{ url('/genfar-old/' . $value->id ) }}" class="btn btn-outline-info">Ver</a>
                              </td>
                              <th>{{ $value->nombre }}</th>
                              <th>{{ $value->identificacion}}</th>
                              <td>{{ date('d-m-Y', strtotime($value->fecha_homologacion)) }}</td>
                              <td>{{ $value->score}}</td>
                              <td>RISK International</td>
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
    $('#requests_olds-table').DataTable({

    });
  } );
</script>

@endsection