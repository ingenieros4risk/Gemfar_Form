<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Country;
use App\Models\Festive;
use App\Models\Sanofi\SanofiAcademicDegree;
use App\Models\Sanofi\SanofiAcademicPosition;
use App\Models\Sanofi\SanofiHasAward;
use App\Models\Sanofi\SanofiHasBook;
use App\Models\Sanofi\SanofiHasConference;
use App\Models\Sanofi\SanofiHasPoster;
use App\Models\Sanofi\SanofiHasPublication;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiHomologationType;
use App\Models\Sanofi\SanofiMedicalSpeciality;
use App\Models\Sanofi\SanofiMemberInvestigator;
use App\Models\Sanofi\SanofiMemberSociety;
use App\Models\Sanofi\SanofiProvider;
use App\Models\Sanofi\SanofiInfluence;
use App\Models\Sanofi\SanofiRequestForm;
use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Sanofi\BeneficialOwnership;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Inspektor\CurrentType;
use Carbon\Carbon;

class Sanofi extends Component
{
    use WithFileUploads;

	public $currentStep = 0;

    /* Genfar*/

    public $type_person, $is_quest_26, $is_quest_34, $is_quest_38, $is_quest_48,
     $is_quest_64, $is_quest_65, $is_quest_68, $is_quest_72;

    public $ethichal = 0, $hys = 0, $csr = 0, $csi = 0, $env = 0, $csy = 0;

    public $empaque, $extranjero, $confidencial;
    public $csr_1, $csr_2, $csr_3, $csr_4, $csr_5, $csr_6, $csr_7, $csr_8, $csr_9, $csr_10, $csr_11;

    public $csi_1, $csi_2, $csi_3, $csi_4, $csi_5, $csi_6, $csi_7, $csi_8;

    public $env_1, $env_2, $env_3, $env_4, $env_5, $env_6, $env_7, $env_8;

    public $hys_1, $hys_2, $hys_3, $hys_4, $hys_5, $hys_6, $hys_7, $hys_8;

    public $csy_1;

    /*Validation Disclaimer*/

    public $check_risk, $check_genfar_1, $check_genfar_2, $check_genfar_3, $check_genfar_4, $check_genfar_5;

    /*--  Validation Check HCP --*/
    public $is_decision_check, $is_detraccion_check, $is_suministro_check;





    /*BF*/
    public $forms_id, $type_bf, $adicional_text, $no_coincidence_file, $amount_thirds,
    $document_beneficial_ownership, $bf_document, $full_name, $participation_control, $is_pep;

    // /**BF */
    // public  $bf_name, $bf_type_person, $bf_control, $bf_sex, $bf_document, $bf_nit, $bf_nationality,
    //         $bf_country_birth, $bf_country_home, $bf_country_fiscal, $bf_charge, $bf_place_work, $bf_telephone,
    //         $bf_email, $bf_address_work, $bf_address_home, $bf_is_pep, $bf_pep_charge, $bf_pep_time;

    public $coincidences = [], $coincidence_name, $coincidence_number, $coincidence_country, $moreCoincidences = 0;

    public $is_pep_checks = [];

    public $signalInput = 0, $selectCoincidencia, $coincidence_inspektor, $coincidence_signal, $coincidence_file;

    public $signalAditional = 0, $selectAditional, $adicional_link;

    public $objective = [], $objective_text;

    public $priority, $req_concepto, $req_informe;



    public $Formgenfar, $password, $requests_form, $requests_risk, $email_auth;

    public $sanofi_provider, $multiple_select_country = [], $is_detraccion, $is_suministro, $is_decision, $is_international = 0;

    public $pep_quest = [], $is_decision_quest = [], $pep_quest_text, $is_decision_quest_text;

    public $is_co, $is_pe, $is_cr, $is_rd, $is_ec, $is_gu, $is_pa, $is_ve;



    public $country_homologation, $type_homologation, $identification_type, $number, $name;

    public $country, $department, $municipality, $address, $email, $medical_speciality, $speciality, $type_business;

    public $status = 1;



    /*Preguntas*/

    public $quest_1, $quest_3, $quest_4, $quest_5, $quest_6, $quest_9, $quest_10, $quest_11, $quest_12, $quest_14,
    $quest_15, $quest_16, $quest_17, $quest_18, $quest_19, $quest_27, $quest_28, $quest_24, $quest_25, $quest_26,
    $quest_29, $quest_30, $quest_31, $quest_32, $quest_33, $quest_34, $quest_36, $quest_37, $quest_35, $quest_46,
    $quest_47, $quest_48, $quest_48f, $quest_64, $quest_64f, $quest_65, $quest_65f, $quest_66, $quest_67, $quest_68, $quest_68f, $quest_69, $quest_70, $quest_71f,
    $quest_71, $quest_72, $quest_72F, $quest_73, $quest_73_add, $quest_74, $quest_75, $quest_76, $quest_77;

    public $quest_49, $quest_50, $quest_51, $quest_52, $quest_53, $quest_54, $quest_55, $quest_56, $quest_57, $quest_58, $quest_62, $quest_63, $quest_92, $quest_93, $quest_94, $quest_95, $quest_96, $quest_97, $quest_98, $quest_99, $quest_100, $quest_101, $quest_102, $quest_103, $quest_104, $quest_105;

    public $quest_13, $quest_8, $quest_21, $quest_22;

    public $is_pep_text, $is_decision_text;


    /*Preguntas Internacionales*/

    public $quest_38, $quest_39, $quest_40, $quest_41, $quest_42, $quest_43, $quest_44, $quest_45;
    public $quest_59, $quest_60, $quest_61;

    /*Files*/

    public $manifestacion, $certificado_existencia, $rut, $cedula_rep, $licencia_medica, $curriculum_vitae, $certificado_bancaria, $certificado_oea, $certificado_laft, $certificado_iso, $certificado_politicas, $certificado_financiero, $certificado_comercial;

