@extends('dashboard.base')
@section('css')

@endsection
@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> ID Error: #-0{{ $report->id }}
                    </div>
                    <div class="card-body">
                      <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                          <tr>
                            <th>Información del Reporte de seguimiento de Calidad</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Analista Reportador: </td>
                            <td>{{ $report->users_report_id }}</td>
                          </tr>
                          <tr>
                            <td>Analista Responsable: </td>
                            <td>{{ $report->users_active_id }}</td>
                          </tr>
                          <tr>
                            <td>Analista Ejecutor ( Analista Error): </td>
                            <td>{{ $report->users_error_id }}</td>
                          </tr>
                          <tr>
                            <td>Inspektor ID: </td>
                            <td>{{ $report->inspektor_ids }}</td>
                          </tr>
                          <tr>
                            <td>Campos: </td>
                            <td>
                              @foreach($report->fields as $val)
                                    {{$val}},
                                @endforeach
                            </td>
                          </tr>
                          <tr>
                            <td>Valor Error: </td>
                            <td>{{ $report->amount }}</td>
                          </tr>                          
                          <tr>
                            <td>Tipo de Error: </td>
                            <td>
                                @if($report->amount > 0 && $report->amount <=11)
                                <span class="badge badge-pill badge-info">
                                  Bajo
                                </span>
                                @elseif($report->amount > 11 && $report->amount <= 23)
                                <span class="badge badge-pill badge-warning">
                                  Medio
                                </span>
                                @elseif($report->amount > 23)
                                <span class="badge badge-pill badge-danger">
                                  Alto
                                </span>
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <td>Estado de la Actividad:</td>
                            @if($report->status==0)
                              <td><span class="badge badge-warning">Pendiente</span></td>
                            @else
                              <td><span class="badge badge-success">Finalizada</span></td>
                            @endif
                          </tr>
                          <tr>
                            <td>Fecha de Reporte</td>
                            <td>{{ $report->report_date}}</td>
                          </tr>
                          <tr>
                            <td>Fecha de Finalización</td>
                            <td>{{ $report->end_date}}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>ID Error: #-0{{ $report->id }}
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                          <label>Descripción del Error:</label>
                          <textarea class="form-control" rows="9" placeholder="{{$report->description}}"></textarea>
                      </div>
                      <div class="form-group row">
                          <label>Solución del Error:</label>
                          <textarea class="form-control" rows="9" placeholder="{{$report->solution}}"></textarea>
                      </div>
                    </div>
                  </div>                  
                  <hr>
                  <a href="{{ route('errors.reports.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection