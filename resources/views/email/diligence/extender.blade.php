@component('mail::message')
# CAMBIO DE FECHA DEBIDA DILIGENCIA {{$data['id_diligencia']}}

Estimado(a) {{$data['name_solicitante']}},

Por el siguiente motivo, {{$data['motivo']}}<br>
La fecha supuesta de entrega será: {{date('d-m-Y H:i:s', strtotime($data['date_extender']))}}


Esperamos la información sea de utilidad, estaremos atentos a resolver cualquier inquietud y/o novedad con mucho gusto.

Si tiene alguna duda con respecto a su solicitud, no dude en escribirnos al chat de Inspektor.

@component('mail::button', ['url' => 'https://inspektor.datalaft.com/'])
Ir a Inspektor
@endcomponent

Cordialmente,<br>
{{$data['responsable']}}<br>
@endcomponent
