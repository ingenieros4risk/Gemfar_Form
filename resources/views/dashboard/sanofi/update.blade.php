@extends('dashboard.sanofi')

@section('css')

@endsection

@section('content')


<div class="container">
  <nav class="navbar fixed-top navbar-expand-lg" style="background-color: #ffff;">
    <div class="container justify-content-center">
      <ul class="nav navbar-nav navbar-center" id="nav-center" style="justify-content: center;">
        <li><img class="c-sidebar-brand-full" src="{{ url('/assets/brand/sanofi.png') }}"></li>
      </ul>
    </div>

    <div class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LANG
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="locale/en">English</a>
          <a class="dropdown-item" href="locale/es">Spanish</a>
        </div>
    </div>
  </nav>
  <br>
  <br>
    
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card p-8">
        <div class="card-body">
          <livewire:update />
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection