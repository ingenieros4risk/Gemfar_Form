@extends('dashboard.base')
@section('css')

@endsection
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Información del Registro de Proveedor') }}</div>
          <div class="card-body">
            <div style="text-align: right;" class="btn btn-block btn-primary" >Información de la solicitud</div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>ID:</label>
                      <input class="form-control" type="text" value="{{$request_form->id}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha Diligenciamiento:</label>
                      <input class="form-control" type="text" value="{{$request_form->date_fill}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Estado Diligenciamiento:</label>
                      <input class="form-control" type="text" value="{{$request_form->status}}" readonly="true">
                  </div>
              </div>
            </div>                
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nombre Proveedor:</label>
                      <input class="form-control" type="text" value="{{$request_form->name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Documento Identificación:</label>
                      <input class="form-control" type="text" value="{{$request_form->document}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo Proveedor:</label>
                      <input class="form-control" type="text" value="{{$request_form->sanofi_provider_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Paises Solicitantes:</label>
                      <input class="form-control" type="text" value="{{$request_form->multiple_select_country}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Paises Constitución:</label>
                      <input class="form-control" type="text" value="{{$request_form->country_homologation_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>codsolicitud:</label>
                      <input class="form-control" type="text" value="{{$request_form->codsolicitud}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Información General</div>
            <hr>                
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha de Solicitud:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_1}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Departamento/Estado/Provincia:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_3}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Ciudad de la Solicitud:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_4}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Razón Social:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_5}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nombre Completo:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_6}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Número de Identificación:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_8}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>NIT:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_9}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>DV:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_10}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Dirección:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_11}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Teléfono Empresarial:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_12}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Email notificación de pagos:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_14}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Email Envíos de Orden de compra:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_15}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Email envíos certificados de retención:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_16}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Producto o servicio que brinda:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_17}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Representante de ventas:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_18}}" readonly="true">
                  </div>
              </div>
            </div>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Email Representante ventas:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_19}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>País Donde Ejerce Medicina:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_21}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo Documento Representante Legal:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_22}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Información Financiera Local</div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nombre del Banco:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_27}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Ciudad del Banco:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_28}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Dirección del Banco:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_29}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo de Cuenta:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_30}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Número de cuenta:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_31}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Cuenta Interbancaria:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_32}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Codigo IBAN:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_35}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Acuerdos de Pago</div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Plazo de pago 60/90/120 dias:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_46}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo de Moneda:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_47}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Preguntas COPAC</div>
            <hr>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Tiene algún familiar trabajando en Sanofi?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_59}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Sus familiares tiene negocios con Sanofi?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_60}}" readonly="true">
                  </div>
              </div>
            </div>                                                            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Usted sustenta posición decisora en alguna organización pública?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_61}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >INFORMACIÓN FINANCIERA - BANCO INTERMEDIARIO</div>
            <hr>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nombre del Banco intermediario:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_40}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Ciudad del Banco intermediario:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_41}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Dirección de la sucursal:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_42}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Número de cuenta Interbancaria:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_43}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>ABA o Swift:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_44}}" readonly="true">
                  </div>
              </div>
            </div>                                                            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Codigo IBAN:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_45}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Información Representante Legal</div>
            <hr>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nombre de representante legal:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_49}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo de identificación:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_50}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>N° de Identificación:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_51}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha de expedición:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_52}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Nacionalidad del representante legal:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_53}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Teléfono Representante Legal:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_54}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Email representante legal:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_55}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Maneja recursos públicos?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_56}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Tiene algún grado de poder público?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_57}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Goza de reconocimiento público?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_58}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Composición Accionaria</div>
            <hr>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Cuántos accionistas o asociados tienen?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_62}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Su participacion es igual o superior al 5%?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_63}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Adjunte soporte de sus accionistas:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_64}}" readonly="true">
                  </div>
              </div>
            </div>       
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Adjunte soporte de sus accionistas:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_64}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Información Tributaria</div>
            <hr>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Es auto retenedor?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_92}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>N° de resolución:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_93}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha Detraccion:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_94}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Es Gran Contribuyente?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_95}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Cuenta Detracción (Banco de la Nación):</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_96}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha Detratacción 2:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_97}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Tipo de contribuyente:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_98}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>N° de resolución:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_99}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha Detratacción 2:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_97}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Actividad económica:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_100}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Fecha Información tributaria:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_101}}" readonly="true">
                  </div>
              </div>
            </div>          
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Código CIIU:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_102}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Certificaciones</div>
            <hr>            
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Tiene certificación OEA?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_103}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Cuenta con algun certificado LAFT?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_104}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>¿Cual certificado LAFT?:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_105}}" readonly="true">
                  </div>
              </div>
            </div>
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Conflicto de Interes</div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Pregunta 1: Funcionario público:</label>
                  <input class="form-control" type="text" value="{{$request_form->is_pep_checks}}" readonly="true">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label>Pregunta 2: Poder de decisión:</label>
                    <input class="form-control" type="text" value="{{$request_form->is_decision_check}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label>Requiere Due Diligence:</label>
                    <input class="form-control" type="text" value="{{$request_form->require_dda}}" readonly="true">
                  </div>
              </div>
            </div>            
            <hr>
            <div style="text-align: right;" class="btn btn-block btn-primary" >Categorización</div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Grado Académico:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_1_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Experiencia como investigador de estudios clinicos:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_2_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Es miembro de uno o varios grupos de investigación:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_3_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Cargo en una institución médico académica:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_4_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Miembro o ex-miembro de Junta  directiva de una Sociedad Médica o de otros Profesionales de la Salud:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_5_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Publicaciones de articulos científicos en los ultimos 10 años:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_6_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Presentación de posters:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_7_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Autor o Coautor en Libros de medicina u otro rubro de profesionales de la salud:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_8_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Ha sido  o es Conferencista (en los ultimos 5 años):</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_9_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Ha obtenido premios:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_10_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Experiencia Clínica ó equivalente: Más de 10 años de experiencia como profesional de la salud:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_11_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Miembro de Ad. Board de área terapéutica de Sanofi en los últimos 3 años:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_12_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Influencia:</label>
                      <input class="form-control" type="text" value="{{$request_form->quest_hcp_13_name}}" readonly="true">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Score Categorización:</label>
                      <input class="form-control" type="text" value="{{$request_form->score}}" readonly="true">
                  </div>
              </div>
            </div>            
          </div>
        </div>
        <a href="{{ route('genfar.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a> 
    </div>
    
    
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> {{ __('Documentos y Consentimientos') }}
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label>Consentimientos:</label>
                  <div class="col-sm-6">
                    <a href="{{ route('genfar.consentimiento',$request_form->id)}}" target="_blank">Descargar Consentimientos</a>
                  </div>
                </div>
            </div>
          </div>
          @if($request_form->sanofi_provider == 2)
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label>Curriculum Vitae:</label>
                  <div class="col-sm-6">
                    <a href="{{ route('sanofi.curriculum_vitae',$request_form->id)}}" target="_blank">Curriculum Vitae</a>
                  </div>
                </div>
            </div>
          </div>
          @endif
          <hr>
          <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ __('Documentos Administrador') }}
          </div>
          @role('admin')

            @isset($request_form->curriculum_vitae)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Curriculum Vitae:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.curriculum_vitae',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset

            @isset($request_form->certificado_existencia)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado de Existencia:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_existencia',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset

            @isset($request_form->rut)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>RUT:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.rut',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
                        
            @isset($request_form->cedula_rep)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Cedula Representante:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.cedula_rep',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
            
            @isset($request_form->licencia_medica)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Licencia Médica:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.licencia_medica',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
            
            @isset($request_form->certificado_bancaria)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado Bancario:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_bancaria',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
            
            @isset($request_form->certificado_oea)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado OEA:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_oea',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
                        
            @isset($request_form->certificado_laft)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado LAFT:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_laft',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
            
            @isset($request_form->certificado_iso)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado ISO:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_iso',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
                        
            @isset($request_form->certificado_politicas)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado/Políticas:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_politicas',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
            
            @isset($request_form->certificado_financiero)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado Financiero:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_financiero',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
            
            @isset($request_form->certificado_comercial)
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Certificado Comercial:</label>
                      <div class="col-sm-6">
                        <a href="{{ route('sanofi.certificado_comercial',$request_form->id)}}" target="_blank">Descargar</a>
                      </div>
                    </div>
                </div>
              </div>
            @endisset
          @endrole
        </div>
      </div>

      @if($request_form->sanofi_provider == 2)

      @role('medical')
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> {{ __('Categorizacion Medical') }}
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('sanofi.categorizacion') }}" id="form-categorizacion" enctype="multipart/form-data" required>
                  {{csrf_field()}}
                <input type="hidden" name="id" value="{{ $request_form->id }}">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Grado Académico:</label>
                      <select name="academic_degrees" id="academic_degrees" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($academic_degrees as $academic_degree)
                            @if($request_form->quest_hcp_1 == $academic_degree->id)
                              <option selected="true"value="{{ $academic_degree->id }}">{{ $academic_degree->name }}</option>
                            @else
                              <option value="{{ $academic_degree->id }}">{{ $academic_degree->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Experiencia como investigador de estudios clinicos:</label>
                      <select name="member_investigators" id="member_investigators" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($member_investigators as $member_investigator)
                            @if($request_form->quest_hcp_2 == $member_investigator->id)
                              <option selected="true"value="{{ $member_investigator->id }}">{{ $member_investigator->name }}</option>
                            @else
                              <option value="{{ $member_investigator->id }}">{{ $member_investigator->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Es miembro de uno o varios grupos de investigación:</label>
                      <select name="quest_hcp_3" id="quest_hcp_3" class="form-control input-lg" required>
                        <option value="">Seleccione una respuesta</option>
                        @if($request_form->quest_hcp_3 == 1)
                          <option selected="true" value="1">Si</option>
                          <option value="0">No</option>
                        @else
                          <option value="1">Si</option>
                          <option selected="true" value="0">No</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Cargo en una institución médico académica:</label>
                      <select name="academic_positions" id="academic_positions" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($academic_positions as $academic_positions)
                            @if($request_form->quest_hcp_4 == $academic_positions->id)
                              <option selected="true"value="{{ $academic_positions->id }}">{{ $academic_positions->name }}</option>
                            @else
                              <option value="{{ $academic_positions->id }}">{{ $academic_positions->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Miembro o ex-miembro de Junta directiva de una Sociedad Médica o de otros Profesionales de la Salud:</label>
                      <select name="member_societies" id="member_societies" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($member_societies as $member_societiy)
                            @if($request_form->quest_hcp_5 == $member_societiy->id)
                              <option selected="true" value="{{ $member_societiy->id }}">{{ $member_societiy->name }}</option>
                            @else
                              <option value="{{ $member_societiy->id }}">{{ $member_societiy->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Publicaciones de articulos científicos en los ultimos 10 años:</label>
                      <select name="publications" id="publications" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($publications as $publication)
                            @if($request_form->quest_hcp_6 == $publication->id)
                              <option selected="true" value="{{ $publication->id }}">{{ $publication->name }}</option>
                            @else
                              <option value="{{ $publication->id }}">{{ $publication->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Presentación de posters:</label>
                      <select name="posters" id="posters" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($posters as $poster)
                            @if($request_form->quest_hcp_7 == $poster->id)
                              <option selected="true" value="{{ $poster->id }}">{{ $poster->name }}</option>
                            @else
                              <option value="{{ $poster->id }}">{{ $poster->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Autor o Coautor en Libros de medicina u otro rubro de profesionales de la salud:</label>
                      <select name="books" id="books" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($books as $book)
                            @if($request_form->quest_hcp_8 == $book->id)
                              <option selected="true" value="{{ $book->id }}">{{ $book->name }}</option>
                            @else
                              <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Ha sido o es Conferencista (en los ultimos 5 años):</label>
                      <select name="conferences" id="conferences" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($conferences as $conference)
                            @if($request_form->quest_hcp_9 == $conference->id)
                              <option selected="true" value="{{ $conference->id }}">{{ $conference->name }}</option>
                            @else
                              <option value="{{ $conference->id }}">{{ $conference->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Ha obtenido premios:</label>
                      <select name="adwars" id="adwars" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($adwars as $adwar)
                            @if($request_form->quest_hcp_10 == $adwar->id)
                              <option selected="true" value="{{ $adwar->id }}">{{ $adwar->name }}</option>
                            @else
                              <option value="{{ $adwar->id }}">{{ $adwar->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Capacidad de Influir y/o credibilidad sobre colegas:</label>
                      <select name="influences" id="influences" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                          @foreach($influences as $influence)
                            @if($request_form->quest_hcp_13 == $influence->id)
                              <option selected="true" value="{{ $influence->id }}">{{ $influence->name }}</option>
                            @else
                              <option value="{{ $influence->id }}">{{ $influence->name }}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Experiencia Clínica ó equivalente: Más de 10 años de experiencia como profesional de la salud:</label>
                      <select name="quest_hcp_11" id="quest_hcp_11" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                        @if($request_form->quest_hcp_11 == 1)
                          <option selected="true" value="1">Si</option>
                          <option value="0">No</option>
                        @else
                          <option value="1">Si</option>
                          <option selected="true" value="0">No</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Miembro de Ad. Board de área terapéutica de Sanofi en los últimos 3 años:</label>
                      <select name="quest_hcp_12" id="quest_hcp_12" class="form-control input-lg" required>
                          <option value="">Seleccione una respuesta</option>
                        @if($request_form->quest_hcp_12 == 1)
                          <option selected="true" value="1">Si</option>
                          <option value="0">No</option>
                        @else
                          <option value="1">Si</option>
                          <option selected="true" value="0">No</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>                                                                 
                <div class="row">
                  <div class="col-sm-12">
                      <button class="btn btn-block btn-warning" form="form-categorizacion" type="submit">
                          <svg class="c-icon mr-2">
                            <use xlink:href="/icons/sprites/free.svg#cil-media-stop"></use>
                          </svg><span>{{ __('Cambiar Categorización') }}</span>
                      </button>
                  </div>
                </div>                 
              </form>    
            </div>
          </div>
        </div>          
        @endrole
        @endif
    </div>
  </div>
</div>
        

@endsection


@section('javascript')

@endsection