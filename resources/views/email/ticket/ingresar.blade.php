@component('mail::message')
# SOLICITUD TICKET TCK-0{{$data['id_requerimiento']}}

Buen Día,

Se ha generado un nuevo Ticket por **{{$data['tipo']}}** para el cliente **{{$data['cliente']}}**, el día {{date('d-m-Y', strtotime($data['fecha_solicitud']))}} a las {{$data['tiempo']}} indicando lo siguiente:<br>

{{$data['detalle']}}<br>

Este ticket fue solicitado por {{$data['analista']}}. Para gestionarlo puede ingresar al siguiente link:

@component('mail::button', ['url' => 'https://ambientetest.datalaft.com/tickets/'.$data['id_requerimiento'].'/edit'])
Gestionar
@endcomponent

Si tiene alguna duda con respecto a su solicitud, no dude en escribir al administrador de la herramienta de gestión, Mil gracias.

Cordialmente,<br>
{{$data['analista']}}<br>
@endcomponent
