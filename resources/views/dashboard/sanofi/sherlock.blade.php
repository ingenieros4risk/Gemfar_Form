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
                      <i class="fa fa-align-justify"></i>{{ __('Lista Proveedores en Sherlock') }}
                      <button class="btn btn-outline-success cc_pointer float-right" type="button">
                        <a href="{{ url('/genfar-request-risk/create') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                          </svg>                          
                        </a>
                      </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="requests_forms-table">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Fecha de Diligenciamiento</th>
                            <th>País Constitución</th>
                            <th>País(es) Comercialización</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Fecha de Homologación</th>
                            <th>Responsable</th>
                            <th>Categorización HCP</th>
                            <th>Due Diligence</th>
                            <th>Ver</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($requests_forms as $value)
                            <tr>
                              <td>{{ $value->id}}</td>
                              <th>09-04-2021</th>
                              <th>Colombia</th>
                              <th>Colombia, Perú</th>
                              <td>{{ $value->name}}</td>
                              <td>{{ $value->document}}</td>
                              <td>{{ $value->date_homologation}}</td>
                              <td>RISK International</td>
                              <th>Global</th>
                              <th>No</th>
                              <td>
                                <a href="#" class="btn btn-block btn-primary">Ver</a>
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
    $('#requests_forms-table').DataTable({
      "scrollX": true
    });
  } );
</script>

@endsection