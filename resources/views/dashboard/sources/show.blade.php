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
                      <i class="fa fa-align-justify"></i> ID Actividad: {{ $activity->id }}
                    </div>
                    <div class="card-body">
                      <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                          <tr>
                            <th>Información de la Actividad</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Analista: </td>
                            <td>{{ $activity->users_id }}</td>
                          </tr>
                          <tr>
                            <td>Proceso: </td>
                            <td>{{ $activity->process_id }}</td>
                          </tr>
                          <tr>
                            <td>Subproceso: </td>
                            <td>{{$activity->sub_process_id}}</td>
                          </tr>
                          <tr>
                            <td>Estado de la Actividad:</td>
                            @if($activity->status==0)
                              <td><span class="badge badge-warning">En Proceso</span></td>
                            @else
                              <td><span class="badge badge-success">Finalizada</span></td>
                            @endif
                          </tr>
                          <tr>
                            <td>Tiempo de retraso: </td>
                            <td>{{ $activity->delay_time }} minutos</td>
                          </tr>
                          <tr>
                            <td>Hora de Inicio</td>
                            <td>{{ $activity->init_date}}</td>
                          </tr>
                          <tr>
                            <td>Hora de Finalización</td>
                            <td>{{ $activity->end_date}}</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> ID Actividad: {{ $activity->id }}
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                          <label>Labor realizada:</label>
                          <textarea class="form-control" rows="9" placeholder="{{$activity->task}}" required></textarea>
                      </div>
                      <div class="form-group row">
                          <label>Observacion de la actividad:</label>
                          <textarea class="form-control" rows="9" placeholder="{{$activity->observation}}" required></textarea>
                      </div>
                    </div>
                  </div>                  
                  <hr>
                  <a href="{{ route('activities.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection