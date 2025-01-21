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
              <i class="fa fa-align-justify"></i>{{ __('Lista Solicitudes Homologación de Proveedores a Risk') }}
              <button class="btn btn-outline-success cc_pointer float-right" type="button">
                <a href="{{ url('/genfar-request-clients/create') }}">
                  <svg class="c-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                  </svg>                          
                </a>
              </button>
            </div>
            <div class="card-body wrapper">
                <table class="stripe row-border order-column nowrap" style="width:100%" id="requests_risk-table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Ver</th>
                    <th>Crear Tarea</th>
                    <th>Estado</th>
                    <th>Check HYS</th>
                    <th>Check CSR</th>
                    <th>Check ENV</th>
                    <th>Check Ethics</th>
                    <th>Check SAGRILAFT</th>
                    <th>Check CSY</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de Solución</th>
                    <th>Usuario Solicitante</th>
                    <th>Correo Solicitante</th>
                    <th>Nombre Proveedor</th>
                    <th>TAX ID</th>
                    <th>Correo Proveedor</th>
                    <th>Tipo de Proveedor</th>
                    <th>HACAT</th>
                  </tr>
                </thead>
                <tbody>
                  
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
    $('#requests_risk-table').DataTable( {
        scrollY:        300,
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            left: 1,
            right: 1
        },
        fixedHeader:           {
            header: true,
            footer: true
        }
    });
  });
</script>

@endsection