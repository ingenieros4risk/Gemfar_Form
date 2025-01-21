@extends('dashboard.base')
@section('css')

<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">

@endsection
@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ $country->name }}</div>
                    <div class="card-body">
                      <div class="row">
                        <h4>País: {{ $country->name }}</h4>
                      </div>
                      <div class="row">
                        <h4>Bandera:</h4>                                                
                        <div class="col-6 col-sm-4 col-md-2 text-center"><i class="c-icon c-icon-6xl mt-12 mb-2 {{$country->flag}}"></i>
                        </div>
                      </div>
                        <a href="{{ route('countries.index') }}" class="btn btn-block btn-primary">{{ __('Regresar') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection