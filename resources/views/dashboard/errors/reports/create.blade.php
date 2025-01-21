@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Registrar Reporte de Error') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reports.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Analista:</label>
                                        <select name="users_active_id" id="users_active_id" class="form-control input-lg">
                                            <option value="">--- Seleccione el usuario reportado</option>

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
                                        <label>Ids de Inspektor:</label>
                                        <input class="form-control" type="text" placeholder="{{ __('p.e: 1105621 ó [110876 - 112902]') }}" name="inspektor_ids" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-md-3 col-form-label">Campos de Inspektor</label>
                                        <div class="col-md-9 col-form-label">
                                        @foreach($evaluatedField as $item)
                                        
                                            <div class="form-check checkbox">
                                                <label><input type="checkbox" name="fields[]" value={{$item->id}}> {{$item->name}} - Peso: {{$item->weight}}</label>
                                            </div>
                                        
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Observación Error reportado:</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="{{ __('Content..') }}" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">
                                <span>{{ __('Reportar') }}</span>
                            </button>
                            <a href="" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
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


