@component('mail::message')
# NOTIFICACIÓN ALERTA FORMULARIO SAGRILAFT {{$data['id_task']}}

Estimados usuarios, se ha generado esta notificación porque hay una alerta al formulario SAGRILAFT.

Se requiere de su acción para continuar con la homologación en curso.

Si tiene alguna duda con respecto a su solicitud, Ingrese al siguiente enlace para ver la Solicitud.

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com:2091/genfar-request-risk/'.$data['id']])
Ir a la Solicitud
@endcomponent

Cordialmente,<br>
Equipo RISK
@endcomponent
