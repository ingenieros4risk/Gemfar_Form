@extends('dashboard.base')

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
      		<div class="card-header">MAPAS DE RIESGO INTERNACIONALES / {{$Mapa->id}}</div>
          	<div class="card-body">
        		<div class="card-title">
        			<div class="row col-md-6">
        				<h3 class="title-2">FUENTE: {{$Mapa->fuente}}</h3>
        			</div>
        			<hr>
    			@if($Mapa->id !=10 or $Mapa->id !=2)
              	<div style="width:800px;border:1px solid black;margin:0px auto">
		      				<div id="geo"></div>
		      				<?= $lava->render('GeoChart', 'Score', 'geo') ?>
								</div>
					@else
						<div class="infogram-embed" data-id="_/jxh31b3lBKvbAgFQle6t" data-type="interactive" data-title="Exporting Corruption 2018"></div><script>!function(e,i,n,s){var t="InfogramEmbeds",d=e.getElementsByTagName("script")[0];if(window[t]&&window[t].initialized)window[t].process&&window[t].process();else if(!e.getElementById(n)){var o=e.createElement("script");o.async=1,o.id=n,o.src="https://e.infogram.com/js/dist/embed-loader-min.js",d.parentNode.insertBefore(o,d)}}(document,0,"infogram-async");</script>
					@endif
            	</div>
	            <hr>

	            <div class="form-group">
	                <div class="typo-articles">
	                	<h4 class="pb-2 display-5">Riesgo o Descripción:</h4>
						<p>
							{{$Mapa->riesgo}}
						</p>
						<a href="{{$Mapa->informacion}}" target="_blank">Link de Información</a>
					</div>
	            </div>
	            <hr>
	            <div class="form-group">
	                <h4 class="pb-2 display-5">Medición:</h4>
	                {{$Mapa->medicion}}
	            </div>
        	</div>
      	</div>
 	</div>
</div>

@endsection