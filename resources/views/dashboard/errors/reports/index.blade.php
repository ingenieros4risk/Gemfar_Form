@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

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
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Reporte de Errores') }}
                      <button class="btn btn-outline-success cc_pointer float-right" type="button">
                        <a href="{{ url('/errors/reports/create') }}">
                          <svg class="c-icon">
                            <use xlink:href="../assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                          </svg>                          
                        </a>
                      </button>
                      <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                        <a target="_blank" href="{{ route('errors.export') }}">
                          <svg class="c-icon">
                            <use xlink:href="../assets/icons/coreui/free-symbol-defs.svg#cui-cloud-download"></use>
                          </svg>
                        </a>
                      </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="fields-table">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Gestionar</th>
                            <th>Analista Reportador</th>
                            <th>Analista Responsable</th>
                            <th>Analista Error</th>
                            <th>Estado</th>
                            <th>Campos Reportados</th>
                            <th>Tipo Error</th>
                            <th>Hora Reporte</th>
                            <th>Hora Corrección</th>
                            <th>Ver</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($reports as $value)
                            <tr>
                              <td>{{ $value->id }}</td>
                              @if($value->status_id == 0)
                              <td>
                                <a href="{{ url('/errors/reports/' . $value->id . '/edit') }}" class="btn btn-outline-danger">Gestionar</a>                                
                              </td>
                              @else
                                <td>
                                  <a href="{{ url('/errors/reports/' . $value->id . '') }}" class="btn btn-outline-success">Ver</a>
                              </td>
                              @endif
                              <td>{{ $value->users_report_id}}</td>
                              <td>{{ $value->users_active_id}}</td>
                              <td>{{ $value->users_error_id}}</td>
                              <td>
                                <span class="{{ $value->status_class }}">
                                  @if($value->status_id == 0)
                                    Pendiente
                                  @else
                                    Finalizado
                                  @endif
                                </span>
                              </td>
                              <td>
                                @foreach($value->fields as $val)
                                    {{$val}},
                                @endforeach
                              </td>
                              <td>
                                @if($value->amount > 0 && $value->amount <=11)
                                <span class="badge badge-pill badge-info">
                                  Bajo
                                </span>
                                @elseif($value->amount > 11 && $value->amount <= 23)
                                <span class="badge badge-pill badge-warning">
                                  Medio
                                </span>
                                @elseif($value->amount > 23)
                                <span class="badge badge-pill badge-danger">
                                  Alto
                                </span>
                                @endif
                              </td>
                              <td>{{ $value->report_date}}</td>
                              <td>{{ $value->end_date}}</td>
                              <td></td>
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
    $('#fields-table').DataTable();
  } );
</script>

@endsection