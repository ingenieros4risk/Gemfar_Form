<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Country;
use App\Models\Festive;
// use App\Models\Sanofi\SanofiRequestForm;
// use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\BeneficialOwnership;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Inspektor\CurrentType;
use App\Models\GenfarClientForm;
use App\Models\Clients;
use App\Models\LegalEntity;
use App\Models\SalesOrganization;
use App\Models\Channels;
use App\Models\Sector;
use App\Models\Oficinas_Ventas;
use App\Models\GrupoVendedores;
use Carbon\Carbon;

class GenfarClient extends Component
{
    use WithFileUploads;

	public $currentStep = 0;

    /* Genfar Client Form*/
    public $qc1,$qc2,$qc3,$qc4,$qc5,$qc6,$qc7,$qc8,$qc9,$qc10,$qc11,$qc12,$qc13,$qc14,
    $qc15,$qc16,$qc17,$qc18,$qc19,$qc20,$qc21,$qc22,$qc23,$qc24,$qc25,$qc26,$qc27,$qc28,
    $qc29,$qc30,$qc31,$qc32,$qc33,$qc34,$qc35,$qc36,$qc37,$qc38,$qc39,$qc40,$qc41,$qc42,
    $qc43,$qc44,$qc45,$qc46,$qc47,$qc48,$qc49,$qc50,$qc51,$qc52,$qc53,$qc54,$qc55,$qc56,
    $qc57,$qc58,$qc59,$qc60,$qc61,$qc62,$qc63,$qc64,$qc65,$qc66,$qc67,$qc68,$qc69,$qc70,
    $qc71,$qc72,$qc73,$qc74,$qc75,$qc76,$qc77,$qc78,$qc79,$qc80,$qc81,$qc82,$qc83,$qc84,
    $qc85,$qc86,$qc87,$qc88,$qc89,$qc90,$qc91,$qc92,$qc93,$qc94,$qc95,$qc96,$qc97,$qc98,
    $qc99,$qc100,$qc101,$qc102,$qc103,$qc104,$qc105,$qc106,$qc107;

    public $check_risk, $country_homologation, $multiple_select_country;

    public $type_person, $email_auth, $password;

    /*BF*/
    public $forms_id, $type_bf, $adicional_text, $no_coincidence_file, $amount_thirds,
    $document_beneficial_ownership, $bf_document, $full_name, $participation_control, $is_pep;


    public $moreCoincidences;

    public $check_genfar_1, $check_genfar_2, $check_genfar_3, $check_genfar_4, $check_genfar_5;

    public $mostrarCampos = false;
    public $camposObligatorios = [];
    public $id_country = 0, $id_client_type;

    public function mount($clients_forms)
    {
        $this->requests_form = GenfarClientForm::find($clients_forms->id);
        $this->requests_risk = Clients::find($clients_forms->id);

        $this->actualizarCamposSegunTipoCliente();
    }

    public function actualizarCamposSegunTipoCliente()
{
    $this->mostrarCampos = false; // Resetear por defecto
    $this->camposObligatorios = []; // Resetear por defecto

    $this->id_country = $this->requests_risk->id_country;
    $this->id_client_type = $this->requests_risk->id_client_type;

}

    public function render()
    {
        $money = CurrentType::orderBy('name')->get();
        $document_types = InspektorDocumentType::orderBy('name')->get();
    	$countries = SanofiHomologationCountry::all();
    	$paises = Country::all();
        $legal_entities = LegalEntity::orderBy('name', 'asc')->get();
        $sales_organization = SalesOrganization::orderBy('name', 'asc')->get();
        $channels = Channels::orderBy('name', 'asc')->get();
        $sectors = Sector::orderBy('name', 'asc')->get();
        $oficinas_ventas = Oficinas_Ventas::orderBy('name', 'asc')->get();
        $grupos_vendedores = GrupoVendedores::orderBy('name', 'asc')->get();
       

        return view('livewire.genfar-client', compact(
            'countries',
            'paises',
            'document_types', 
            'money', 
            'legal_entities',
            'sales_organization',
            'channels',
            'sectors',
            'oficinas_ventas',
            'grupos_vendedores'
        ));

    }

