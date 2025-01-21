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
          <div class="card-header"><h4>Consulta Inspektor Web Service</h4></div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="{{ route('inspektor.search') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nombre</label>
                                <input 
                                    type="text"
                                    placeholder="Nombre"
                                    name="name"
                                    class="form-control"
                                >
                            </div>
                            <div class="form-group">
                                <label>Documento</label>
                                <input 
                                    type="text"
                                    placeholder="Documento"
                                    name="document"
                                    class="form-control"
                                >
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Consultar
                            </button>
                            <a 
                                href="{{ route('queries.index') }}"
                                class="btn btn-primary"
                            >
                                Return
                            </a>
                        </form>
                    </div>
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