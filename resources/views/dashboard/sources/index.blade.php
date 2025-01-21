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
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Fuentes') }}
                      <button class="btn btn-outline-success cc_pointer float-right" type="button">
                        <a href="{{ url('/sources/create') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                          </svg>                          
                        </a>
                      </button>
                      <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                        <a target="_blank" href="{{ route('sources.export') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-cloud-download"></use>
                          </svg>          
                        </a>
                      </button>
                      <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                        <a target="_blank" href="{{ route('sources.fix') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lightbulb"></use>
                          </svg>          
                        </a>
                      </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="sources-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Responsable</th>
                            <th>Estado</th>
                            <th>Pais</th>
                            <th>Periodicidad</th>
                            <th>Prioridad</th>
                            <th>Impacto</th>
                            <th>Tipo</th>
                            <th>Monitor</th>
                            <th>Ver</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($sources as $source)
                            <tr>
                              <td>{{ $source->id }}</td>
                              <td>{{ $source->name }}</td>
                              <td>{{ $source->users_id}}</td>
                              <td>{{ $source->status_id}}</td>
                              <td><div class="col-3 col-sm-2 col-md-1 text-center"><i class="c-icon c-icon-1xl {{$source->country_id}}"></i></div>
                              </td>
                              <td>{{  $source->periodicity_id}}</td>
                              <td>{{  $source->priority_id}}</td>
                              <td>{{  $source->impact_id}}</td>
                              <td>{{  $source->type_id}}</td>
                              <td>{{  $source->monitor_id}}</td>
                              <td>
                                <a target="_blank" href="{{ $source->link}}" class="btn btn-outline-info">Ver</a>
                              </td>
                              <td>
                                <a href="{{ url('/sources/' . $source->id . '/edit') }}" class="btn btn-outline-danger">Editar/ver</a>
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
    $('#sources-table').DataTable({
      "scrollX": true
    });
  });
</script>

@endsection