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

class SanofiRequestRiskExport implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    	$requests = SanofiRequestRisk::all();

    	foreach ($requests as $request) {

    		$paises = json_decode($request->paises);
	        foreach ($paises as $key => $pais) {
	            $country = SanofiHomologationCountry::find($pais);
	            $paises[$key] = $country->country;
	        }
	        $request->paises = implode(", ", $paises);

        	$provider = SanofiProvider::find($request->sanofi_provider); 
     		$request->sanofi_provider = $provider->name;

	        $sanofiHomologationCountry = SanofiHomologationCountry::find($request->country_homologation);
        	$request->country_homologation = $sanofiHomologationCountry->name;

	        $user_solicitante = User::find($request->user_solicitante);
	        if(is_null($request->user_solicitante)){
	            $request->user_solicitante = "Sin Asignar";
	        }else{
	            $user = User::find($request->user_solicitante);
	            $request->user_solicitante = $user->name;
	        }

	        $type = SanofiRequestType::find($request->request_type);
            $type ? $request->request_type = $type->name : $request->request_type;

            $hacat = SanofiHacat::find($request->hacat);
            $hacat ? $request->hacat = $hacat->name : $request->hacat = "";
			$country_cpy = Country::find($request->country_cpy);
			$country_cpy ? $request->country_cpy = $country_cpy->name : $request->country_cpy = "No Indica";


            $status = SanofiRequestStatus::find($request->status_id);
            $request->status_id = $status->name;

    	}

        return $requests;
    }

	public function headings(): array {
		return [
			'id',
			'Correo Solicitante',
			'Nombre Proveedor',
			'Documento del Proveedor',
			'Correo Proveedor',
			'Teléfono del Proveedor',
			'Países',
			'Nacionalidad',
			'Observación',
			'Usuario Solicitante',
			'Respuesta Matríz',
			'Respuesta Justificación',
			'Aplicar los términos y condiciones de los proveedores del alcance de compras',
			'Países',
			'DDS',
			'DDA',
			'Archivo Aprobación',
			'Manifestación Suscrita',
			'Tipo de Solicitud',
			'Sociedad Genfar',
			'Estado',
			'Tipo de Proveedor',
			'HACAT',
			'Área Solicitante',
			'Nombre del Comprador',
			'Condición de Pago',
			'Fecha de solicitud',
			'Fecha de Solución'
		];
	}
}