    public function mount($requests_form)
    {
        $this->requests_form = SanofiRequestForm::find($requests_form->sanofi_request_risk_id);

        $this->requests_risk = SanofiRequestRisk::find($requests_form->sanofi_request_risk_id);

        // Mount Jerarquies

        $this->ethichal = $requests_form->ethics;
        $this->hys = $requests_form->hys;
        $this->csr = $requests_form->csr;
        $this->csy = $requests_form->csy;
        $this->env = $requests_form->env;
        $this->csi = $requests_form->csi;

        //$rthis->requests_form = $requests_form;
        //$this->type_person = $type_person;
        $this->sanofi_provider = $requests_form->sanofi_provider;
        $this->quest_46 = $requests_form->quest_46;

        /**
         *
         *
         */

        $this->quest_1 = $requests_form->quest_1;
        $this->quest_3 = $requests_form->quest_3;
        $this->quest_4 = $requests_form->quest_4;
        $this->quest_5 = $requests_form->quest_5;
        $this->quest_6 = $requests_form->quest_6;
        $this->quest_8 = $requests_form->quest_8;
        $this->quest_9 = $requests_form->quest_9;
        $this->quest_10 = $requests_form->quest_10;
        $this->quest_16 = $requests_form->quest_16;
        $this->quest_11 = $requests_form->quest_11;
        $this->quest_12 = $requests_form->quest_12;
        $this->quest_14 = $requests_form->quest_14;
        $this->quest_15 = $requests_form->quest_15;
        $this->quest_17 = $requests_form->quest_17;
        $this->quest_18 = $requests_form->quest_18;
        $this->quest_19 = $requests_form->quest_19;
        $this->quest_21 = $requests_form->quest_21;
        $this->quest_22 = $requests_form->quest_22;
        $this->quest_27 = $requests_form->quest_27;
        $this->quest_28 = $requests_form->quest_28;
        $this->quest_29 = $requests_form->quest_29;
        $this->quest_30 = $requests_form->quest_30;
        $this->quest_31 = $requests_form->quest_31;
        $this->quest_32 = $requests_form->quest_32;
        $this->quest_36 = $requests_form->is_detraccion;
        $this->quest_92 = $requests_form->quest_92;
        $this->quest_96 = $requests_form->quest_96;
        $this->quest_93 = $requests_form->quest_93;
        $this->quest_94 = $requests_form->quest_94;
        $this->quest_95 = $requests_form->quest_95;
        $this->quest_97 = $requests_form->quest_97;
        $this->quest_98 = $requests_form->quest_98;
        $this->quest_99 = $requests_form->quest_99;
        $this->quest_100 = $requests_form->quest_100;
        $this->quest_101 = $requests_form->quest_101;
        $this->quest_102 = $requests_form->quest_102;
        $this->quest_46 = $requests_form->quest_46;
        $this->quest_47 = $requests_form->quest_47;
        $this->quest_40 = $requests_form->quest_40;
        $this->quest_41 = $requests_form->quest_41;
        $this->quest_42 = $requests_form->quest_42;
        $this->quest_43 = $requests_form->quest_43;
        $this->quest_44 = $requests_form->quest_44;
        $this->quest_45 = $requests_form->quest_45;
        $this->quest_59 = $requests_form->quest_59;
        $this->quest_60 = $requests_form->quest_60;
        $this->quest_61 = $requests_form->quest_61;
        $this->quest_49 = $requests_form->quest_49;
        $this->quest_50 = $requests_form->quest_50;
        $this->quest_51 = $requests_form->quest_51;
        $this->quest_52 = $requests_form->quest_52;
        $this->quest_53 = $requests_form->quest_53;
        $this->quest_54 = $requests_form->quest_54;
        $this->quest_55 = $requests_form->quest_55;
        $this->quest_56 = $requests_form->quest_56;
        $this->quest_57 = $requests_form->quest_57;
        $this->quest_58 = $requests_form->quest_58;
        $this->quest_103 = $requests_form->quest_103;
        $this->quest_104 = $requests_form->quest_104;
        $this->quest_75 = $requests_form->quest_75;
        $this->quest_76 = $requests_form->quest_76;
        $this->quest_77 = $requests_form->quest_77;

        $this->quest_24 = $this->requests_form->quest_24;
        $this->quest_71 = $this->requests_form->quest_71;
        $this->quest_71f = $this->requests_form->quest_71f;
        $this->quest_25 = $this->requests_form->quest_25;
        $this->quest_26 = $this->requests_form->quest_26;
        $this->quest_33 = $this->requests_form->quest_33;
        $this->quest_34 = $this->requests_form->quest_34;
        $this->quest_70 = $this->requests_form->quest_70;
        $this->quest_37 = $this->requests_form->quest_37;
        $this->quest_73 = $this->requests_form->quest_73;
        $this->quest_73_add = $this->requests_form->quest_73_add;
        $this->quest_74 = $this->requests_form->quest_74;
        $this->quest_48 = $this->requests_form->quest_48;
        $this->quest_48f = $this->requests_form->quest_48f;
        $this->quest_72 = $this->requests_form->quest_72;
        $this->quest_64 = $this->requests_form->quest_64;
        $this->quest_64f = $this->requests_form->quest_64f;
        $this->quest_65 = $this->requests_form->quest_65;
        $this->quest_65f = $this->requests_form->quest_65f;
        $this->quest_66 = $this->requests_form->quest_66;
        $this->quest_67 = $this->requests_form->quest_67;
        $this->quest_68 = $this->requests_form->quest_68;
        $this->quest_68f = $this->requests_form->quest_68f;
        $this->quest_72F = $this->requests_form->quest_72F;

        /*Saving CSR

        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_1 = $this->requests_form->csi_1;
        **/

        /*Saving CSI **/
        $this->csi_1 = $this->requests_form->csi_1;
        $this->csi_2 = $this->requests_form->csi_2;
        $this->csi_3 = $this->requests_form->csi_3;
        $this->csi_4 = $this->requests_form->csi_4;
        $this->csi_5 = $this->requests_form->csi_5;
        $this->csi_6 = $this->requests_form->csi_6;
        $this->csi_7 = $this->requests_form->csi_7;
        $this->csi_8 = $this->requests_form->csi_8;


        /*Saving CSI **/
        $this->csr_1 = $this->requests_form->csr_1;
        $this->csr_2 = $this->requests_form->csr_2;
        $this->csr_3 = $this->requests_form->csr_3;
        $this->csr_4 = $this->requests_form->csr_4;
        $this->csr_5 = $this->requests_form->csr_5;
        $this->csr_6 = $this->requests_form->csr_6;
        $this->csr_7 = $this->requests_form->csr_7;
        $this->csr_8 = $this->requests_form->csr_8;


        $this->csr_9 = $this->requests_form->csr_9;
        $this->csr_10 = $this->requests_form->csr_10;
        $this->csr_11 = $this->requests_form->csr_11;

        /*Saving ENV **/
        $this->env_1 = $this->requests_form->env_1;
        $this->env_2 = $this->requests_form->env_2;
        $this->env_3 = $this->requests_form->env_3;
        $this->env_4 = $this->requests_form->env_4;
        $this->env_5 = $this->requests_form->env_5;
        $this->env_6 = $this->requests_form->env_6;
        $this->env_7 = $this->requests_form->env_7;
        $this->env_8 = $this->requests_form->env_8;

        /*Saving HYS **/
        $this->hys_1 = $this->requests_form->hys_1;
        $this->hys_2 = $this->requests_form->hys_2;
        $this->hys_3 = $this->requests_form->hys_3;
        $this->hys_4 = $this->requests_form->hys_4;
        $this->hys_5 = $this->requests_form->hys_5;
        $this->hys_6 = $this->requests_form->hys_6;
        $this->hys_7 = $this->requests_form->hys_7;
        $this->hys_8 = $this->requests_form->hys_8;

        /*Saving CSY **/

        $this->csy_1 = $this->requests_form->csy_1;

        $this->quest_68 == 0 ? $this->is_quest_68 = 0 : $this->is_quest_68 = 1;
        $this->quest_72 == 0 ? $this->is_quest_72 = 0 : $this->is_quest_72 = 1;
        $this->quest_65 == 0 ? $this->is_quest_65 = 0 : $this->is_quest_65 = 1;
        $this->quest_64 == 0 ? $this->is_quest_64 = 0 : $this->is_quest_64 = 1;
        $this->quest_48 == 0 ? $this->is_quest_48 = 0 : $this->is_quest_48 = 1;
        $this->quest_38 == 0 ? $this->is_quest_38 = 0 : $this->is_quest_38 = 1;
        $this->quest_34 == 0 ? $this->is_quest_34 = 0 : $this->is_quest_34 = 1;
        $this->quest_26 == 0 ? $this->is_quest_26 = 0 : $this->is_quest_26 = 1;
        $this->is_detraccion_check != 1 ? $this->is_detraccion_check = 1 : $this->is_detraccion_check = 0;

        /*Documentacion* */
        $this->certificado_existencia = $requests_form->certificado_existencia;
        $this->rut = $requests_form->rut;
        $this->cedula_rep = $requests_form->cedula_rep;
        $this->licencia_medica = $requests_form->licencia_medica;
        $this->curriculum_vitae = $requests_form->curriculum_vitae;
        $this->certificado_bancaria = $requests_form->certificado_bancaria;
        $this->certificado_oea = $requests_form->certificado_oea;
        $this->certificado_laft = $requests_form->certificado_laft;
        $this->certificado_iso = $requests_form->certificado_iso;
        $this->certificado_politicas = $requests_form->certificado_politicas;
        $this->certificado_financiero = $requests_form->certificado_financiero;
        $this->certificado_comercial = $requests_form->certificado_comercial;


    }

