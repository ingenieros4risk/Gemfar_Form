@extends('dashboard.base')

@section('css')

@endsection

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success">
        Resultado de la consulta: <a href="{{session()->get('message')}}">Ir a la Consulta</a>
    </div>
@endif
<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header"><h4>Consulte Datos - Elecciones Regionales y Municipales 2021</h4></div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="{{ route('inspektor.search_ve') }}" onsubmit="onSubmit()">
                            @csrf
                            <div class="form-group">
                                <label>Tipo Documento</label>
                                <select name="tipo" id="tipo" class="form-control input-lg">
                                    <option value="V">Venezolano</option>
                                    <option value="E">Extranjero</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Documento</label>
                                <input type="text" placeholder="Documento" id="document" name="document" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Consultar
                            </button>
                            <a href="{{ route('queries.index') }}" class="btn btn-primary">
                                Volver
                            </a>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-header"><h4>Consulte Datos - Elecciones Regionales y Municipales 2021</h4></div>
                <div class="card-body">           
                    <div class="row">
                    {{isset($respuesta)}}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

@endsection