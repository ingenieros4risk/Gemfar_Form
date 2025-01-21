@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">
@endsection

@section('content')
@if(session()->get('success'))

<div class="alert alert-success">

  {{ session()->get('success') }}  

</div><br />

@endif
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Lista Tareas de E-proveedores') }}
                      <button class="btn btn-outline-success cc_pointer float-right" type="button">
                        <a href="{{ url('/genfar-supliers/create') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                          </svg>                          
                        </a>
                      </button>
                      <button class="btn btn-outline-warning cc_pointer float-right" type="button">
                        <a target="_blank" href="{{ route('genfar.tasks') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-cloud-download"></use>
                          </svg>          
                        </a>
                      </button>
                      <button class="btn btn-outline-danger cc_pointer float-right" type="button">
                        <a target="_blank" href="{{ route('genfar.pending_notification') }}">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-closed"></use>
                          </svg>          
                        </a>
                      </button>
                    </div>
                    <div class="card-body">
                        <table class="stripe row-border order-column nowrap" style="width:100%" id="requests_risk-table">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Ver</th>
                            <th>Suplier Code Colombia</th>
                            <th>Suplier Code Ecuador</th>
                            <th>Suplier Code Perú</th>
                            <th>Tipo de Tarea</th>
                            <th>Fecha de Solicitud</th>
                            <th>Usuario Solicitante</th>
                            <th>Nombre Proveedor</th>
                            <th>TAX ID</th>
                            <th>Correo Proveedor</th>
                            <th>Telefono Proveedor</th>
                            <th>Tipo de Proveedor</th>
                            <th>Aprobado</th>
                            <th>Estado</th>
                            <th>Fecha de Solución</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($requests_risk as $value)
                            <tr>
                              <td>{{ $value->id}}</td>
                              <td>
                                <a href="{{ url('/genfar-supliers/' . $value->id) }}" class="btn btn-block btn-primary">Ver</a>
                              </td>
                              <td>
                                @isset($value->supplier_code_co)
                                {{ $value->supplier_code_co}}
                                @endisset
                              </td>
                              <td>
                                @isset($value->supplier_code_ec)
                                {{ $value->supplier_code_ec}}
                                @endisset
                              </td>
                              <td>
                                @isset($value->supplier_code_pe)
                                {{ $value->supplier_code_pe}}
                                @endisset
                              </td>
                              <td>
                                {{ $value->action}}
                              </td>
                              <td>{{ date('d-m-y', strtotime($value->date_request))}}</td>
                              <td>{{ $value->solicitante}}</td>
                              <td>{{ $value->provider_name}}</td>
                              <td>{{ $value->tax_id}}</td>
                              <td>{{ $value->provider_mail}}</td>
                              <td>{{ $value->provider_phone}}</td>
                              <td>{{ $value->genfar_provider}}</td>
                              <td>
                                  <span class="badge badge-pill {{ $value->class}}">
                                      @if($value->approve == "APROBAR")
                                        APROBADO
                                      @elseif($value->approve == "RECHAZAR")
                                        RECHAZADO
                                      @else
                                        SIN GESTIONAR
                                      @endif
                                  </span>
                              </td>
                              <td>
                                  @if($value->status == 0 )
                                    PENDIENTE
                                  @elseif($value->status == 1)
                                    FINALIZADO
                                  @elseif($value->status == 2)
                                    RECHAZADO
                                  @endif
                              </td>
                              <td>
                                @isset($value->date_updated)
                                  {{ date('d-m-y', strtotime($value->date_updated))}}
                                @endisset()
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

  } );
</script>

@endsection