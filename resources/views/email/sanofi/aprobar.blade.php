@component('mail::message')
# Suppliers creation or Modification {{$data['id_task']}}

Estimado(a) {{$data['name_solicitante']}}, se ha gestionado la tarea con el siguiente estado: {{$data['resumen']}} 

Se genera el siguiente comentario:

{{$data['comments']}}<br>

Si tiene alguna duda con respecto a su solicitud, Ingrese al siguiente enlace para ver la tarea.

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com:2091/genfar-supliers/'.$data['id']])
GESTIONAR TAREA
@endcomponent

Cordialmente,<br>

@endcomponent
