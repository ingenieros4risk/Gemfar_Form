@component('mail::message')
# NOTIFICACIÓN DE RECOMENDACIÓN FORMULARIO ÉTICO/CSY/HYS/CSR {{$data['id_task']}}

Estimados usuarios, se ha generado los siguientes comentarios y planes para mitigar la alerta del formulario.

{{$data['comment']}}<br>

Se genera la siguiente Recomendación: 

{{$data['advices']}}<br>

Si tiene alguna duda con respecto a su solicitud, Ingrese al siguiente enlace para ver la Solicitud.

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com:2091/genfar-request-risk/'.$data['id']])
Ir a la Solicitud
@endcomponent

Cordialmente,<br>
Equipo RISK
@endcomponent
