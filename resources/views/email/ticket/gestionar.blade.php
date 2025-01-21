@component('mail::message')
# SOLICITUD TICKET TCK-0{{$data['id_requerimiento']}}

Buen Día {{$data['name_analista']}},

Se ha gestionado el ticket. El estado actual de la solicitud es **{{$data['estado']}}**. Se genera la siguiente Respuesta/Observación/Rechazo de la solicitud con un adjunto si lo requiera, dice:<br>

{{$data['solucion']}}<br>

Para gestionarlo puede ingresar al siguiente link:

@component('mail::button', ['url' => 'https://ambientetest.datalaft.com/tickets/'.$data['id_requerimiento'].'/edit'])
Gestionar
@endcomponent


Cordialmente,<br>
{{$data['name_solicitante']}}<br>
@endcomponent