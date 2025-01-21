@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Consultas') }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="queries-table">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Usuario</th>
                            <th>Tipo Consulta</th>
                            <th>Estado</th>
                            <th>Ver</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($queries as $query)
                            <tr>
                              <td>{{ $query->id }}</td>
                              <td>{{ $query->user_id}}</td>
                              <td>{{ $query->query_type_id}}</td>
                              <td>{{ $query->query_status_id}}</td>
                              <td>
                                <a href="{{ url('/queries/' . $query->id) }}" class="btn btn-block btn-primary">Ver</a>
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
    $('#queries-table').DataTable();
  } );
</script>

@endsection