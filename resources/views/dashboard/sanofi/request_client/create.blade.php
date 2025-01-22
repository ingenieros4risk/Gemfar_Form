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

  </nav>
  <br>
  <br>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card p-8">
        <div class="card-body">
          <livewire:genfar-client :clients_forms="$clients_forms"/>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }

  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function scrollToBottom() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
  }
</script>
@endsection

