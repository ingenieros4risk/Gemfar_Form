@component('mail::message')
# Asignación Debida Diligencia DDA-0{{$data['id_diligencia']}}


Buen día estimado(a) {{$data['analista_responsable']}},

Se le ha asignado la siguiente DD:

@component('mail::table')
| Información       | Descripción | 
| ------------- |:-------------:| 
| ID DILIGENCIA 	| DDA-0{{$data['id_diligencia']}} | 
| ASIGNADO A   	| {{$data['analista_responsable']}} | 
| FECHA ASIGNACIÓN| {{date('d-m-Y H:i:s', strtotime($data['fecha_asignacion']))}} | 
| FECHA SOLICITUD   | {{date('d-m-Y H:i:s', strtotime($data['fecha_ingreso']))}}| 
| FECHA ESPERADA DE ENTREGA | {{date('d-m-Y H:i:s',strtotime($data['fecha_supuesta']))}} | 
| HORAS TRANSCURRIDAS | {{$data['horas_transcurridas']}} |
@endcomponent


Para visualizar más información sobre la DD o para poder gestionar dicha solicitud, dele click al siguiente botón:


@component('mail::button', ['url' =>'https://ambientetest.datalaft.com/diligences/'.$data['id_diligencia']])
GESTIONAR DDA
@endcomponent

Si tiene alguna duda con respecto a su solicitud, no dude en escribir al administrador de la herramienta de gestión.

Cordialmente,<br>
{{ config('app.name') }}
@endcomponent