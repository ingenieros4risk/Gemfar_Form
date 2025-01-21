@component('mail::message')
# REPORTE DE CALIDAD #-0{{$data['id_report']}}


Buen día estimado(a) {{$data['analista_responsable']}},

Se ha reportado un error con la siguiente descripción:

@component('mail::table')
| Información       | Descripción | 
| ------------- |:-------------:| 
| ID REPORTE 	| #-0{{$data['id_report']}} | 
| ID INSPEKTOR   	| {{$data['inspektor_ids']}} | 
| CAMPOS   	| {{$data['campos']}} | 
| OBSERVACIÓN   	| {{$data['description']}} | 
| FECHA REPORTE| {{date('d-m-Y H:i:s', strtotime($data['fecha_reporte']))}} | 
@endcomponent


Para gestionar el reporte, de click al siguiente botón:


@component('mail::button', ['url' =>'https://ambientetest.datalaft.com/errors/reports/'.$data['id_report'].'/edit'])
GESTIONAR REPORTE
@endcomponent

Si tiene alguna duda con respecto a su solicitud, no dude en escribir a quien reporto el error.

Cordialmente,<br>
{{$data['analista_reporta']}}<br>
{{ config('app.name') }}
@endcomponent