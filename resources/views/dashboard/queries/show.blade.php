@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Número Consulta en HG: {{ $query->id }}</div>
                    <div class="card-body">
                      <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                          <tr>
                            <th>Información de la consulta</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Información Buscada: </td>
                            <td>{{ $query->input }}</td>
                          </tr>
                          <tr>
                            <td>Usuario Consultor: </td>
                            <td>{{ $query->user_id }}</td>
                          </tr>
                          <tr>
                            <td>Tipo de Consulta: </td>
                            <td>{{$query->query_type_id}}</td>
                          </tr>
                          <tr>
                            <td>Estado de Consulta:</td>
                            @if($query->query_status_id=="Proceso")
                              <td><span class="badge badge-warning">En Proceso</span></td>
                            @else
                              <td><span class="badge badge-success">Finalizada</span></td>
                            @endif
                          </tr>
                          <tr>
                            <td>Fecha de Consulta</td>
                            <td>{{ $query->created_at->format('d M Y - H:i:s') }}</td>
                          </tr>
                          <tr>
                            <td>Número Consulta Inspektor: </td>
                            <td>{{$numconsulta}}</td>
                          </tr>
                          <tr>
                            <td>Cantidad de coincidencias: </td>
                            <td>{{$cantidadcoincidencias}}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                      <table class="table table-striped table-bordered" id="queries-table">
                        <thead>
                          <tr>
                            <th>No: </th>
                            <th>Prioridad: </th>
                            <th>Tipo documento:</th>
                            <th>Numero documento: </th>
                            <th>Nombre: </th>
                            <th>Color:</th>
                            <th>Número tipo lista: </th>
                            <th>Nombre de lista: : </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($collection as $data => $value )
                            <tr>
                              <td>{{ $value['No'] }}</td>
                              <td>{{ $value['Prioridad']}}</td>
                              <td>{{ $value['TipoDocumento']}}</td>
                              <td>{{ $value['Documento']}}</td>
                              <td>{{ $value['Nombre']}}</td>
                              <td style="background-color:{{ $value['Color'] }}"></td>
                              <td>{{ $value['NumeroLista']}}</td>
                              <td>{{ $value['NombreLista']}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <hr>
                      <a href="{{ route('queries.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a>
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