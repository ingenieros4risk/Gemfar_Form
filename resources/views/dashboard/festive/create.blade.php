@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Registro de Bases') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('festives.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Responsable:</label>
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
                                        <label>Periodicidad:</label>
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
                                        <label>Tipo de Extracción:</label>
                                        <select name="id_bases_extract" id="id_bases_extract" class="form-control input-lg">
                                            <option value="">--- Seleccione un Tipo de Extracción ---</option>
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
                                        <label>Lista de Inspektor:</label>
                                        <select name="id_list" id="id_list" class="form-control input-lg">
                                            <option value="">--- Seleccione una Lista ---</option>
                                            @foreach($lists as $list)
                                                <option value="{{ $list->id }}">{{$list->id." - ".$list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Link de la Fuente:</label>
                                        <input class="form-control" type="text" placeholder="{{ __('p.e: https://inspektor.datalaft.com/') }}" name="font" id="font" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Fecha de actualización:</label>
                                        <input class="form-control" id="date_update" type="date" name="date_update" id="date_update" placeholder="date">
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-block btn-success" type="submit">
                                        Agregar</span>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ url('/bases') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
        </div>

@endsection