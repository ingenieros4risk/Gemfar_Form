@component('mail::message')
# Supliers creation or Modification {{$data['id_task']}}

Estimada Catherine Ramirez, se ha creado la tarea: {{$data['action']}} Para el proveedor:  {{$data['provider']}} con el siguiente comentario:

{{$data['comments']}}<br>

Si tiene alguna duda con respecto a su solicitud, Ingrese al siguiente enlace para gestionar la tarea.

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com:2091/genfar-supliers/'.$data['id']])
GESTIONAR TAREA
@endcomponent

Cordialmente,<br>
{{$data['name_solicitante']}}<br>
@endcomponent
