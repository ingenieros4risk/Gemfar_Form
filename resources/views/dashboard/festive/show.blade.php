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
                <a href="{{ route('bases.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
            </div>
            </div>
          </div>
        </div>
@endsection


@section('javascript')

@endsection