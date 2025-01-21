@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Registro de Fuentes') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sources.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Responsable:</label>
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
                                        <label>País:</label>
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
                                        <label>Periodicidad:</label>
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
                                        <label>Prioridad:</label>
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
                                        <label>Impacto:</label>
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
                                        <label>Tipo de Fuente:</label>
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
                                        <label>Monitor:</label>
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
                                        <input class="form-control" type="text" placeholder="{{ __('p.e: ASOCIACION DE ESPECIALISTAS CERTIFICADOS EN DELITOS FINANCIEROS') }}" name="name" id="name" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Link de la Fuente:</label>
                                        <input class="form-control" type="text" placeholder="{{ __('p.e: https://www.delitosfinancieros.org/noticias/') }}" name="link" id="link" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Link corto de la Fuente:</label>
                                        <input class="form-control" type="text" placeholder="{{ __('p.e: https://www.delitosfinancieros.org/') }}" name="link_short" id="link_short" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Secciones de la Fuente:</label>
                                        <input class="form-control" type="text" placeholder="{{ __('p.e: Noticias/Judicial/Pólitica') }}" name="section" id="section" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Observaciones o Comentarios:</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
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
                                    <a href="{{ url('/sources') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
        </div>

@endsection