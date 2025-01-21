@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">
@endsection

@section('content')

  <style>

    .uper {

      margin-top: 8px;

    }
	
	h2{
		margin: 4px;
	}

  </style>


<div class="uper">
	<div class="row m-t-30">
		<div class="card">
  		<div class="card-header">LISTA DE MAPAS DE RIESGO INTERNACIONALES</div>
      	<div class="card-body">
        		<div class="card-title">
                <ul>
                  @foreach($Mapas as $Mapa)
                    <li><a href="{{ route('mapas.geo',$Mapa)}}" target="_blank">{{$Mapa->fuente}}</a></li>
                  @endforeach 
                  </ul>
          	</div>
            <hr>
<!--            <div class="cpi-node" data-embed="map"></div><script src="https://www.transparency.org/assets/scripts/cpi2019/embed.js"></script>-->


<!-- <div class="infogram-embed" data-id="_/jxh31b3lBKvbAgFQle6t" data-type="interactive" data-title="Exporting Corruption 2018"></div><script>!function(e,i,n,s){var t="InfogramEmbeds",d=e.getElementsByTagName("script")[0];if(window[t]&&window[t].initialized)window[t].process&&window[t].process();else if(!e.getElementById(n)){var o=e.createElement("script");o.async=1,o.id=n,o.src="https://e.infogram.com/js/dist/embed-loader-min.js",d.parentNode.insertBefore(o,d)}}(document,0,"infogram-async");</script> -->
        </div>
  	</div>
 	</div>
</div>

@endsection

@section('javascript')

@endsection