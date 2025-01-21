@component('mail::message')
# Seguimiento Debida Diligencia {{$data['id']}}

Estimado(a) {{$data['name_solicitante']}},

Este es un correo de seguimiento a una solicitud de DD. por favor tener en cuenta el siguiente motivo de seguimiento: 

{{$data['seguimiento']}}<br>

Este es un correo automático, por lo anterior dar respuesta al cliente. Para revisar el caso ir al siguiente enlace:

@component('mail::button', ['url' =>'https://ambientetest.datalaft.com/diligences/'.$data['id']])
Ir a DDA
@endcomponent

Cordialmente,<br>
{{$data['responsable']}}<br>
@endcomponent