    public function render()
    {
    	$influences = SanofiInfluence::all();
        $academic_degrees = SanofiAcademicDegree::all();
        $academic_positions = SanofiAcademicPosition::all();
        $adwars = SanofiHasAward::all();
        $books = SanofiHasBook::all();
        $conferences = SanofiHasConference::all();
        $posters = SanofiHasPoster::all();
        $publications = SanofiHasPublication::all();
        $medical_especilities = SanofiMedicalSpeciality::all();
        $member_investigators = SanofiMemberInvestigator::all();
        $member_society = SanofiMemberSociety::all();
        $money = CurrentType::all();
    	$countries = SanofiHomologationCountry::all();
        //$type_homologation = SanofiHomologationType::all();
    	$paises = Country::all();
        $providers = SanofiProvider::all();
        $document_types = InspektorDocumentType::all();


    	return view('livewire.sanofi', compact(
        	'countries',
        	'paises',
            'providers',
            'document_types',
            'money',
            'medical_especilities',
            'academic_degrees',
            'member_investigators',
            'academic_positions',
            'member_society',
            'publications',
            'posters',
            'books',
            'conferences',
            'adwars',
            'influences'
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
            'email_auth' => 'required|email|in:' . $this->requests_risk->provider_email,
        ],[
            'password.required' => 'Para continuar, debe agregar la contraseña suministrada',
            'password.in' => 'La contraseña ingresada es incorrecta',
            'email_auth.required' => 'Para continuar, debe agregar el correo electrónico',
            'email_auth.email' => 'El correo electrónico ingresado no es válido',
            'email_auth.in' => 'El correo electrónico ingresado no es válido'
        ]);

        if($this->requests_risk->terminos_question == 1){
            $this->currentStep = 1;
        }else{
            $this->currentStep = 2;
        }

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
            'sanofi_provider' => 'required',
            'country_homologation' => 'required',
            'type_person' => 'required',
            'multiple_select_country' => 'required'
        ],[
            'sanofi_provider.required' => 'Seleccione un tipo de proveedor',
            'country_homologation.required' => 'Seleccione un país',
            'type_person.required' => 'Seleccione un tipo de Persona',
            'multiple_select_country.required' => 'Seleccione un respusta'
        ]);

        /*Validate if is_International*/
        if($this->country_homologation != 1 and $this->country_homologation != 5 and $this->country_homologation != 3){
            $this->is_international = 1;
        }else{
            switch ($this->country_homologation) {
                case 1:
                    if(in_array(3,$this->multiple_select_country) || in_array(4,$this->multiple_select_country))
                        $this->is_international = 1;
                    break;
                case 3:
                    if(in_array(1,$this->multiple_select_country) || in_array(3,$this->multiple_select_country))
                        $this->is_international = 1;

                    break;
                case 5:
                    if(in_array(1,$this->multiple_select_country) || in_array(4,$this->multiple_select_country))
                        $this->is_international = 1;

                    break;
                default:
                    # code...
                    break;
            }
        }

        /*Validate Countries Vars*/
        in_array(1,$this->multiple_select_country) ? $this->is_co = 1 : $this->is_co = 0;
        in_array(3,$this->multiple_select_country) ? $this->is_pe = 1 : $this->is_pe = 0;
        in_array(5,$this->multiple_select_country) ? $this->is_ec = 1 : $this->is_ec = 0;

        $multiple = implode(",", $this->multiple_select_country);

        $this->requests_form->sanofi_provider  = $this->sanofi_provider;
        $this->requests_form->country_homologation = $this->country_homologation;
        $this->requests_form->multiple_select_country = $multiple;

        $this->requests_form->save();

        if($this->requests_risk->terminos_question == 1){
            $this->currentStep = 3;
        }else{
            $this->currentStep = 4;
        }

    }

    public function thirdStepSubmit()
    {
        /*STEP LEGAL INFO*/

        $validatedData = $this->validate([
            'check_genfar_1' => 'accepted',
            'check_genfar_2' => 'required_if:sanofi_provider,3|required_if:sanofi_provider,4',
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
        if($this->sanofi_provider == 1 || $this->sanofi_provider == 4 || $this->sanofi_provider == 5){
            $validatedOnly = $this->validate([
                'quest_3' => 'required|max:30',
                'quest_4' => 'required|max:30',
                'quest_5' => 'required_if:sanofi_provider,1',
                'quest_6' => 'required_if:sanofi_provider,4|required_if:sanofi_provider,5',
                'quest_9' => 'required|max:30',
                'quest_10' => 'required_if:is_co,1|required_if:is_pe,1|max:30',
                'quest_16' => 'required_if:is_co,1|required_if:is_pe,1',
                'quest_11' => 'required|max:100',
                'quest_12' => 'required|max:30',
                'quest_14' => 'required',
                'quest_15' => 'required',
                'quest_17' => 'required|max:30',
                'quest_18' => 'required|max:30',
                'quest_19' => 'required',
                //'quest_27' => 'required|max:30',
                'quest_28' => 'required|max:30',
                'quest_29' => 'required|max:100',
                'quest_30' => 'required|max:30',
                'quest_31' => 'required|max:30',
                'quest_32' => 'required_if:is_pe,1|max:30',
                //'quest_36' => 'required_if:is_pe,1|max:30',
                'is_detraccion' => 'required_if:is_pe,1|max:30',
                'quest_96' => 'required_if:is_detraccion,1|max:30',
                'quest_92' => 'required_if:is_detraccion,1|max:30',
                'quest_93' => 'required_if:is_detraccion,1|max:30',
                'quest_94' => 'required_if:is_detraccion,1|max:30',
                'quest_95' => 'required_if:is_detraccion,1|max:30',
                'quest_97' => 'required_if:is_detraccion,1|max:30',
                'quest_98' => 'required_if:is_detraccion,1|max:30',
                'quest_99' => 'required_if:is_detraccion,1|max:30',
                'quest_100' => 'required_if:is_detraccion,1|max:30',
                'quest_101' => 'required_if:is_detraccion,1|max:30',
                'quest_102' => 'required_if:is_detraccion,1|max:30',
                'quest_46' => 'required|max:30',
                'quest_47' => 'required',
                'quest_38' => 'required_if:is_international,1',
                'quest_40' => 'required_if:is_international,1|max:30',
                'quest_41' => 'required_if:is_international,1|max:30',
                'quest_42' => 'required_if:is_international,1',
                'quest_43' => 'required_if:is_international,1|max:30',
                'quest_44' => 'required_if:is_international,1|max:30',
                'quest_45' => 'required_if:is_international,1|max:30',
                'quest_59' => 'required|max:30',
                'quest_60' => 'required|max:30',
                'quest_61' => 'required|max:30',
                'quest_49' => 'required',
                'quest_50' => 'required',
                'quest_51' => 'required|max:30',
                'quest_52' => 'required|max:30',
                'quest_53' => 'required|max:30',
                'quest_54' => 'required|max:30',
                'quest_55' => 'required',
                'quest_56' => 'required',
                'quest_57' => 'required',
                'quest_58' => 'required',
                'quest_103' => 'required',
                'quest_104' => 'required'
            ]);

        }elseif($this->sanofi_provider == 3 || $this->sanofi_provider == 6){
            $validatedOnly = $this->validate([
                'quest_1' => 'required|max:30',
                'quest_3' => 'required|max:30',
                'quest_4' => 'required|max:30',
                'quest_5' => 'required_if:sanofi_provider,6',
                'quest_6' => 'required_if:sanofi_provider,3',
                'quest_8' => 'required|max:30', // 8 or 9
                'quest_10' => 'required_if:is_co,1',
                'quest_11' => 'required|max:30',
                'quest_12' => 'required|max:30', //12 or 24
                'quest_14' => 'required',
                'quest_15' => 'required_if:sanofi_provider,6',
                'quest_17' => 'required_if:sanofi_provider,6|max:30',
                'quest_18' => 'required_if:sanofi_provider,6|max:30',
                'quest_19' => 'required_if:sanofi_provider,6',
                'quest_16' => 'required_if:is_co,1|required_if:is_pa,1',
                'quest_21' => 'required_if:sanofi_provider,3|max:30',
                'quest_22' => 'required',
                //'quest_27' => 'required|max:30',
                'quest_28' => 'required|max:30',
                'quest_29' => 'required|max:30',
                'quest_30' => 'required',
                'quest_31' => 'required|max:30',
                'quest_32' => 'required_if:is_pe,1|max:30',
                //'quest_36' => 'required_if:is_pe,1|max:30',
                'is_detraccion' => 'required_if:is_pe,1|max:30',
                'quest_96' => 'required_if:is_detraccion,1|max:30',
                'quest_92' => 'required_if:is_detraccion,1|max:30',
                'quest_93' => 'required_if:is_detraccion,1|max:30',
                'quest_94' => 'required_if:is_detraccion,1|max:30',
                'quest_95' => 'required_if:is_detraccion,1|max:30',
                'quest_97' => 'required_if:is_detraccion,1|max:30',
                'quest_98' => 'required_if:is_detraccion,1|max:30',
                'quest_99' => 'required_if:is_detraccion,1|max:30',
                'quest_100' => 'required_if:is_detraccion,1|max:30',
                'quest_101' => 'required_if:is_detraccion,1|max:30',
                'quest_102' => 'required_if:is_detraccion,1|max:30',
                'quest_38' => 'required_if:is_international,1',
                'quest_40' => 'required_if:is_international,1|max:30',
                'quest_41' => 'required_if:is_international,1|max:30',
                'quest_42' => 'required_if:is_international,1|max:30',
                'quest_43' => 'required_if:is_international,1|max:30',
                'quest_44' => 'required_if:is_international,1|max:30',
                'quest_45' => 'required_if:is_international,1|max:30'
            ]);

        }elseif($this->sanofi_provider == 2) {
            $validatedOnly = $this->validate([
                'quest_5' => 'required',
                'quest_75' => 'required',
                'quest_9' => 'required',
                'quest_11' => 'required',
                'quest_4' => 'required',
                'quest_3' => 'required',
                'quest_76' => 'required',
                'quest_12' => 'required',
                'quest_77' => 'required',
                'quest_13' => 'required'
            ]);
        }

        if($this->ethichal == 1) {
            if($this->type_person == 1){
                $validated = $this->validate([
//                  'quest_70' => 'required_if:is_quest_34,1',
                    'quest_73' => 'required',
                    'quest_73_add' => 'required_if:quest_73,1',
                    'quest_72' => 'required',
                    'quest_72F' => 'required_if:quest_72,1',
                    'quest_64' => 'required',
                    'quest_64f' => 'required_if:quest_64,1',
                    'quest_69' => 'required',
                    'quest_37' => 'required',
                    'quest_68' => 'required',
                    'quest_68f' => 'required_if:quest_68,1'
                ]);
            }elseif($this->type_person == 2){
                $validated= $this->validate([
                    'quest_24' => 'required',
                    'quest_71' => 'required',
                    'quest_71f' => 'required',
                    'quest_25' => 'required',
                    'quest_26' => 'required',
                    'quest_33' => 'required_if:quest_26,1',
                    'quest_34' => 'required',
                    'quest_70' => 'required_if:quest_34,1',
                    'quest_37' => 'required_if:quest_34,0',
                    'quest_73' => 'required',
                    'quest_73_add' => 'required_if:quest_73,1',
                    'quest_74' => 'required',
                    'quest_48' => 'required',
                    'quest_48f' => 'required_if:quest_48,1',
                    'quest_72' => 'required',
                    'quest_72F' => 'required_if:quest_72,1',
                    'quest_64' => 'required',
                    'quest_64f' => 'required_if:quest_64,1',
                    'quest_65' => 'required',
                    'quest_65f' => 'required_if:quest_65,1',
                    'quest_66' => 'required',
                    'quest_67' => 'required',
                    'quest_68' => 'required',
                    'quest_68f' => 'required_if:quest_68,1',
                    'quest_69' => 'required'
                ]);
            }
        }

        if($this->csi == 1) {
            $validated = $this->validate([
                'csi_1' => 'required',
                'csi_2' => 'required',
                'csi_3' => 'required',
                'csi_4' => 'required',
                'csi_5' => 'required',
                'csi_6' => 'required',
                'csi_7' => 'required',
                'csi_8' => 'required'
            ]);
        }

        if($this->csr == 1) {
            $validated = $this->validate([
                'csr_1' => 'required',
                'csr_2' => 'required',
                'csr_3' => 'required',
                'csr_4' => 'required',
                'csr_5' => 'required',
                'csr_6' => 'required',
                'csr_7' => 'required',
                'csr_8' => 'required',
                'csr_9' => 'required',
                'csr_10' => 'required',
                'csr_11' => 'required'
            ]);
        }

        if($this->hys == 1) {
            $validated = $this->validate([
                'hys_1' => 'required',
                'hys_2' => 'required',
                'hys_3' => 'required',
                'hys_4' => 'required',
                'hys_5' => 'required',
                'hys_6' => 'required',
                'hys_7' => 'required',
                'hys_8' => 'required'
            ]);
        }

        if($this->env == 1) {
            $validated = $this->validate([
                'env_1' => 'required',
                'env_2' => 'required',
                'env_3' => 'required',
                'env_4' => 'required',
                'env_5' => 'required',
                'env_6' => 'required',
                'env_7' => 'required',
                'env_8' => 'required'
            ]);
        }

        if($this->csy == 1) {
            $validated = $this->validate([
                'csy_1' => 'required'
            ]);
        }

        /**
         * Saving Data Form
         *
         * **/

        if($this->sanofi_provider == 1 || $this->sanofi_provider == 2 || $this->sanofi_provider == 6 ){
            $this->requests_form->name = $this->quest_5;
        }elseif ($this->sanofi_provider == 3 || $this->sanofi_provider == 4 || $this->sanofi_provider == 5 ) {
            $this->requests_form->name = $this->quest_6;
        }

        if($this->sanofi_provider == 1 || $this->sanofi_provider == 2 || $this->sanofi_provider == 4 || $this->sanofi_provider == 5 ){
            $this->requests_form->document = $this->quest_9;
        }elseif ($this->sanofi_provider == 3 || $this->sanofi_provider == 6 ) {
            $this->requests_form->document = $this->quest_8;
        }

        $this->requests_form->country_homologation = $this->country_homologation;
        $this->requests_form->quest_1 = $this->quest_1;
        $this->requests_form->quest_3 = $this->quest_3;
        $this->requests_form->quest_4 = $this->quest_4;
        $this->requests_form->quest_5 = $this->quest_5;
        $this->requests_form->quest_6 = $this->quest_6;
        $this->requests_form->quest_8 = $this->quest_8;
        $this->requests_form->quest_9 = $this->quest_9;
        $this->requests_form->quest_10 = $this->quest_10;
        $this->requests_form->quest_16 = $this->quest_16;
        $this->requests_form->quest_11 = $this->quest_11;
        $this->requests_form->quest_12 = $this->quest_12;
        $this->requests_form->quest_13 = $this->quest_13;
        $this->requests_form->quest_14 = $this->quest_14;
        $this->requests_form->quest_15 = $this->quest_15;
        $this->requests_form->quest_17 = $this->quest_17;
        $this->requests_form->quest_18 = $this->quest_18;
        $this->requests_form->quest_19 = $this->quest_19;
        $this->requests_form->quest_21 = $this->quest_21;
        $this->requests_form->quest_22 = $this->quest_22;
        $this->requests_form->quest_27 = $this->quest_27;
        $this->requests_form->quest_28 = $this->quest_28;
        $this->requests_form->quest_29 = $this->quest_29;
        $this->requests_form->quest_30 = $this->quest_30;
        $this->requests_form->quest_31 = $this->quest_31;
        $this->requests_form->quest_32 = $this->quest_32;
        $this->requests_form->quest_36 = $this->is_detraccion;
        $this->requests_form->quest_92 = $this->quest_92;
        $this->requests_form->quest_96 = $this->quest_96;
        $this->requests_form->quest_93 = $this->quest_93;
        $this->requests_form->quest_94 = $this->quest_94;
        $this->requests_form->quest_95 = $this->quest_95;
        $this->requests_form->quest_97 = $this->quest_97;
        $this->requests_form->quest_98 = $this->quest_98;
        $this->requests_form->quest_99 = $this->quest_99;
        $this->requests_form->quest_100 = $this->quest_100;
        $this->requests_form->quest_101 = $this->quest_101;
        $this->requests_form->quest_102 = $this->quest_102;
        $this->requests_form->quest_46 = $this->quest_46;
        $this->requests_form->quest_47 = $this->quest_47;
        $this->requests_form->quest_40 = $this->quest_40;
        $this->requests_form->quest_41 = $this->quest_41;
        $this->requests_form->quest_42 = $this->quest_42;
        $this->requests_form->quest_43 = $this->quest_43;
        $this->requests_form->quest_44 = $this->quest_44;
        $this->requests_form->quest_45 = $this->quest_45;
        $this->requests_form->quest_59 = $this->quest_59;
        $this->requests_form->quest_60 = $this->quest_60;
        $this->requests_form->quest_61 = $this->quest_61;
        $this->requests_form->quest_49 = $this->quest_49;
        $this->requests_form->quest_50 = $this->quest_50;
        $this->requests_form->quest_51 = $this->quest_51;
        $this->requests_form->quest_52 = $this->quest_52;
        $this->requests_form->quest_53 = $this->quest_53;
        $this->requests_form->quest_54 = $this->quest_54;
        $this->requests_form->quest_55 = $this->quest_55;
        $this->requests_form->quest_56 = $this->quest_56;
        $this->requests_form->quest_57 = $this->quest_57;
        $this->requests_form->quest_58 = $this->quest_58;
        $this->requests_form->quest_103 = $this->quest_103;
        $this->requests_form->quest_104 = $this->quest_104;
        $this->requests_form->quest_75 = $this->quest_75;
        $this->requests_form->quest_76 = $this->quest_76;
        $this->requests_form->quest_77 = $this->quest_77;

        /*Saving Ethics * */
        $this->requests_form->quest_24 = $this->quest_24;
        $this->requests_form->quest_71  = $this->quest_71;
        $this->requests_form->quest_71f  = $this->quest_71f;
        $this->requests_form->quest_25  = $this->quest_25;
        $this->requests_form->quest_26  = $this->quest_26;
        $this->requests_form->quest_33  = $this->quest_33;
        $this->requests_form->quest_34  = $this->quest_34;
        $this->requests_form->quest_70  = $this->quest_70;
        $this->requests_form->quest_37  = $this->quest_37;
        $this->requests_form->quest_73  = $this->quest_73;
        $this->requests_form->quest_73_add  = $this->quest_73_add;
        $this->requests_form->quest_74  = $this->quest_74;
        $this->requests_form->quest_48  = $this->quest_48;
        $this->requests_form->quest_48f  = $this->quest_48f;
        $this->requests_form->quest_72  = $this->quest_72;
        $this->requests_form->quest_64  = $this->quest_64;
        $this->requests_form->quest_64f  = $this->quest_64f;
        $this->requests_form->quest_65  = $this->quest_65;
        $this->requests_form->quest_65f  = $this->quest_65f;
        $this->requests_form->quest_66  = $this->quest_66;
        $this->requests_form->quest_67  = $this->quest_67;
        $this->requests_form->quest_68  = $this->quest_68;
        $this->requests_form->quest_68f  = $this->quest_68f;
        $this->requests_form->quest_69  = $this->quest_69;
        $this->requests_form->quest_72F = $this->quest_72F;

        /*Saving CSI **/

        $this->requests_form->csi_1 = $this->csi_1;
        $this->requests_form->csi_2 = $this->csi_2;
        $this->requests_form->csi_3 = $this->csi_3;
        $this->requests_form->csi_4 = $this->csi_4;
        $this->requests_form->csi_5 = $this->csi_5;
        $this->requests_form->csi_6 = $this->csi_6;
        $this->requests_form->csi_7 = $this->csi_7;
        $this->requests_form->csi_8 = $this->csi_8;

        /*Saving CSR **/
        $this->requests_form->csr_1 = $this->csr_1;
        $this->requests_form->csr_2 = $this->csr_2;
        $this->requests_form->csr_3 = $this->csr_3;
        $this->requests_form->csr_4 = $this->csr_4;
        $this->requests_form->csr_5 = $this->csr_5;
        $this->requests_form->csr_6 = $this->csr_6;
        $this->requests_form->csr_7 = $this->csr_7;
        $this->requests_form->csr_8 = $this->csr_8;
        $this->requests_form->csr_9 = $this->csr_9;
        $this->requests_form->csr_10 = $this->csr_10;
        $this->requests_form->csr_11 = $this->csr_11;

        /*Saving ENV **/
        $this->requests_form->env_1 = $this->env_1;
        $this->requests_form->env_2 = $this->env_2;
        $this->requests_form->env_3 = $this->env_3;
        $this->requests_form->env_4 = $this->env_4;
        $this->requests_form->env_5 = $this->env_5;
        $this->requests_form->env_6 = $this->env_6;
        $this->requests_form->env_7 = $this->env_7;
        $this->requests_form->env_8 = $this->env_8;

        /*Saving HYS **/
        $this->requests_form->hys_1 = $this->hys_1;
        $this->requests_form->hys_2 = $this->hys_2;
        $this->requests_form->hys_3 = $this->hys_3;
        $this->requests_form->hys_4 = $this->hys_4;
        $this->requests_form->hys_5 = $this->hys_5;
        $this->requests_form->hys_6 = $this->hys_6;
        $this->requests_form->hys_7 = $this->hys_7;
        $this->requests_form->hys_8 = $this->hys_8;

        /*Saving CSY **/

        $this->requests_form->csy_1 = $this->csy_1;
        $this->requests_form->save();

        $this->currentStep = 5;
    }

    // public function eliminarArchivoComportamiento($id)
    // {
    //     switch ($id) {
    //         case 1:
    //             //$this->requests_form->certificado_existencia = NULL;
    //             $this->certificado_existencia = NULL;
    //             //$this->requests_form->certificado_existencia == NULL ? $this->certificado_existencia = NULL : $this->certificado_existencia = $this->certificado_existencia;
    //             //$this->certificado_existencia = NULL;
    //             $this->requests_form->save();
    //             break;
            
    //         default:
    //             # code...
    //             break;
    //     }

        

    //     //DD($this->requests_form->certificado_existencia);
        
    // }

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

                /*
                $validatedDate = $this->validate([
                    'full_name.0' => 'required|min:6',
                    'bf_type_person.0' => 'required|min:6',
                    'bf_document.0' => 'required',
                    'bf_nit.0' => 'required|min:6',
                    'bf_control.0' => 'required|min:6',
                    'bf_country_birth.0' => 'required',
                    'bf_sex' => 'required',
                    'bf_country_birth.0' => 'required',
                    'bf_country_home.0' => 'required|min:6',
                    'bf_country_fiscal.0' => 'required|min:6',
                    'bf_charge.0' => 'required|min:6',
                    'bf_place_work.0' => 'required|min:6',
                    'bf_telephone.0' => 'required|min:6',
                    'bf_email.0' => 'required|min:6',
                    'bf_address_work.0' => 'required|min:6',
                    'bf_address_home.0' => 'required|min:6',
                    'bf_pep_time.0' => 'required|min:6',
                    'bf_pep_charge.0' => 'required|min:6',
                    'coincidence_country.0' => 'required'
                ],
                [
                    'full_name.0' => 'required|min:6',
                    'bf_type_person.0' => 'required|min:6',
                    'bf_document.0' => 'required',
                    'bf_nit.0' => 'required|min:6',
                    'bf_control.0' => 'required|min:6',
                    'bf_country_birth.0' => 'required',
                    'bf_sex' => 'required',
                    'bf_country_birth.0' => 'required',
                    'bf_country_home.0' => 'required|min:6',
                    'bf_country_fiscal.0' => 'required|min:6',
                    'bf_charge.0' => 'required|min:6',
                    'bf_place_work.0' => 'required|min:6',
                    'bf_telephone.0' => 'required|min:6',
                    'bf_email.0' => 'required|min:6',
                    'bf_address_work.0' => 'required|min:6',
                    'bf_address_home.0' => 'required|min:6',
                    'bf_pep_time.0' => 'required|min:6',
                    'bf_pep_charge.0' => 'required|min:6',
                    'coincidence_country.0' => 'required'
                ]);
                */

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
        /* Validación RUT */
        $validatedOnly = $this->validate([
            'rut' => 'required'
        ]);


        if($this->sanofi_provider != 3){
            $validatedOnly = $this->validate([
                'certificado_existencia' => 'required'
            ]);
        }elseif($this->sanofi_provider == 3 || $this->sanofi_provider == 4){
            $validatedOnly = $this->validate([
                'cedula_rep' => 'required_if:sanofi_provider,2|required_if:sanofi_provider,3',
                'curriculum_vitae' => 'required_if:sanofi_provider,2',
            ]);
        }


                /* ADD RUT FILE */

        $rut = $this->rut;
        $fileReporteName = $this->requests_form->id.'-3002-Documento de Identidad.'.$rut->getClientOriginalExtension();
        $this->requests_form->update(['rut' => $this->rut->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);



        if($this->sanofi_provider != 3)
        {
            /* ADD CERTIFICADO_EXISTENCIA FILE */
            $certificado_existencia = $this->certificado_existencia;
            $fileReporteName = $this->requests_form->id.'-3001-Certificación de Existencia.'.$certificado_existencia->getClientOriginalExtension();
            $this->requests_form->update(['certificado_existencia' => $this->certificado_existencia->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);

            /* ADD RUT FILE */

            $rut = $this->rut;
            $fileReporteName = $this->requests_form->id.'-3002-Documento de Identidad.'.$rut->getClientOriginalExtension();
            $this->requests_form->update(['rut' => $this->rut->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);

            /* ADD CERTIFICADO_BANCARIO FILE */
            $certificado_bancaria = $this->certificado_bancaria;
            $fileReporteName = $this->requests_form->id.'-5001-Certificación Bancaria.'.$certificado_bancaria->getClientOriginalExtension();
            $this->requests_form->update(['certificado_bancaria' => $this->certificado_bancaria->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);

        }elseif ($this->sanofi_provider == 3 || $this->sanofi_provider == 4){

            /* ADD CEDULA_REP_LEGAL FILE */
            $cedula_rep = $this->cedula_rep;
            $fileReporteName = 'CEDULA_REP_LEGAL'.'.'.$cedula_rep->getClientOriginalExtension();
            $this->requests_form->update(['cedula_rep' => $this->cedula_rep->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);

            if($this->sanofi_provider == 4){
                /* ADD LICENCIA_MEDICA FILE */
                if(!is_null($this->licencia_medica)){
                    $licencia_medica = $this->licencia_medica;
                    $fileReporteName = $this->requests_form->id.'-3005-Licencia Médica.'.$licencia_medica->getClientOriginalExtension();
                    $this->requests_form->update(['licencia_medica' => $this->licencia_medica->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
                }

                /* ADD CURRICULUM_VITAE FILE */
                $curriculum_vitae = $this->curriculum_vitae;
                $fileReporteName = $this->requests_form->id.'-3004-Curriculum Vitae.'.$curriculum_vitae->getClientOriginalExtension();
                $this->requests_form->update(['curriculum_vitae' => $this->curriculum_vitae->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
        }

        if($this->is_co == 1){

            /* ADD CERTIFICADO_OEA FILE */
            if(!is_null($this->certificado_oea)){
                $certificado_oea = $this->certificado_oea;
                $fileReporteName = $this->requests_form->id.'-6001-Certificado OEA'.$certificado_oea->getClientOriginalExtension();
                $this->requests_form->update(['certificado_oea' => $this->certificado_oea->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
            /* ADD CERTIFICADO_LAFT FILE */
            if(!is_null($this->certificado_laft)){
                $certificado_laft = $this->certificado_laft;
                $fileReporteName = $this->requests_form->id.'-9004-Certificación LAFT.'.$certificado_laft->getClientOriginalExtension();
                $this->requests_form->update(['certificado_laft' => $this->certificado_laft->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
            /* ADD CERTIFICADO_ISO FILE */
            if(!is_null($this->certificado_iso)){
                $certificado_iso = $this->certificado_iso;
                $fileReporteName = $this->requests_form->id.'-9003-Certificación ISO.'.$certificado_iso->getClientOriginalExtension();
                $this->requests_form->update(['certificado_iso' => $this->certificado_iso->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
            /* ADD CERTIFICADO_POLITICAS FILE */
            if(!is_null($this->certificado_politicas)){
                $certificado_politicas = $this->certificado_politicas;
                $fileReporteName = $this->requests_form->id.'-9005-Certificación Políticas.'.$certificado_politicas->getClientOriginalExtension();
                $this->requests_form->update(['certificado_politicas' => $this->certificado_politicas->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
            /* ADD CERTIFICADO_FINANCIERO FILE */
            if(!is_null($this->certificado_financiero)){
                $certificado_financiero = $this->certificado_financiero;
                $fileReporteName = $this->requests_form->id.'-9001-Certificación Financiera.'.$certificado_financiero->getClientOriginalExtension();
                $this->requests_form->update(['certificado_financiero' => $this->certificado_financiero->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
            /* ADD CERTIFICADO_COMERCIAL FILE */
            if(!is_null($this->certificado_comercial)){
                $certificado_comercial = $this->certificado_comercial;
                $fileReporteName = $this->requests_form->id.'-9002-Certificación Comercial'.$certificado_comercial->getClientOriginalExtension();
                $this->requests_form->update(['certificado_comercial' => $this->certificado_comercial->storeAs('GENFAR/PROVIDER/'.$this->requests_form->id, $fileReporteName ,'local')]);
            }
        }



        self::submitForm();


    }


        /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitForm()
    {
        $fecha_hoy = Carbon::now();

        $fecha_llegada = self::verifyAviabilityDate($fecha_hoy);
        $fecha_llegada_s = $fecha_llegada->format('Y-m-d H:i:s');
        $this->requests_form->password = "GENFAR".$this->requests_form->id;

//        $this->requests_risk->status = 4;

        //$this->requests_risk->save();
        $this->requests_form->save();

        /*
            foreach ($this->requests_form as $object) {
                $object->save();
            }

            'name', 'document', 'date_homologation','status','users_id','codsolicitud',
            'sanofi_provider', 'multiple_select_country', 'is_pep'

            SanofiRequestForm::create([
                'name' => $this->name,
                'amount' => $this->amount,
                'description' => $this->description,
                'stock' => $this->stock,
                'status' => $this->status,
            ]);
            //'name', 'document', 'date_homologation','status','users_id','codsolicitud'
        */


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
