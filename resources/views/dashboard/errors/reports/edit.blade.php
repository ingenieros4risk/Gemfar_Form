@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>Gestionar Error: #-0{{ $report->id }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/errors/reports/{{ $report->id }}">
                            @csrf
                            @method('PUT')
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
                                    <td></td>
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
                                </tbody>
                            </table>
                            </div>
                            <hr><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Solución:</label>
                                        <textarea class="form-control" id="textarea-input" name="solucion" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $report->id }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-block btn-success" type="submit"><svg class="c-icon mr-2">
                                            <use xlink:href="/icons/sprites/free.svg#cil-media-stop"></use>
                                            </svg><span>{{ __('Gestionar') }}</span>
                                        </button>
                                        <a href="{{ route('reports.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection