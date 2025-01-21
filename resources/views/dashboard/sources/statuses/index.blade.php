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
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Estados de Fuentes') }}
                      <button class="btn btn-outline-success cc_pointer float-right" type="button">
                        <a href="{{ url('/source/status/create') }}">
                          <svg class="c-icon">
                            <use xlink:href="{{ url('assets/icons/coreui/free-symbol-defs.svg#cui-plus')}}"></use>
                          </svg>                          
                        </a>
                      </button>
                    </div>                      
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="statuses-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($statuses as $status)
                            <tr>
                              <td>{{ $status->id}}</td>
                              <td>{{ $status->name}}</td>
                              <td>
                                <a href="{{ url('/source/status/' . $status->id . '/edit') }}" class="btn btn-outline-warning">Editar</a>
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
    $('#statuses-table').DataTable();
  } );
</script>

@endsection