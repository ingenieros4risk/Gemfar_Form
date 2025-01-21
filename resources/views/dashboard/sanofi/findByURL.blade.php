@extends('dashboard.base')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link href="{{ asset('css/flag.min.css') }}" rel="stylesheet">
@endsection

@section('content')

  <style>

    .uper {

      margin-top: 40px;

    }

  </style>

  <div class="uper">

    @if(session()->get('success'))

      <div class="alert alert-success">

        {{ session()->get('success') }}  

      </div><br />

    @endif
	
	<div class="row m-t-30">
		<div class="col-md-12">
			<!-- DATA TABLE-->
            
			<h2>Buscador de Solicitudes por Nombre o Documento de Identidad</h2>
            
			<hr>
			<div class="table-data__tool">
				>
				<div class="col col-md-12">
					<div class="input-group">
						<h4>Ingrese el Nombre o Documento de Identidad a buscar:</h4>
					</div>
					<div class="input-group">
						<h6>(Se mostraran los primeros 100 resultados)</h6>
					</div>
				</div>
			
			
				<div class="col col-md-12">
					<div class="input-group">
						<input type="text" id="search_by_link" name="search_by_link" placeholder=" Buscar por nombre o Documento" class="form-control">
					</div>
				</div>
				
			</div>
			
			<div class="table-responsive m-b-40">
				<table class="table table-borderless table-data3">
					<thead>
						<tr>
							<td>ID</td>
							<td>Nombre</td>
							<td>NIT</td>
							<td>Fuente</td>
							<td>IR</td>
						</tr>
					</thead>
				
					<tbody>
					
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
 </div>

@endsection 
@section('javascript')
    <script type="text/javascript">
    $('#search_by_link').on('keyup',function(){
        $value=$(this).val();
        if ($.trim($value).length != 0) {
            $.ajax({
                type : 'get',
                url : '{{URL::to('genfar-search-url')}}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        }else{
            $('tbody').empty();
        }
    })
    </script>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection