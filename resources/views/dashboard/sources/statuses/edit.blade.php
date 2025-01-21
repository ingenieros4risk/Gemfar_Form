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
                      <i class="fa fa-align-justify"></i> {{ __('Formulario Edición de Estado de Fuente') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/sources/statuses{{ $source->id }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nombre del Estado:</label>
                                        <input class="form-control" type="text" value="{{ $source->name }}" name="name" id="name" required >
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