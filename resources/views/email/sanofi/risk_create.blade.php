@component('mail::message')
# Solicitud Registro Provedor {{$data['id_request']}}

Estimado(a) {{$data['name_solicitante']}},


Su Solicitud de Registro de nuevo Provedor ha sido ingresada a nuestra plataforma para que uno de nuestros analistas la gestione satisfactoriamente. La información que se evaluará es la siguiente:


@component('mail::table')
| Información       | Descripción | 
| ------------- |:-------------:| 
| ID Solicitud     | {{$data['id_request']}}      | 
| Nombre Solicitante     | {{$data['name_solicitante']}}      | 
| Sociedad Solicitante       | {{$data['sociedad']}} | 
| Países | {{$data['paises']}} | 
| Nombre del Proveedor          | {{$data['provider_name']}} | 
| Correo del Proveedor  | {{$data['provider_email']}} | 
| Teléfono del Proveedor | {{$data['provider_phone']}} | 
| Fecha Solicitud | {{date('d-m-Y H:i:s', strtotime($data['date_solicitud']))}} (GMT-5)| 
@endcomponent


Si tiene alguna duda con respecto a su solicitud, no dude en escribirnos al chat de Inspektor.

@component('mail::button', ['url' => 'http://ambientetest.datalaft.com/genfar-request-risk/'])
Ir a Solicitudes
@endcomponent

Cordialmente,<br>
Equipo {{ config('app.name') }}
@endcomponent