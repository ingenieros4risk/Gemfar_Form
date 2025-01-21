@component('mail::message')
# Suppliers creation or Modification {{$data['id_task']}}

Estimado(a) {{$data['name_solicitante']}}, se ha confirmado la tarea con el siguiente estado: 

"{{$data['resumen']}}"

Se genera el siguiente comentario:<br>

{{$data['comments']}}<br>

@component('mail::table')
| Información       | Descripción | 
| ------------- |:-------------:| 
| Nombre del Proveedor   	| {{$data['provider_name']}} | 
| Supplier Code Colombia 	| {{$data['supplier_code_co']}}      | 
| Supplier Code Perú 	| {{$data['supplier_code_pe']}}      | 
| Supplier Code Ecuador 	| {{$data['supplier_code_ec']}}      | 
@endcomponent



Si tiene alguna duda con respecto a su solicitud, Ingrese al siguiente enlace para ver la tarea.

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com:2091/genfar-supliers/'.$data['id']])
GESTIONAR TAREA
@endcomponent

Cordialmente,<br>

@endcomponent
