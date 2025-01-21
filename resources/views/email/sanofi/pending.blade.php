@component('mail::message')
# CORREO DE SEGUIMIENTO SOLICITUDES CON ALERTAS {{$data['type']}}

Estimados(das),

Este es un correo automático de las Solicitudes que presentan Alertas en los formularios de {{$data['type']}} pendientes por generar un plan de mitigación a la alerta o un comentario. 


En este momento hay: {{$data['amount']}} Solicitudes Pendientes, Los cuales son:

@component('mail::table')
| ID       | Nombre Proveedor | Fecha de Solicitud |
| ------------- |:-------------:| ------------- |  
@foreach($data['tickets'] as $ticket)
| {{$ticket->id}}|{{$ticket->provider_name}}|{{date('d-m-Y H:i:s', strtotime($ticket->date_solicitud))}} | 
@endforeach
@endcomponent

Recuerde que este es un correo de notificación automática, por favor no responda a este correo.

@component('mail::button', ['url' => 'https://ambientetest.datalaft.com:2091/genfar-supliers'])
Ir a Solicitudes Pendientes
@endcomponent

Cordialmente,<br>
Equipo {{ config('app.name') }}
@endcomponent

