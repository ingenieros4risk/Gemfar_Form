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
                <a href="{{ url('/genfar-request-risk/create') }}">
                  <svg class="c-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                  </svg>                          
                </a>
              </button>
              <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                <a target="_blank" href="{{ route('genfar.export') }}">
                  <svg class="c-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-cloud-download"></use>
                  </svg>          
                </a>
              </button>
              <button class="btn btn-outline-primary cc_pointer float-right" type="button">
                <a target="_blank" href="{{ route('genfar.forms') }}">
                  <svg class="c-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-address-book"></use>
                  </svg>          
                </a>
              </button>
              <button class="btn btn-outline-danger cc_pointer float-right" type="button">
                <a target="_blank" href="{{ route('genfar.notification_aditional') }}">
                  <svg class="c-icon">
                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-closed"></use>
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
                    <th>Check Sagrilaft</th>
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
                  @foreach($requests_risk as $value)
                    <tr>
                      <td>{{ $value->id}}</td>
                      <td>
                        <a href="{{ url('/genfar-request-risk/' . $value->id) }}" class="btn btn-block btn-primary">Ver</a>
                      </td>
                      <td>
                        @if($value->status >= 5 && $value->task_eprovedores == 0)
                          <a href="{{ url('/genfar-supliers/create/' . $value->id) }}" target="_blank"class="btn btn-block btn-warning">Crear Tarea</a>
                        @endif
                      </td>
                      <td>
                          <span class="badge badge-pill {{ $value->class}}">
                              {{$value->status_id}}
                          </span>
                      </td>
                      <td>
                        @if($value->hys < 1)
                          <button class="btn btn-pill btn-block btn-success" type="button">OK</button>
                        @else
                          <button class="btn btn-pill btn-block btn-danger" type="button">X</button>
                        @endif
                      </td>
                      <td>
                        @if($value->csr < 1)
                          <button class="btn btn-pill btn-block btn-success" type="button">OK</button>
                        @else
                          <button class="btn btn-pill btn-block btn-danger" type="button">X</button>
                        @endif
                      </td>
                      <td>
                        @if($value->env < 1)
                          <button class="btn btn-pill btn-block btn-success" type="button">OK</button>
                        @else
                          <button class="btn btn-pill btn-block btn-danger" type="button">X</button>
                        @endif
                      </td>
                      <td>
                        @if($value->ethics < 1)
                          <button class="btn btn-pill btn-block btn-success" type="button">OK</button>
                        @else
                          <button class="btn btn-pill btn-block btn-danger" type="button">X</button>
                        @endif
                      </td>
                      <td>
                        @if($value->sarlaft == 0)
                          <button class="btn btn-pill btn-block btn-success" type="button">OK</button>
                        @elseif($value->sarlaft == 3)
                          <button class="btn btn-pill btn-block btn-warning" type="button">Pendiente</button>
                        @else
                          <button class="btn btn-pill btn-block btn-danger" type="button">X</button>
                        @endif
                      </td>
                      <td>
                        @if($value->csy < 1)
                          <button class="btn btn-pill btn-block btn-success" type="button">OK</button>
                        @else
                          <button class="btn btn-pill btn-block btn-danger" type="button">X</button>
                        @endif
                      </td>
                      <td>{{ date('d-m-y', strtotime($value->date_solicitud))}}</td>
                      <td>
                        {{ $value->date_finalizacion ?? 'N/A' }}
                      </td>
                      <td>{{ $value->user_solicitante}}</td>
                      <td>{{ $value->user_email}}</td>
                      <td>{{ $value->provider_name}}</td>
                      <td>{{ $value->provider_id}}</td>
                      <td>{{ $value->provider_email}}</td>
                      <td>{{ $value->sanofi_provider}}</td>
                      <td>{{ $value->hacat}}</td>
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