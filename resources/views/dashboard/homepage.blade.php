@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">

    </div>
  </div>
</div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
