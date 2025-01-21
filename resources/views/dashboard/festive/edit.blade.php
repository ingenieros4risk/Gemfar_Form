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
                      <i class="fa fa-align-justify"></i> {{ __('Información de la Base') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Responsable:</label>
                                    <select class="form-control input-lg" >
                                        <option value="">{{ $base->id_user}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Periodicidad:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{ $base->id_periodicity}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Medio de Extracción:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{ $base->id_bases_extract}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Lista de Inspektor:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{ $base->id_list}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Estado de la Base:</label>
                                    <select class="form-control input-lg">
                                        <option value="">{{ $base->id_bases_status }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link de la Base:</label>
                                    <input class="form-control" type="text" value="{{$base->font}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Días para actualizar/vencidos:</label>
                                    <input class="form-control" type="text" value="{{$base->days_update}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Fecha de Actualización:</label>
                                    <input class="form-control" type="text" value="{{$base->date_update}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Fecha para Actualizar:</label>
                                    <input class="form-control" type="text" value="{{$base->date_to_update}}" readonly="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> {{ __('Formulario Edición de Base') }}</div>
                <div class="card-body">
                    <form method="POST" action="/bases/{{ $base->id }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo Responsable:</label>
                                    <select name="id_user" id="id_user" class="form-control input-lg">
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
                                    <label>Nueva Periodicidad:</label>
                                    <select name="id_periodicity" id="id_periodicity" class="form-control input-lg">
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
                                    <label>Nuevo Tipo de Extracción:</label>
                                    <select name="id_bases_extract" id="id_bases_extract" class="form-control input-lg">
                                        <option value="">--- Seleccione un tipo de extracción ---</option>
                                        @foreach($extracts as $extract)
                                            <option value="{{ $extract->id }}">{{ $extract->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nuevo Lista de Inspektor:</label>
                                    <select name="id_list" id="id_list" class="form-control input-lg">
                                        <option value="">--- Seleccione una Lista ---</option>
                                        @foreach($lists as $list)
                                            <option value="{{ $list->id }}">{{ $list->id }} - {{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Estado:</label>
                                    <select name="id_bases_status" id="id_bases_status" class="form-control input-lg">
                                        <option value="">--- Seleccione un Estado ---</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link de la Base:</label>
                                    <input class="form-control" type="text" value="{{ $base->font }}" name="font" id="font" required >
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-block btn-warning" type="submit"><svg class="c-icon mr-2">
                                <use xlink:href="/icons/sprites/free.svg#cil-pencil"></use>
                            </svg><span>{{ __('Editar') }}</span></button>
                        <a href="{{ route('bases.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
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