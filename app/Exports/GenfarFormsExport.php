<?php

namespace App\Exports;

use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiRequestStatus;
use App\Models\Sanofi\SanofiProvider;
use App\Models\Sanofi\RequestRiskStatus;
use App\Models\Sanofi\SanofiRequestType;
use App\Models\Sanofi\SanofiHacat;
use App\Models\Sanofi\SanofiRequestForm;
use App\Models\Sanofi\SanofiAcademicDegree;
use App\Models\Sanofi\SanofiAcademicPosition;
use App\Models\Sanofi\SanofiHasAward;
use App\Models\Sanofi\SanofiHasBook;
use App\Models\Sanofi\SanofiHasConference;
use App\Models\Sanofi\SanofiHasPoster;
use App\Models\Sanofi\SanofiHasPublication;
use App\Models\Sanofi\SanofiHomologationType;
use App\Models\Sanofi\SanofiMedicalSpeciality;
use App\Models\Sanofi\SanofiMemberInvestigator;
use App\Models\Sanofi\SanofiMemberSociety;
use App\Models\Sanofi\SanofiInfluence;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Inspektor\CurrentType;
use App\Models\User;
use App\Models\Country;
use App\Mail\SanofiRiskCreate;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class GenfarFormsExport implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $forms = SanofiRequestForm::select('id','sanofi_request_risk_id','ethics','hys','csr','env','csy','dda','name','document','sanofi_provider','multiple_select_country',
        'country_homologation','certificado_existencia','certificado_bancaria','rut','cedula_rep','licencia_medica','curriculum_vitae','quest_3','quest_4','quest_5','quest_9',
        'quest_10','quest_11','quest_12','quest_13','quest_14','quest_15','quest_16','quest_17','quest_18','quest_19','quest_21','quest_22','quest_24','quest_27','quest_28',
        'quest_29','quest_30','quest_31','quest_32','quest_35','quest_36','quest_38','quest_39','quest_46','quest_47','quest_59','quest_60','quest_61','quest_40','quest_41',
        'quest_42','quest_43','quest_44','quest_45','quest_49','quest_50','quest_51','quest_52','quest_53','quest_54','quest_55','quest_56','quest_57','quest_58','quest_62',
        'quest_63','quest_75','quest_76','quest_77','quest_92','quest_93','quest_94','quest_95','quest_96','quest_97','quest_98','quest_99','quest_100','quest_101','quest_102',
        'quest_103','quest_104','quest_71','quest_71f','quest_25','quest_26','quest_33','quest_34','quest_70','quest_37','quest_73','quest_73_add','quest_74','quest_48','quest_48f',
        'quest_72','quest_72F','quest_64','quest_64f','quest_65','quest_65f','quest_66','quest_67','quest_68','quest_68f','quest_69','alert_dda','csr_1','csr_2','csr_3','empaque',
        'csr_4','csr_5','csr_6','confidencial','csr_7','csr_8','env_1','env_2','env_3','env_4','env_5','env_6','env_7','env_8','hys_1','hys_2','hys_3','hys_4','hys_5','hys_6','hys_7',
        'hys_8','csy_1','ebi_comentario','ebi_plan','ebi_recomendacion','sarlaft_comentario','hys_comentario','csr_comentario','env_comentario','csy_comentario','ethics_date',
        'sarlaft_date','hys_date','csr_date','env_date','csy_date')->get();

        foreach ($forms as $key => $request_form) {            

            $provider = SanofiProvider::find($request_form->sanofi_provider);
            $request_form->sanofi_provider = $provider->name;

            /*Multiples países*/
            $paises = json_decode($request_form->multiple_select_country);
            if(is_null($paises)){
                $paises = explode(",", $request_form->multiple_select_country);
            }

            if(is_array($paises)){
                foreach ($paises as $key => $pais) {
                    $country = SanofiHomologationCountry::find($pais);
                    if ($country) {
                        $paises[$key] = $country->country;
                    }else {
                        $paises[$key] = "OTRO";
                    }
                }
                $request_form->multiple_select_country = implode(", ", $paises);    
            }else{
                $country = SanofiHomologationCountry::find($paises);
                $request_form->multiple_select_country = $country->country;
            }
        

            // /*País Solicitante*/
            // $country_homologation = Country::find($request_form->country_homologation);
            // $country_homologation ? $request_form->country_homologation_name = $country_homologation->name : $request_form->country_homologation_name = "Sin Información";

            // /*País Donde Ejerce Medicina*/
            // $country_medical = Country::find($request_form->quest_21);
            // $country_medical ? $request_form->quest_21 = $country_medical->name : $request_form->quest_21 = "Sin Información";

            // /*Documento representante Legal*/
            // $document_representante = InspektorDocumentType::find($request_form->quest_22);
            // $document_representante ? $request_form->quest_22 = $document_representante->name : $request_form->quest_22 = "Sin Información";       


            /*Tipo de cuenta*/
            if($request_form->quest_30 == 1)
                $request_form->quest_30 = "Corriente";
            elseif ($request_form->quest_30 == 2) {
                $request_form->quest_30 = "Ahorros";
            }elseif ($request_form->quest_30 == 3) {
                $request_form->quest_30 = "IBAN";
            }else{
                $request_form->quest_30 = "No Indica";
            }

            /*Tipo de Moneda*/
            $type_currency = CurrentType::find($request_form->quest_47);
            $type_currency ? $request_form->quest_47 = $type_currency->name." - ".$type_currency->iso." (".$type_currency->symbol.")" : $request_form->quest_47 = "Sin Información";

            /*Tipo de Identificación*/
            $document_type = InspektorDocumentType::find($request_form->quest_50);
            $document_type ? $request_form->quest_50 = $document_type->name : $request_form->quest_50 = "Sin Información";

            /*Preguntas HCP */

            // $academic_degree = SanofiAcademicDegree::find($request_form->quest_hcp_1);
            // $academic_degree ? $request_form->quest_hcp_1_name = $academic_degree->name." Score: ".$academic_degree->score : $request_form->quest_hcp_1_name = "Sin Información";

            // $member_investigator = SanofiMemberInvestigator::find($request_form->quest_hcp_2);
            // $member_investigator ? $request_form->quest_hcp_2_name = $member_investigator->name." Score: ".$member_investigator->score : $request_form->quest_hcp_2_name = "Sin Información";


            $request_form->ethics = $request_form->ethics > 0 ? "SI":"NO";
            $request_form->hys = $request_form->hys > 0 ? "SI":"NO";
            $request_form->csr = $request_form->csr > 0 ? "SI":"NO";
            $request_form->env = $request_form->env > 0 ? "SI":"NO";
            $request_form->csy = $request_form->csy > 0 ? "SI":"NO";
            $request_form->dda = $request_form->dda > 0 ? "SI":"NO";

            $request_form->quest_24 = $request_form->quest_24 > 0 ? "SI":"NO";
            $request_form->quest_56 = $request_form->quest_56 > 0 ? "SI":"NO";
            $request_form->quest_57 = $request_form->quest_57 > 0 ? "SI":"NO";
            $request_form->quest_58 = $request_form->quest_58 > 0 ? "SI":"NO";
            $request_form->quest_103 = $request_form->quest_103 > 0 ? "SI":"NO";
            $request_form->quest_104 = $request_form->quest_104 > 0 ? "SI":"NO";
            $request_form->quest_26 = $request_form->quest_26 > 0 ? "SI":"NO";
            $request_form->quest_34 = $request_form->quest_34 > 0 ? "SI":"NO";
            $request_form->quest_73 = $request_form->quest_73 > 0 ? "SI":"NO";
            $request_form->quest_74 = $request_form->quest_74 > 0 ? "SI":"NO";
            $request_form->quest_48 = $request_form->quest_48 > 0 ? "SI":"NO";
            $request_form->quest_72 = $request_form->quest_72 > 0 ? "SI":"NO";
            $request_form->quest_64 = $request_form->quest_64 > 0 ? "SI":"NO";
            $request_form->quest_65 = $request_form->quest_65 > 0 ? "SI":"NO";
            $request_form->quest_66 = $request_form->quest_66 > 0 ? "SI":"NO";
            $request_form->quest_67 = $request_form->quest_67 > 0 ? "SI":"NO";
            $request_form->quest_68 = $request_form->quest_68 > 0 ? "SI":"NO";
            $request_form->quest_69 = $request_form->quest_69 > 0 ? "SI":"NO";


            //Traer fechas de la solicitud
            $solicitud = SanofiRequestRisk::where('id', $request_form->sanofi_request_risk_id)->first();
            $request_form->date_solicitud = $solicitud->date_solicitud ? Carbon::parse($solicitud->date_solicitud)->format('d-m-Y'):null;
            $request_form->date_finalizacion = $solicitud->date_finalizacion ? Carbon::parse($solicitud->date_finalizacion)->format('d-m-Y'):null;

            //dd(date_diff($request_form->ethics_date, $solicitud->date_finalizacion)->format('%a'));

            if($solicitud->date_finalizacion != null && $solicitud->date_solicitud != null ){
                $request_form->time_ethics = $request_form->ethics_date ? date_diff(Carbon::parse($request_form->ethics_date), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
                $request_form->time_sarlaft = $request_form->sarlaft_date ? date_diff(Carbon::parse($request_form->sarlaft_date), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
                $request_form->time_hys = $request_form->hys_date ? date_diff(Carbon::parse($request_form->hys_date), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
                $request_form->time_csr = $request_form->csr_date ? date_diff(Carbon::parse($request_form->csr_date), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
                $request_form->time_env = $request_form->env_date ? date_diff(Carbon::parse($request_form->env_date), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
                $request_form->time_csy = $request_form->csy_date ? date_diff(Carbon::parse($request_form->csy_date), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
                $request_form->time_risk = $solicitud->date_solicitud ? date_diff(Carbon::parse($solicitud->date_solicitud), Carbon::parse($solicitud->date_finalizacion))->format('%a'):0;
            }


            $request_form->ethics_date = $request_form->ethics_date ? Carbon::parse($request_form->ethics_date)->format('d-m-Y'):null;
            $request_form->sarlaft_date = $request_form->sarlaft_date ? Carbon::parse($request_form->sarlaft_date)->format('d-m-Y'):null;
            $request_form->hys_date = $request_form->hys_date ? Carbon::parse($request_form->hys_date)->format('d-m-Y'):null;
            $request_form->csr_date = $request_form->csr_date ? Carbon::parse($request_form->csr_date)->format('d-m-Y'):null;
            $request_form->env_date = $request_form->env_date ? Carbon::parse($request_form->env_date)->format('d-m-Y'):null;
            $request_form->csy_date = $request_form->csy_date ? Carbon::parse($request_form->csy_date)->format('d-m-Y'):null;



            // 'Tiempo de respuesta Ética',
            // 'Tiempo de respuesta Sarlaft',
            // 'Tiempo de respuesta HYS',
            // 'Tiempo de respuesta CSR',
            // 'Tiempo de respuesta ENV',
            // 'Tiempo de respuesta CSY',
            // 'Tiempo de respuesta Risk'
        }


        return $forms;
    }

    public function headings(): array {
		return [
			'ID Solicitud',
            'ID Formulario',
            'Cuestionario Ético',
            'Cuestionario Health, Safety',
            'Cuestionario Corporate Social Responsibility',
            'Cuestionario Environment',
            'Cuestionario Cuestionario Cybersecurity',
            'Requiere DDA',
            'Nombre',
            'Documento de Identificación',
            'Tipo de Proveedor',
            'País o países, donde se realiza la solicitud',
            'País o países, donde desea comercializar productos y/o proveer servicios a GENFAR',
            'Certificado de existencia y representación legal no mayor a 60 días o aviso de operación',
            'Certificación o carta bancaria menor a 90 días',
            'RUT o RUC (menos de un año de vigencia)',
            'Copia de la cedula del representante legal',
            'Copia de Licencia de Profesional de la salud',
            'Curriculum Vitae o Hoja de vida Actualizada',
            'Departamento/Estado/Provincia',
            'Ciudad de la Solicitud',
            'Razón Social',
            'Número de Identificación fiscal (CÉDULA,PASAPORTE,NIT,RUT,RUC,NIF)',
            'DV - Dígito de Verificación',
            'Dirección',
            'Teléfono Empresarial',
            'Email',
            'Email notificación de pagos',
            'Email Envíos de Orden de compra',
            'Email envíos certificados de retención',
            'Producto o servicio que brinda',
            'Representante de ventas',
            'Email Representante ventas',
            'País donde ejerce medicina',
            'Tipo de documento',
            '¿Algún gobierno, entidad estatal o controlada por el estado (nacional o internacional) tiene alguna propiedad, interés financiero o control sobre su negocio?',
            'Nombre del Banco',
            'Ciudad del Banco',
            'Dirección del banco',
            'Tipo de cuenta',
            'Número de cuenta',
            'Cuenta Interbancaria',
            'Codigo IBAN',
            '¿Tiene detracciones?',
            '¿Tiene banco intermediario?',
            'País del Banco',
            'Condiciones de Pago',
            'Tipo de Moneda',
            '¿Tiene algún familiar trabajando en Genfar?',
            '¿Sus familiares tiene negocios con Genfar?',
            '¿Usted sustenta posición decisora en alguna organización pública?',
            'Nombre del Banco intermediario',
            'Ciudad del Banco intermediario',
            'Dirección de la sucursal',
            'Número de cuenta Interbancaria',
            'ABA o Swift',
            'Codigo IBAN',
            'Nombre de representante legal',
            'Tipo de identificación',
            'N° de Identificación',
            'Fecha de expedición',
            'Nacionalidad del representante legal',
            'Teléfono',
            'Email representante legal',
            '¿Maneja recursos públicos?',
            '¿Tiene algún grado de poder público?',
            '¿Goza de reconocimiento público?',
            '¿Cuántos accionistas o asociados tienen?',
            '¿Su participacion es igual o superior al 5%?',
            'Si corresponde, cualquier otro nombre (s) de empresa / individuo bajo el cual la Organización hace negocios',
            'Código postal de la entidad legal:',
            'Sitio Web (si lo hubiera)',
            '¿Es auto retenedor?',
            'N° de resolución',
            'Fecha Detraccion',
            '¿Es Gran Contribuyente?',
            'Cuenta Detracción',
            'Fecha Detracción 2',
            'Tipo de contribuyente',
            'N° de resolución',
            'Actividad económica',
            'Fecha Información tributaria',
            'Código CIIU',
            '¿Tiene certificación OEA?',
            '¿Cuenta con algún certificado LAFT?',
            'Proporcione el (los) nombre (s) de los propietarios, directores y / o miembros de la junta de su organización: Propietario (s): adjunte una hoja separada que identifique los nombres, el porcentaje de propiedad (%) y País de nacionalidad Directores/miembros de la junta: adjunte una hoja separada que identifique los nombres y el cargo',
            'Adjunto',
            'Entidades relacionadas: Si su organización es una subsidiaria, filial, indique el nombre y la dirección de su organización matriz:',
            'Confirme que tiene todos los registros y licencias necesarios para operar: proporcione un número de registro válido o número de organización benéfica registrada o equivalente.',
            'Adjunte su certificado de registro',
            '¿Tiene un código de ética/conducta y/o política antisoborno o código de conducta similar?',
            'Adjunte el Código ético/de conducta/o la política antisoborno de su organización en la página de carga de documentos.',
            '¿Confirma que su organización está de acuerdo con la Política antisoborno de Genfar',
            '¿Su organización ofrece un servicio exclusivo o servicios públicos en virtud de los términos de un contrato comercial con el gobierno o de una subvención gubernamental?',
            'Proporcione una descripción general',
            '¿Su organización cumple con las leyes y normativas antisoborno y antimonopolio en el país en el que está constituida?', 
            '¿Tiene su organización o alguno de los miembros de su Junta Directiva o de la Gerencia clave una función de asesoramiento que permita influir en los precios, el estado del formulario, reembolso, aprobación, permisos de registro, autorización o la compra de productos de Genfar y/o activos o negocios de Genfar?',
            'Adjunto',
            '¿Hay alguna persona políticamente expuesta dentro de los miembros de su Junta o la Gerencia clave? *Proporcione la definición de PEP: ¿Trabaja o ha trabajado, durante los últimos 2 años, para el gobierno, entidad estatal o controlada por el estado (nacional o internacional)? ¿Tiene o ha ocupado, durante los últimos   años, un cargo o función de asesoramiento que permita influir en los precios, reembolsos, aprobaciones, registros o compras de productos de Genfar? ¿Tiene o ha ocupado,  durante los últimos 2 años, un cargo en un partido político o actúa en nombre de un partido político, o se postuló o ha presentado una candidatura a un partido político?',
            'Adjunto',
            '¿Espera subcontratar alguna actividad a terceros para realizar el trabajo requerido al interactuar con Genfar?(* proporcionar definición de actividades de subcontratación)',
            'Adjunto',
            'En caso afirmativo, ¿tienen esos terceros(s) funciones de asesoramiento que permitan influir en los precios, el estado del formulario, reembolso, aprobación, permisos de registro, autorización o la compra de productos de Genfar y/o activos o negocios de Genfar?',
            'Adjunto',
            'En caso afirmativo, ¿realizó comprobaciones adecuadas para asegurarse de que sus Tercero(s) cumplen con las leyes, normativas y principios legales?',
            'En caso afirmativo, ¿asume la responsabilidad total de la conducta de su tercero?',
            '¿Hay algo que declarar en relación con cualquier inhabilitación y/o suspensión profesional y/o cualquier condena penal de su Organización o cualquier persona clave de la Gerencia relacionada en particular con el soborno u otras acciones penales relevantes en los últimos 3 años?',
            'Adjunto',
            'Por la presente certifico:',
            'Hay Alerta en DDA',
            '¿Se asegura de que ninguna persona menor de 15 años (o menor de la edad legal para terminar la educación obligatoria) participe en sus operaciones?',
            '¿Se asegura de que los trabajadores menores de 18 años no realicen trabajos peligrosos, extenuantes o físicamente exigentes?',
            '¿Otorga a sus empleados el derecho a entrar en el empleo de forma voluntaria y libre, sin la amenaza de sanción y el derecho a rescindir libremente el empleo de forma voluntaria mediante un preaviso de duración razonable en cualquier momento y sin sanción?',
            'Otro',
            '¿Se asegura de que todos los contratos de trabajo estén escritos y sean transparentes e incluyan disposiciones integrales para los empleados?',
            '¿Se asegura de que todos los empleados no enfrenten violencia y daños a la integridad física o psicológica, como tratos inhumanos, castigos físicos, insultos, hostigamiento, coacción mental o física?',
            '¿Se asegura de que no haya discriminación en la contratación, compensación, acceso a la capacitación, promoción, terminación o jubilación por motivos de raza, casta, origen nacional, religión, edad, discapacidad, género, estado civil, orientación sexual, afiliación sindical o política? discriminación por afiliación',
            'Otro',
            '¿Se asegura de que el tiempo de trabajo de los empleados se ajuste a la legislación nacional?',
            '¿Garantizan sus proveedores que los salarios se paguen con regularidad y permitan a los empleados y sus familias satisfacer sus necesidades básicas?',
            '¿Cuenta con un Sistema de Gestión Ambiental siguiendo estándares locales y/o corporativos si los hay? ¿Y con los recursos apropiados, incluido el personal para mantenerlo?',
            '¿Cumple usted (incluidos sus materiales o productos) con las reglamentaciones ambientales vigentes y aplicables, y cuenta con todos los permisos o seguros ambientales necesarios para operar de conformidad con las reglamentaciones locales?',
            '¿Tiene algún tipo de demanda judicial, denuncia formal, proceso sancionador, investigación o similar en curso o pendiente de cerrar por parte de alguna autoridad o grupo de interés relacionado con temas ambientales?',
            '¿Ha tenido un evento cuyo resultado fue una contaminación, contaminación, liberación o emisión registrable notificable a las autoridades siguiendo las regulaciones locales que aún está pendiente de informar y/o resolver?',
            '¿Identifica, valora y evalúa aspectos e impactos en todas sus operaciones y elementos de la cadena de suministro? ¿Especialmente relacionado con el vertido al medio ambiente de sustancias farmacéuticas?',
            '¿Se gestionan, controlan y tratan adecuadamente los aspectos de sus actividades y productos con el potencial de tener un impacto adverso en la salud humana o el medio ambiente antes de liberarlos al medio ambiente? ¿Son estos monitores o medidas para garantizar la efectividad de los controles?',
            '¿Garantiza que los materiales suministrados por usted en cualquier forma están permitidos para su uso actual por las regulaciones ambientales locales y los acuerdos globales o internacionales y cumplen plenamente con estos? (No están en un plan para descontinuar, prohibir o convertirse en un pasivo ambiental potencial)',
            '¿Tiene la capacidad y el compromiso de informar a tiempo, comunicar e investigar cualquier tipo de evento, desvío o anormalidad que pueda generar un impacto en las operaciones, actividades o reputación de nuestro negocio en materia ambiental?',
            '¿Cuenta con un Sistema de Gestión de HS que cumpla con los estándares locales y/o corporativos, si los hay? ¿Y con los recursos adecuados, incluido el personal?',
            '¿Cumple con las normas locales y nacionales de salud y seguridad? ¿Cuenta con todos los permisos de salud y seguridad necesarios para operar de conformidad con las reglamentaciones locales?',
            '¿Tiene algún tipo de demanda legal, denuncia formal, proceso sancionador, investigación o similar en curso por parte de una autoridad o parte interesada relacionada con la seguridad y salud?',
            '¿Ha tenido un evento en el que el resultado fue una fatalidad, un accidente grave/grave o registrable/notificable a las autoridades?',
            '¿Identifica, implementa y garantiza el mantenimiento de controles adecuados y efectivos para reducir a niveles aceptables los peligros y riesgos en todas sus operaciones y actividades?',
            '¿Mide, inspecciona, audita y monitorea los indicadores clave de seguridad y salud, parámetros, peligros, riesgos, etc., e implementa las acciones adecuadas en caso de desviación?',
            '¿Cuenta con un plan de emergencia y continuidad comercial para sus operaciones y actividades implementado, probado y validado?',
            '¿Tiene la capacidad y el compromiso de informar a tiempo, comunicar e investigar cualquier tipo de evento, desviación o anormalidad que pueda generar un impacto en las operaciones, actividades o reputación de nuestro negocio en cualquier tema de Salud y Seguridad?',
            'Está dispuesto a someterse a una evaluación de seguridad cibernética de Genfar (según VIRP 2.0)?',
            'Comentario EBI',
            'Plan EBI',
            'Recomendación EBI',
            'Comentario Sarlaft',
            'Comentario HYS',
            'Comentario CSR',
            'Comentario ENV',
            'Comentario CSY',
            'Fecha Aprobación Ética',
            'Fecha Aprobación Sarlaft',
            'Fecha Aprobación HYS',
            'Fecha Aprobación CSR',
            'Fecha Aprobación ENV',
            'Fecha Aprobación CSY',
            'Fecha Solicitud',
            'Fecha Finalización',
            'Tiempo de respuesta Ética',
            'Tiempo de respuesta Sarlaft',
            'Tiempo de respuesta HYS',
            'Tiempo de respuesta CSR',
            'Tiempo de respuesta ENV',
            'Tiempo de respuesta CSY',
            'Tiempo de respuesta Risk'
		];
	}
}
