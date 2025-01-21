@component('mail::message')
# Solicitud Debida Diligencia {{$data['id_request']}}

Estimado(a) {{$data['name_solicitante']}},


Su Solicitud de Debida Diligencia ha sido ingresada a nuestra plataforma para que uno de nuestros analistas la gestione satisfactoriamente. La información que se evaluará es la siguiente:


@component('mail::table')
| Información       | Descripción | 
| ------------- |:-------------:| 
| ID DILIGENCIA 	| {{$data['id_request']}}      | 
| TIPO DE DD   	| {{$data['dda_tipo']}} | 
| NÚMERO DE TERCEROS| {{$data['num_terceros']}} | 
| REQUIERE INFORME  | {{$data['informe']}} | 
| REQUIERE CONCEPTO JURÍDICO | {{$data['concepto']}} | 
| FECHA SOLICITUD   | {{date('d-m-Y H:i:s', strtotime($data['fecha_ingreso']))}} | 
| FECHA ESPERADA DE ENTREGA | {{date('d-m-Y H:i:s', strtotime($data['fecha_supuesta']))}} | 
@endcomponent


Si tiene alguna duda con respecto a su solicitud, no dude en escribirnos al chat de Inspektor.


@component('mail::button', ['url' => 'https://inspektor.datalaft.com/Formularios/Administrador/Sitio/Home.aspx'])
Ir a Inspektor
@endcomponent

Cordialmente,<br>
Equipo {{ config('app.name') }}
@endcomponent
