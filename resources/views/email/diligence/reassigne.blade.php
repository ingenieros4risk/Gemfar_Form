@component('mail::message')
# Re-Asignación Debida Diligencia DDA-0{{$data['id_diligencia']}}

Buen día estimado(a) {{$data['analista_nuevo']}},

Se le ha reasignado la siguiente DD, para que por favor la gestione con prontitud. La información registrada de la solicitud es presentada a continuación:


@component('mail::table')
| Información       | Descripción | 
| ------------- |:-------------:| 
| ID DILIGENCIA 	| DDA-0{{$data['id_diligencia']}} | 
| ASIGNADO INICIALMENTE A   	| {{$data['analista_anterior']}} | 
| REASIGNADO A   	| {{$data['analista_nuevo']}} | 
| FECHA ASIGNACIÓN| {{date('d-m-Y H:i:s', strtotime($data['fecha_asignacion']))}} | 
| FECHA SOLICITUD   | {{date('d-m-Y H:i:s', strtotime($data['fecha_ingreso']))}}| 
| FECHA ESPERADA DE ENTREGA | {{date('d-m-Y H:i:s',strtotime($data['fecha_supuesta']))}} | 
| FECHA REASIGNACIÓN | {{date('d-m-Y H:i:s',strtotime($data['fecha_reasignacion']))}} | 
| HORAS TRANSCURRIDAS | {{$data['horas_transcurridas']}} |
@endcomponent


Para gestionar dicha DDA, ingrese al siguiente Link:


@component('mail::button', ['url' =>'https://ambientetest.datalaft.com/diligences/'.$data['id_diligencia']])
GESTIONAR DDA
@endcomponent


Coordialmnete,<br>
{{ config('app.name') }}
@endcomponent