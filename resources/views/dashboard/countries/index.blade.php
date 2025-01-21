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
                      <i class="fa fa-align-justify"></i>{{ __('Lista de Paises') }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="country-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Bandera</th>
                            <th>Ver</th>
                            <th>Ficha</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($countries as $country)
                            <tr>
                              <td>{{ $country->id }}</td>
                              <td>{{ $country->name }}</td>
                              <td><div class="col-6 col-sm-4 col-md-2 text-center"><i class="c-icon c-icon-2xl {{$country->flag}}"></i></div></td>
                              <td>
                                <a href="{{ url('/countries/' . $country->id) }}" class="btn btn-block btn-primary">Ver</a>
                              </td>
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
    $('#country-table').DataTable();
  } );
</script>

@endsection

