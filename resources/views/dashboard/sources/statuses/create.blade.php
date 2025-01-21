@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Registro de Estado de Fuente') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sources.statuses.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nombre del nuevo Estado:</label>
                                        <input class="form-control" type="text" placeholder="{{ __('p.e:En Proceso') }}" name="name" id="name" required autofocus>
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
                                    <a href="{{ url('/source/status') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
        </div>

@endsection