    /* Variables from Add Terceros*/
    public $updateMode = false;
    public $inputs = [];
    public $i = 0;

    public function addInput()
    {
        $this->inputs[] = '';
    }

    public function removeInput($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }

    public function isPepClicked()
    {
        $this->is_pep_checks != 1 ? $this->is_pep_checks = 1 : $this->is_pep_checks = 0;
    }

    /* Form stem Genfar*/
    public function ZeroStepSubmit()
    {
        $validatedData = $this->validate([
            'password' => 'required|in:' . $this->requests_form->password,
            'email_auth' => 'required|email|in:' . $this->requests_risk->email,
        ],[
            'password.required' => 'Para continuar, debe agregar la contraseña suministrada',
            'password.in' => 'La contraseña ingresada es incorrecta',
            'email_auth.required' => 'Para continuar, debe agregar el correo electrónico',
            'email_auth.email' => 'El correo electrónico ingresado no es válido',
            'email_auth.in' => 'El correo electrónico ingresado no es válido'
        ]);

        $this->currentStep = 1;
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'check_risk' => 'accepted'
        ],[
           'check_risk.accepted' => 'Para continuar, debe aceptar los términos establecidos'
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
	{
        $validatedData = $this->validate([

            'country_homologation' => 'required',
            'type_person' => 'required'
            // ,'multiple_select_country' => 'required'
        ],[

            'country_homologation.required' => 'Seleccione un país',
            'type_person.required' => 'Seleccione un tipo de Persona'
            // ,'multiple_select_country.required' => 'Seleccione un respusta'
        ]);

        $this->requests_form->country_homologation = $this->country_homologation;
        // $this->requests_form->multiple_select_country = $multiple;

        $this->requests_form->save();

        // if($this->requests_risk->terminos_question == 1){
            $this->currentStep = 3;
        // }else{
        //     $this->currentStep = 4;
        // }

    }

    public function thirdStepSubmit()
    {
        /*STEP LEGAL INFO*/

        $validatedData = $this->validate([
            'check_genfar_1' => 'accepted',
            'check_genfar_2' => 'accepted',
            'check_genfar_3' => 'accepted',
            'check_genfar_4' => 'accepted',
            'check_genfar_5' => 'accepted'
        ],[
           'check_genfar_1.accepted' => 'Para continuar, debe aceptar los términos establecidos',
           'check_genfar_2.accepted' => 'Para continuar, debe aceptar los términos establecidos',
           'check_genfar_3.accepted' => 'Para continuar, debe aceptar los términos establecidos',
           'check_genfar_4.accepted' => 'Para continuar, debe aceptar los términos establecidos',
           'check_genfar_5.accepted' => 'Para continuar, debe aceptar los términos establecidos'
        ]);

        $this->currentStep = 4;
    }

    public function fourtStepSubmit()
    {
        /*Step Form Quests */
        $validatedOnly = $this->validate([
            'qc8'=> 'required|max:30',
            'qc9'=> 'required|max:30',
            'qc10'=> 'required|max:30',
            'qc11'=> 'required|max:30',
            'qc12'=> 'required|max:30',
            'qc13'=> 'required|max:30',
            'qc14'=> 'required|max:30',
            'qc15'=> 'required|max:30',
            'qc16'=> 'required|max:30',
            'qc17'=> 'required|max:30',
            'qc18'=> 'required|max:30',
            'qc19'=> 'required|max:30',
            'qc20'=> 'max:30',
            'qc21'=> 'max:30',
            'qc22'=> 'max:30',
            'qc23'=> 'max:30',
            'qc24'=> 'max:30',
            'qc25'=> 'max:30',
            'qc26'=> 'max:30',
            'qc27'=> 'max:30',
            'qc28'=> 'max:30',
            'qc29'=> 'max:30',
            'qc30'=> 'max:30',
            'qc31'=> 'max:30',
            'qc32'=> 'required|max:30',
            'qc33'=> 'max:30',
            'qc34'=> 'max:30',
            'qc35'=> 'max:30',
            'qc36'=> 'max:30',
            'qc37'=> 'max:30',
            'qc38'=> 'max:30',
            'qc39'=> 'max:30',
            'qc40'=> 'max:30',
            'qc41'=> 'max:30',
            'qc42'=> 'max:30',
            'qc43'=> 'max:30',
            'qc44'=> 'max:30',
            'qc45'=> 'max:30',
            'qc46'=> 'max:30',
            'qc47'=> 'max:30',
            'qc48'=> 'max:30',
            'qc49'=> 'max:30',
            'qc50'=> 'max:30',
            'qc51'=> 'max:30',
            'qc52'=> 'max:30',
            'qc53'=> 'max:30',
            'qc54'=> 'max:30',
            'qc55'=> 'max:30',
            'qc56'=> 'max:30',
            'qc57'=> 'max:30',
            'qc58'=> 'max:30',
            'qc59'=> 'max:30',
            'qc60'=> 'max:30',
            'qc61'=> 'max:30',
            'qc62'=> 'max:30',
            'qc63'=> 'max:30',
            'qc64'=> 'max:30',
            'qc65'=> 'max:30',
            'qc66'=> 'max:30',
            'qc67'=> 'max:30',
            'qc68'=> 'max:30',
            'qc69'=> 'max:30',
            'qc70'=> 'required|max:30',
            'qc71'=> 'max:30',
            'qc72'=> 'max:30',
            'qc73'=> 'required|max:30'
        ]);

        $this->requests_form->qc8  = $this->qc8;
        $this->requests_form->qc9  = $this->qc9;
        $this->requests_form->qc10  = $this->qc10;
        $this->requests_form->qc11  = $this->qc11;
        $this->requests_form->qc12  = $this->qc12;
        $this->requests_form->qc13  = $this->qc13;
        $this->requests_form->qc14  = $this->qc14;
        $this->requests_form->qc15  = $this->qc15;
        $this->requests_form->qc16  = $this->qc16;
        $this->requests_form->qc17  = $this->qc17;
        $this->requests_form->qc18  = $this->qc18;
        $this->requests_form->qc19  = $this->qc19;
        $this->requests_form->qc20  = $this->qc20;
        $this->requests_form->qc21  = $this->qc21;
        $this->requests_form->qc22  = $this->qc22;
        $this->requests_form->qc23  = $this->qc23;
        $this->requests_form->qc24  = $this->qc24;
        $this->requests_form->qc25  = $this->qc25;
        $this->requests_form->qc26  = $this->qc26;
        $this->requests_form->qc27  = $this->qc27;
        $this->requests_form->qc28  = $this->qc28;
        $this->requests_form->qc29  = $this->qc29;
        $this->requests_form->qc30  = $this->qc30;
        $this->requests_form->qc31  = $this->qc31;
        $this->requests_form->qc32  = $this->qc32;
        $this->requests_form->qc33  = $this->qc33;
        $this->requests_form->qc34  = $this->qc34;
        $this->requests_form->qc35  = $this->qc35;
        $this->requests_form->qc36  = $this->qc36;
        $this->requests_form->qc37  = $this->qc37;
        $this->requests_form->qc38  = $this->qc38;
        $this->requests_form->qc39  = $this->qc39;
        $this->requests_form->qc40  = $this->qc40;
        $this->requests_form->qc41  = $this->qc41;
        $this->requests_form->qc42  = $this->qc42;
        $this->requests_form->qc43  = $this->qc43;
        $this->requests_form->qc44  = $this->qc44;
        $this->requests_form->qc45  = $this->qc45;
        $this->requests_form->qc46  = $this->qc46;
        $this->requests_form->qc47  = $this->qc47;
        $this->requests_form->qc48  = $this->qc48;
        $this->requests_form->qc49  = $this->qc49;
        $this->requests_form->qc50  = $this->qc50;
        $this->requests_form->qc51  = $this->qc51;
        $this->requests_form->qc52  = $this->qc52;
        $this->requests_form->qc53  = $this->qc53;
        $this->requests_form->qc54  = $this->qc54;
        $this->requests_form->qc55  = $this->qc55;
        $this->requests_form->qc56  = $this->qc56;
        $this->requests_form->qc57  = $this->qc57;
        $this->requests_form->qc58  = $this->qc58;
        $this->requests_form->qc59  = $this->qc59;
        $this->requests_form->qc60  = $this->qc60;
        $this->requests_form->qc61  = $this->qc61;
        $this->requests_form->qc62  = $this->qc62;
        $this->requests_form->qc63  = $this->qc63;
        $this->requests_form->qc64  = $this->qc64;
        $this->requests_form->qc65  = $this->qc65;
        $this->requests_form->qc66  = $this->qc66;
        $this->requests_form->qc67  = $this->qc67;
        $this->requests_form->qc68  = $this->qc68;
        $this->requests_form->qc69  = $this->qc69;
        $this->requests_form->qc70  = $this->qc70;
        $this->requests_form->qc71  = $this->qc71;
        $this->requests_form->qc72  = $this->qc72;
        $this->requests_form->qc73  = $this->qc73;

        $this->requests_form->save();

        $this->currentStep = 5;
    }

    public function fifttStepSubmit()
    {

        if($this->type_person == 2){

            /* Se eliminan los Beneficiarios Finales cargados previamente* */
            $beneficialOwners = BeneficialOwnerShip::where('forms_id', $this->requests_form->id)->get();
            foreach ($beneficialOwners as $beneficialOwner) {
                $beneficialOwner->delete();
            }

            if($this->moreCoincidences == 1){

                $validatedDate = $this->validate([
                    'full_name.0' => 'required|min:6',
                    'document_beneficial_ownership.0' => 'required',
                    'bf_document.0' => 'required|min:6',
                    'participation_control.0' => 'required|min:1',
                    'is_pep.0' => 'required'
                ]);

                foreach ($this->full_name as $key => $value)
                {
                    $newTercero = new BeneficialOwnership([
                        'forms_id' => $this->requests_form->id,
                        'full_name' => $this->full_name[$key],
                        'type_bf' => $this->moreCoincidences,
                        'document_beneficial_ownership' => $this->document_beneficial_ownership[$key],
                        'bf_document' => $this->bf_document[$key],
                        'participation_control' => $this->participation_control[$key],
                        'amount_thirds' => 1,
                        'is_pep' => $this->is_pep[$key]
                    ]);
                    $newTercero->save();
                    //$CollectionCoincidences->push($newTercero);
                }

            }elseif($this->moreCoincidences == 2){
                $validatedDate = $this->validate([
                    'amount_thirds' => 'required',
                    'coincidence_file' => 'required'
                ],
                [
                    'amount_thirds.required' => 'Señale la cantidad total de terceros relacionados/Indicate the total number of related third parties',
                    'coincidence_file.required' => 'Adjunte soporte de terceros/Attach third-party support'
                ]);

                $newTercero = new BeneficialOwnership([
                    'forms_id' => $this->requests_form->id,
                    'type_bf' => $this->moreCoincidences,
                    'amount_thirds '=> $this->amount_thirds
                ]);

                $newTercero->save();

                /* ADD coincidence_file FILE */
                $coincidence_file = $this->coincidence_file;
                $fileReporteName = 'BF_COINCIDENCIAS'.'.'.$coincidence_file->getClientOriginalExtension();
                $newTercero->update(['coincidence_file' => $this->coincidence_file->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);


            }elseif($this->moreCoincidences == 0){
                $validatedDate = $this->validate([
                    'adicional_text' => 'required',
                    'no_coincidence_file' => 'required'
                ],
                [
                    'adicional_text.required' => 'Escriba alguna justificación / Write some justification',
                    'no_coincidence_file.required' => 'Adjunte algún soporte a su justificación / Attach some support to your justification'
                ]);
                /**New Beneficiario FInal */

                $newTercero = new BeneficialOwnership([
                    'forms_id' => $this->requests_form->id,
                    'type_bf' => $this->moreCoincidences,
                    'adicional_text' => $this->adicional_text,
                    'amount_thirds' => 0
                ]);
                $newTercero->save();

                /* ADD no_coincidence_file FILE */
                $no_coincidence_file = $this->no_coincidence_file;
                $fileReporteName = 'BF_NO_COINCIDENCIAS'.'.'.$no_coincidence_file->getClientOriginalExtension();
                $newTercero->update(['no_coincidence_file' => $this->no_coincidence_file->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);

            }

            $this->currentStep = 6;

        }else{
            $this->currentStep = 6;
        }

    }

    public function sixtStepSubmit()
    {
       
        $validationRules = [];
    
        if ($this->id_client_type == 6) {
    
            if ($this->id_country == 1) {
                $validationRules = [
                    'qc74' => 'required|file',
                    'qc75' => 'required|file',
                    'qc76' => 'required|file',
                    'qc77' => 'required|file',
                    'qc78' => 'required|file',
                    'qc79' => 'required|file',
                    'qc80' => 'required|file',
                    'qc81' => 'required|file',
                    'qc82' => 'required|file',
                    'qc83' => 'required|file',
                    'qc84' => 'required|file',
                    'qc85' => 'required|file',
                    'qc86' => 'required|file',
                    'qc87' => 'required|file',
                    'qc88' => 'required|file',
                ];
            }
           
            elseif ($this->id_country == 5) {
                $validationRules = [
                    'qc74' => 'required|file',
                    'qc75' => 'required|file',
                    'qc76' => 'required|file',
                    'qc77' => 'required|file',
                    'qc78' => 'required|file',
                    'qc79' => 'required|file',
                    'qc80' => 'required|file',
                    'qc82' => 'required|file',
                    'qc83' => 'required|file',
                    'qc85' => 'required|file',
                    'qc86' => 'required|file',
                    'qc87' => 'required|file',
                    'qc88' => 'required|file',
                ];
            }
           
            else {
                $validationRules = [
                    'qc74' => 'required|file',
                    'qc75' => 'required|file',
                    'qc76' => 'required|file',
                    'qc77' => 'required|file',
                    'qc78' => 'required|file',
                    'qc79' => 'required|file',
                    'qc80' => 'required|file',
                    'qc81' => 'required|file',
                    'qc82' => 'required|file',
                    'qc83' => 'required|file',
                    'qc84' => 'required|file',
                    'qc86' => 'required|file',
                    'qc87' => 'required|file',
                    'qc88' => 'required|file',
                ];
            }
        }
       
        if ($this->id_client_type == 1) {
          
            if ($this->id_country == 5) {
                $validationRules['qc89'] = 'required|file';
            }
        }
  
        if ($this->id_client_type == 5) {
           
            if ($this->id_country == 1 || $this->id_country == 5) {
                $validationRules['qc90'] = 'required|file';
                $validationRules['qc91'] = 'required|file';
                $validationRules['qc92'] = 'required|file';
            }
        }
    
   
        if ($this->id_client_type == 3) {
            $validationRules['qc93'] = 'required|file';
            $validationRules['qc94'] = 'required|file';
            $validationRules['qc95'] = 'required|file';
            $validationRules['qc96'] = 'required|file';
        }
    
        if ($this->id_client_type == 2) {
     
            if ($this->id_country != 5) {
                $validationRules['qc97'] = 'required|file';
                $validationRules['qc98'] = 'required|file';
            }
        }
    
        if ($this->id_client_type == 4) {
            $validationRules['qc100'] = 'required|file';
            $validationRules['qc101'] = 'required|file';
        }
    
        $this->validate($validationRules);
    
        $this->submitForm();
    
        $this->currentStep = 99;
    }

        /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitForm()
    {
        $clientId = $this->requests_form->client_id;
        $documentName = config('documents.document_names');
        //documents
        $documentFields = [
            'qc74', 'qc75', 'qc76', 'qc77', 'qc78', 'qc79', 'qc80', 'qc81', 'qc82', 'qc83',
            'qc84', 'qc85', 'qc86', 'qc87', 'qc88', 'qc89', 'qc90', 'qc91', 'qc92', 'qc93',
            'qc94', 'qc95', 'qc96', 'qc97', 'qc98', 'qc99', 'qc100', 'qc101', 'qc102', 'qc103',
            'qc104', 'qc105', 'qc106', 'qc107'
        ];
        foreach ($documentFields as $field) {
            if ($this->$field) {
                $file = $this->$field;
                $documentName = $documentNames[$field] ?? $field;
                $newDocName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $documentName);

                $filename = "{$clientId}_{$newDocName}." . $file->getClientOriginalExtension();
    
                $path = $file->storeAs("GENFAR/CLIENTS/{$clientId}", $filename, 'local');
    
                $this->requests_form->$field = $path;
            }
        }
    
        $fecha_hoy = Carbon::now();

        $fecha_llegada = self::verifyAviabilityDate($fecha_hoy);
        $fecha_llegada_s = $fecha_llegada->format('Y-m-d H:i:s');
        $this->requests_form->password = "GENFAR".$this->requests_form->id;


        $this->requests_form->save();


        $this->currentStep = 99;

    }

    /**
     * verifyAviabilityDate
     *
     * @return response()
     */
    public function verifyAviabilityDate($date){
        $timeToRest = '17:00:00';
        $timeToWork = '07:00:00';
        $time = $date->format('H:i:s');

        /* Validador de Hora de solicitud */

        if ($time > $timeToRest) {
            $dateResult = Carbon::parse($timeToWork);
            $dateResult = $dateResult->addDays(1);
        }else{
            $dateResult = $date;
        }

        /*Validador de Festivos*/

        while (self::isFestive($dateResult)) {
            $dateResult->addDays(1);
        }

        return $dateResult;
    }


    /**
     * isFestive Methode
     *
     * @return response()
     */
    public function isFestive($date){
        $festivos = Festive::all();
        foreach ($festivos as $dia_festivo) {
            $fechaFormatFestivo = Carbon::parse($dia_festivo->date)->format('y/m/d');
            $isFestive = ($date->format('y/m/d') == $fechaFormatFestivo ? true:false);
            if($isFestive){break;}
        }
        return $isFestive;
    }

        /**

     * Write code on Method

     *

     * @return response()

     */

    public function back($step)

    {

        $this->currentStep = $step;

    }

    public function isQuest_68()
    {
        $this->is_quest_68 != 1 ? $this->is_quest_68 = 1 : $this->is_quest_68 = 0;
    }

    public function isQuest_72()
    {
        $this->is_quest_72 != 1 ? $this->is_quest_72 = 1 : $this->is_quest_72 = 0;
    }

    public function isQuest_65()
    {
        $this->is_quest_65 != 1 ? $this->is_quest_65 = 1 : $this->is_quest_65 = 0;
    }

    public function isQuest_64()
    {
        $this->is_quest_64 != 1 ? $this->is_quest_64 = 1 : $this->is_quest_64 = 0;
    }

    public function isQuest_48()
    {
        $this->is_quest_48 != 1 ? $this->is_quest_48 = 1 : $this->is_quest_48 = 0;
    }

    public function isQuest_38()
    {
        $this->is_quest_38 != 1 ? $this->is_quest_38 = 1 : $this->is_quest_38 = 0;
    }

    public function isQuest_34()
    {
        $this->is_quest_34 != 1 ? $this->is_quest_34 = 1 : $this->is_quest_34 = 0;
    }

    public function isQuest_26()
    {
        $this->is_quest_26 != 1 ? $this->is_quest_26 = 1 : $this->is_quest_26 = 0;
    }

    public function isDesicionClicked()
    {
        $this->is_decision_check != 1 ? $this->is_decision_check = 1 : $this->is_decision_check = 0;
    }

    public function isDetractionClicked()
    {
        $this->is_detraccion_check != 1 ? $this->is_detraccion_check = 1 : $this->is_detraccion_check = 0;
    }

    public function isSuministro()
    {
        $this->is_suministro_check != 1 ? $this->is_suministro_check = 1 : $this->is_suministro_check = 0;
    }
}
