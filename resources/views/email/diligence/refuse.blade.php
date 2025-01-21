@component('mail::message')
# Respuesta Debida Diligencia {{$data['id_diligencia']}} Rechazada

Estimado(a) {{$data['name_solicitante']}},

{{$data['rechazo']}}<br>

Esperamos la información sea de utilidad, estaremos atentos a resolver cualquier inquietud y/o novedad con mucho gusto.

Si tiene alguna duda con respecto a su solicitud, no dude en escribirnos al chat de Inspektor.

@component('mail::button', ['url' => 'https://inspektor.datalaft.com/'])
Ir a Inspektor
@endcomponent

Cordialmente,<br>
{{$data['responsable']}}<br>
@endcomponent
