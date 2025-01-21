@component('mail::message')
# CORREO DE SEGUIMIENTO TICKETS PENDIENTES 

Estimados(das),

Este es un correo automático de los tickets pendientes. 

En este momento hay: {{$data['amount']}} Tickets Pendientes, Los cuales son:

@component('mail::table')
| ID       | Responsable | Cliente | Fecha de Solicitud |
| ------------- |:-------------:| ------------- |:-------------:|  
@foreach($data['tickets'] as $ticket)
| {{$ticket->id}}|{{$ticket->id_ti}}|{{$ticket->id_cliente}}|{{date('d-m-Y H:i:s', strtotime($ticket->fecha_solicitud))}} | 
@endforeach
@endcomponent

@component('mail::button', ['url' => 'https://ambientetest.datalaft.com/tickets_pending_export'])
Descargar Tickets Pendientes
@endcomponent

Cordialmente,<br>
Equipo {{ config('app.name') }}
@endcomponent
