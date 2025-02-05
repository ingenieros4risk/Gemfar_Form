@extends('dashboard.base')

@section('css')
<!-- Bootstrap 5 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<!-- DataTables con Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">
<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">
<style>
    .btn-view {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.375rem 0.75rem;
    }
    .icon-btn {
        font-size: 1.2rem;
    }
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #dee2e6;
    } 
</style>
@endsection

@section('content')
@if(session()->get('error'))
<div class="alert alert-warning" role="alert">
  {{ session()->get('error') }}
</div><br />
@endif

<div class="container-fluid my-4">
  <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Lista de Solicitudes de Clientes</h5>
          <a href="{{ url('/genfar-request-clients/create') }}" class="btn btn-outline-success">
              <svg class="c-icon">
                  <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
              </svg>
          </a>
      </div>
      <div class="card-body">
          <div class="">
              <table class="table table-hover table-bordered nowrap w-100" id="requests_risk-table">
                  <thead>
                      <tr>
                          <th rowspan="2">ID</th>
                          <th rowspan="2">Ver</th>
                          <th rowspan="2">Estado</th>
                          <th rowspan="2">Tipo Cliente</th>
                          <th rowspan="2">Nombre Cliente</th>
                          <th rowspan="2">N° Documento</th>
                          <th rowspan="2">Correo Cliente</th>
                          <th rowspan="2">Fecha de Solicitud</th>
                          <th rowspan="2">Usuario Solicitante</th>
                          <th colspan="6" class="text-center">Aprobaciones</th>
                      </tr>
                      <tr>
                          <th>Tesorería & Cartera</th>
                          <th>Datos Maestros</th>
                          <th>Control Interno</th>
                          <th>Sagrilaft</th>
                          <th>Asuntos Regulatorios </th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($clients as $value)
                      <tr>
                          <td class="text-center">{{ $value->id }}</td>
                          <td class="text-center">
                              <a href="{{ url('/genfar-request-clients/' . $value->id) }}" class="btn btn-primary btn-view">
                                  <i class="fas fa-eye icon-btn"></i>
                              </a>
                          </td>
                          <td class="text-center">
                              <span class="badge badge-status {{ $value->class }}">
                                  {{ $value->id_status }}
                              </span>
                          </td>
                          <td>{{ $value->id_client_type }}</td>
                          <td>{{ $value->third_party_name }}</td>
                          <td>{{ $value->number_client }}</td>
                          <td>{{ $value->email }}</td>
                          <td class="text-center">{{ date('d-m-y', strtotime($value->date_solicitud)) }}</td>
                          <td>{{ $value->id_user }}</td>
                          <!-- Aprobaciones -->
                          <td class="text-center">
                                <span class="{{ $value->tesoreria_status === 'Aprobado' ? 'text-success' : 'text-danger' }}">
                                    ✕
                                </span>
                            </td>


                          </td>
                          <td class="text-center">
                          <span class="{{ $value->datos_maestros_status === 'Aprobado' ? 'text-success' : 'text-danger' }}">
                                    ✕
                            </span>
                          </td>
                          <td class="text-center">
                          <span class="{{ $value->control_interno_status === 'Aprobado' ? 'text-success' : 'text-danger'}}">
                            ✕
                            </span>
                          </td>
                          <td class="text-center">
                          <span class="{{ $value->cumplimiento_status === 'Aprobado' ? 'text-success' : 'text-danger'}}">
                            ✕
                            </span>
                          </td>
                          <td class="text-center">
                          <span class="{{ $value->regulatorio_status === 'Aprobado' ? 'text-success' : 'text-danger'}}">
                            ✕
                            </span>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
<script>
  $.fn.DataTable.ext.pager.numbers_length = 5;

  $(document).ready(function() {
    $('#requests_risk-table').DataTable({
        responsive: true,
        scrollY: "500px",
        scrollCollapse: true,
        paging: true,
        pagingType: "simple_numbers",
        fixedColumns: {
            left: 3
        },
        fixedHeader: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
        }
    });
  });
</script>
@endsection


