@component('mail::message')
# NOTIFICACIÓN ALERTA FORMULARIO ÉTICO {{$data['id_task']}}

Estimados usuarios, se ha generado esta notificación porque NO se activó una alerta al formulario Ético.

Si tiene alguna duda con respecto a su solicitud, Ingrese al siguiente enlace para ver la Solicitud.

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com:2091/genfar-request-risk/'.$data['id']])
Ir a la Solicitud
@endcomponent

Cordialmente,<br>
Equipo RISK
@endcomponent
