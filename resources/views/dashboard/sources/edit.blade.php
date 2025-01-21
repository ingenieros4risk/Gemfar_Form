@extends('dashboard.base')

@section('css')

<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">

@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Información de la Fuente') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Responsable:</label>
                                    <select class="form-control input-lg" >
                                        <option value="">{{ $source->users_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>País:</label>
                                        <div class="col-6 col-sm-4 col-md-2 text-center"><i class="c-icon c-icon-6xl mt-12 mb-2 {{$source->country_id}}"></i>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Periodicidad:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{ $source->periodicity_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Prioridad:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{ $source->priority_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Impacto:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{$source->impact_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tipo de Fuente:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{$source->type_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Monitor:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{$source->monitor_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nombre de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{$source->name}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{$source->link}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link corto de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{$source->link_short}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Secciones de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{$source->section}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Observaciones o Comentarios:</label>
                                    <textarea class="form-control" rows="9" placeholder="{{$source->comment}}"></textarea>
                                </div>
                            </div>
                        </div>                                                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Estado:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{$source->status_id}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> {{ __('Formulario Edición de Fuente') }}</div>
                <div class="card-body">
                    <form method="POST" action="/sources/{{ $source->id }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo Responsable:</label>
                                    <select name="users_id" id="users_id" class="form-control input-lg">
                                        <option value="">--- Seleccione un Analista ---</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo País:</label>
                                    <select name="country_id" id="country_id" class="form-control input-lg">
                                        <option value="">--- Seleccione un País ---</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nueva Periodicidad:</label>
                                    <select name="periodicity_id" id="periodicity_id" class="form-control input-lg">
                                        <option value="">--- Seleccione una Periodicidad ---</option>
                                        @foreach($periodicities as $periodicity)
                                            <option value="{{ $periodicity->id }}">{{ $periodicity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nueva Prioridad:</label>
                                    <select name="priority_id" id="priority_id" class="form-control input-lg">
                                        <option value="">--- Seleccione una Prioridad ---</option>
                                        @foreach($priorities as $priority)
                                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo Impacto:</label>
                                    <select name="impact_id" id="impact_id" class="form-control input-lg">
                                        <option value="">--- Seleccione un Impacto ---</option>
                                        @foreach($impacts as $impact)
                                            <option value="{{ $impact->id }}">{{ $impact->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo Tipo de Fuente:</label>
                                    <select name="type_id" id="type_id" class="form-control input-lg">
                                        <option value="">--- Seleccione un Tipo ---</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo Tipo de Monitor:</label>
                                    <select name="monitor_id" id="monitor_id" class="form-control input-lg">
                                        <option value="">--- Seleccione un Tipo de Monitor ---</option>
                                        @foreach($monitors as $monitor)
                                            <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nombre de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{ $source->name }}" name="name" id="name" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{ $source->link }}" name="link" id="link" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link corto de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{ $source->link_short}}" name="link_short" id="link_short" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Secciones de la Fuente:</label>
                                    <input class="form-control" type="text" value="{{ $source->section}}" name="section" id="section" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Editar Observacion o Comentario:</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="9" value="{{ $source->comment}}" required></textarea>
                                </div>
                            </div>
                        </div>                                                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Estado:</label>
                                    <select name="status_id" id="status_id" class="form-control input-lg">
                                        <option value="">--- Seleccione un Estado ---</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-block btn-warning" type="submit"><svg class="c-icon mr-2">
                                <use xlink:href="/icons/sprites/free.svg#cil-pencil"></use>
                            </svg><span>{{ __('Editar') }}</span></button>
                        <a href="{{ route('sources.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
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