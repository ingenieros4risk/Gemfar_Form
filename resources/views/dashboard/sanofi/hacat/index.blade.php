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
                      <i class="fa fa-align-justify"></i>{{ __('Lista De HACATS') }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="awards-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>DDA</th>
                            <th>Ethics</th>
                            <th>CSR</th>
                            <th>HYS</th>
                            <th>Env</th>
                            <th>CSY</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($hacats as $hacat)
                            <tr>
                              <td>{{ $hacat->id}}</td>
                              <td>{{ $hacat->name}}</td>
                              <td>{{ $hacat->dda}}</td>
                              <td>{{ $hacat->ethics}}</td>
                              <td>{{ $hacat->csr}}</td>
                              <td>{{ $hacat->hys}}</td>
                              <td>{{ $hacat->env}}</td>
                              <td>{{ $hacat->csy}}</td>
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
    $('#awards-table').DataTable();
  } );
</script>

@endsection