@component('mail::message')
# CORREO DE SEGUIMIENTO SOLICITUDES POR APROBAR 

Estimados(das),

Este es un correo automático de las Solicitud de E-Proveedores pendientes por Aprobar. 

En este momento hay: {{$data['amount']}} Solicitudes Pendientes, Los cuales son:

@component('mail::table')
| ID       | Nombre Proveedor | Fecha de Solicitud |
| ------------- |:-------------:| ------------- |  
@foreach($data['tickets'] as $ticket)
| {{$ticket->id}}|{{$ticket->provider_name}}|{{date('d-m-Y H:i:s', strtotime($ticket->date_request))}} | 
@endforeach
@endcomponent

@component('mail::button', ['url' => 'https://ambientetest.datalaft.com:2091/genfar-supliers'])
Ir a Solicitudes Pendientes
@endcomponent

Cordialmente,<br>
Equipo {{ config('app.name') }}
@endcomponent
