<?php

namespace App\Exports;

use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiRequestStatus;
use App\Models\Sanofi\SanofiProvider;
use App\Models\Sanofi\RequestRiskStatus;
use App\Models\Sanofi\SanofiRequestType;
use App\Models\Sanofi\SanofiHacat;
use App\Models\Sanofi\GenfarIndustryKey;
use App\Models\Sanofi\GenfarSupliersCreation;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Carbon\Carbon;


class SanofiExportsSuppliers implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $requests_risk = GenfarSupliersCreation::all();

        foreach ($requests_risk as $key) {
            
            $user_solicitante = User::find($key->solicitante);
            if(is_null($key->solicitante)){
                $key->solicitante = "Sin Asignar";
            }else{
                $user = User::find($key->solicitante);
                $key->solicitante = $user->name;
            }

            if(is_null($key->genfar_provider)){
                $key->genfar_provider = "Sin Asignar";
            }else{
                if($key->genfar_provider == 7){
                    $key->genfar_provider = "Empleados";
                }else{
                    $genfarProvider = SanofiProvider::find($key->genfar_provider);
                    $key->genfar_provider = $genfarProvider->name;
                }
            }
            
            if(is_null($key->country_homologation)){
                $key->country_homologation = "Sin Asignar";
            }else{
                $countryHomologation = SanofiHomologationCountry::find($key->country_homologation);
                $key->country_homologation = $countryHomologation->name;
            }

            if($key->confirm == "CONFIRMAR"){
                $key->confirm = "CONFIRMADO";
            }else{
                $key->confirm = "SIN CONFIRMAR";
            }

            
            if($key->approve == "APROBAR"){
                $key->approve = "APROBADO";
            }else{
                $key->approve = "SIN APROBAR";
            }

            if(is_null($key->industrykey)){
                $key->industrykey = "No APLICA";
            }else{
                $industrykey = GenfarIndustryKey::find($key->industrykey);
                $key->industrykey = $industrykey->name;
            }

            $paises = json_decode($key->paises);
            foreach ($paises as $object => $pais) {
                $country = SanofiHomologationCountry::find($pais);
                $paises[$object] = $country->country;
            }
            $key->paises = implode(", ", $paises);

            if($key->status == 0){
                $key->status = "Pendiente";
            }elseif($key->status == 1){
                $key->status = "Finalizado";
            }elseif($key->status == 2){
                $key->status = "Rechazado";
            }

            $key->date_request = $key->date_request ? Carbon::parse($key->date_request)->format('d-m-Y'):null;
            $key->date_updated = $key->date_updated ? Carbon::parse($key->date_updated)->format('d-m-Y'):null;
            $key->date_approve = $key->date_approve ? Carbon::parse($key->date_approve)->format('d-m-Y'):null;
            $key->date_confirm = $key->date_confirm ? Carbon::parse($key->date_confirm)->format('d-m-Y'):null;

        } 
        
        return $requests_risk;
    }

    public function headings(): array {
        return [
            'id',
            'Sociedad de Homologación',
            'Nombre del Proveedor',
            'E-mail del Proveedor',
            'Teléfono del Proveedor',
            'Tipo de Proveedor',
            'Tarea',
            'Industry key',
            'Solicitante',
            'Nacionalidad',
            'Países',
            'Tax id',
            'Supplier Code Colombia',
            'Supplier Code Ecuador',
            'Supplier Code Perú',
            'Comentarios',
            'Adjunto',
            'HACAT',
            'Estado',
            'Id Genfar',
            'Confirmador',
            'MasterData', // Aprobador
            'Archivo de Aprobación',
            'Archivo de Confirmación',
            'Fecha de Solicitud',
            'Fecha de Actualización',
            'Fecha de Aprobación',
            'Fecha de Confirmación'
        ];
    } 
}
