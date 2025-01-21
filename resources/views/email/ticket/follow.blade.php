@component('mail::message')
# Seguimiento TICKET {{$data['id']}}

Estimado(a) {{$data['name_solicitante']}},

Este es un correo de seguimiento a una solicitud  un Ticket ya finalizado o Rechazado. por favor tener en cuenta el siguiente motivo de seguimiento: 

{{$data['seguimiento']}}<br>

Este es un correo automático, por lo anterior dar respuesta al cliente. Para revisar el caso ir al siguiente enlace:

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com/tickets/'.$data['id']])
Ir a Ticket
@endcomponent

Cordialmente,<br>
{{$data['responsable']}}<br>
@endcomponent
