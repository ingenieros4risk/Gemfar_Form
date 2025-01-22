<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Exports\SanofiRequestRiskExport;
use App\Exports\GenfarFormsExport;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiRequestStatus;
use App\Models\Sanofi\SanofiProvider;
use App\Models\Sanofi\RequestRiskStatus;
use App\Models\Sanofi\SanofiRequestType;
use App\Models\Sanofi\SanofiHacat;
use App\Models\Sanofi\SanofiRequestForm;
use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Sanofi\SanofiRequestRiskOld;
use App\Models\Sanofi\SanofiRequestOld;
use App\Models\Sanofi\BeneficialOwnership;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Inspektor\CurrentType;
use App\Models\User;
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
use App\Mail\SanofiRiskCreate;
use App\Mail\GenfarEthicSubmit;
use App\Mail\GenfarEthicPlan;
use App\Mail\GenfarEthicNotSubmit;
use App\Mail\GenfarCSRAlert;
use App\Mail\GenfarENVAlert;
use App\Mail\GenfarCSYAlert;
use App\Mail\GenfarHYSAlert;
use App\Mail\GenfarNotifyAll;
use App\Mail\GenfarSARLAFTAlert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\MailNotify;
use DB;

class SanofiRequestRiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $requests_risk = SanofiRequestRisk::all();

        foreach ($requests_risk as $key) {
            $user_solicitante = User::find($key->user_solicitante);

            $request_form = SanofiRequestForm::where('sanofi_request_risk_id', $key->id)->first();

            if(is_null($key->user_responsable)){
                $key->user_responsable = "Sin Asignar";
            }else{
                $user = User::find($key->user_responsable);
                $key->user_responsable = $user->name;
            }

            if(is_null($user_solicitante)){
                $key->user_responsable = "Sin Asignar";
            }else{
                $key->user_solicitante = $user_solicitante->name;
            }

            $provider = SanofiProvider::find($key->sanofi_provider);
            $provider ? $key->sanofi_provider = $provider->name : $key->sanofi_provider = "Sin Información";

            $hacat = SanofiHacat::find($key->hacat);
            $hacat ? $key->hacat = $hacat->name : $key->hacat = "";


            $status = SanofiRequestStatus::find($key->status_id);
            $key->status_id = $status->name;
            $key->class = $status->class;
            $key->status = $status->id;


            /*Evaluación CSR*/
            if($request_form->csr == 1 && $request_form->csr_comentario == null){
                $key->csr = ($request_form->csr_1 == 0 || $request_form->csr_2 == 0 ||
                $request_form->csr_3 == 0 || $request_form->csr_4 == 0 || $request_form->csr_5 == 0 ||
                $request_form->csr_6 == 0 || $request_form->csr_7 == 0 || $request_form->csr_9 == 0 ||
                $request_form->csr_10 == 0) ? 1 : 0;
            }


            /*Evaluación HYS*/
            if($request_form->hys == 1 && $request_form->hys_comentario == null && $key->request_type == "Homologación"){
                // $key->hys = ($request_form->hys_1 == 0 || $request_form->hys_2 == 1 || $request_form->hys_3 == 1 ||
                // $request_form->hys_4 == 1 || $request_form->hys_5 == 0 || $request_form->hys_6 == 0 ||
                // $request_form->hys_7 == 0 || $request_form->hys_8 == 0) ? 1 : 0;

                $key->hys = 0;
            }

            /*Evaluación CSY*/
            if($request_form->csy == 1 && $request_form->csy_comentario == null && $key->request_type == "Homologación"){
                $key->csy = $request_form->csy_1 == 0 ? 1 : 0;
            }
            /*Evaluación ENV*/
            if($request_form->env == 1 && $request_form->env_comentario == null && $key->request_type == "Homologación"){
                //$key->env = ($request_form->env_1 == 0 || $request_form->env_2 == 0 || $request_form->env_3 == 1 || $request_form->env_4 == 1 || $request_form->env_5 == 0 || $request_form->env_6 == 0 || $request_form->env_7 == 0 || $request_form->env_8 == 0) ? 1 : 0;
                $key->env = 0;
            }

            /*Evaluación ETHICHS*/
            if($request_form->ethics == 1 && $request_form->ebi_recomendacion != "Bandera(s)/señales de alerta adecuadamente mitigada(s)" && $key->request_type == "Homologación"){
                $key->ethics = $request_form->ethics;
            }

            /*Evaluación SARLAFT*/
            // if($request_form->sarlaft_comentario  == null && $key->request_type == "Homologación"){
                // $key->sarlaft =  ($request_form->coincidencia_laft == 1 || $request_form->antecedentes_disciplinarios == 1 || $request_form->antecedentes_penales == 1 || $request_form->antecedentes_fiscales == 1 || $request_form->coincidencia_pep == 1 || $request_form->coincidencia_listas == 1 || $request_form->coincidencia_fuentes == 1) ? 3 : 0;
            // }elseif($request_form->sarlaft_comentario != "APROBADO" && $key->request_type == "Homologación"){
                // $key->sarlaft = 1;
            // }else{
                // $key->sarlaft = 0;
            // }

			/*Evaluación SARLAFT*/
            if($request_form->sarlaft_comentario  == null){
                $key->sarlaft =  ($request_form->coincidencia_laft == 1 || $request_form->antecedentes_disciplinarios == 1 || $request_form->antecedentes_penales == 1 || $request_form->antecedentes_fiscales == 1 || $request_form->coincidencia_pep == 1 || $request_form->coincidencia_listas == 1 || $request_form->coincidencia_fuentes == 1) ? 3 : 0;
            }elseif($request_form->sarlaft_comentario != "APROBADO"){
                $key->sarlaft = 1;
            }else{
                $key->sarlaft = 0;
            }

            /* Evaluación Semáforo */
            $key->task_eprovedores = $key->csr+$key->hys+$key->csy+$key->env+$key->ethics+$key->sarlaft;

        }


        return view('dashboard.sanofi.request_risk.index', compact('requests_risk', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$form = SanofiRequestRisk::find($id);
        $hacats = SanofiHacat::all();
        $societies = SanofiHomologationCountry::all();
        $providers = SanofiProvider::all();
        $statusses = RequestRiskStatus::all();
        $types = SanofiRequestType::all();
        $countries = Country::all();
        return view('dashboard.sanofi.request_risk.create', compact( 'countries','societies', 'providers', 'statusses', 'types', 'hacats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getHacat($id)
    {
        if($id == 2){
            return SanofiHacat::where('category_b', 1)->pluck('name', 'id');
        }elseif($id == 3){
            return SanofiHacat::where('category_c_hcp', 1)->pluck('name', 'id');
        }elseif($id == 4 || $id == 5){
            return SanofiHacat::where('category_c_hco', 1)->pluck('name', 'id');
        }else{
            return SanofiHacat::all()->pluck('name', 'id');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'paises'             => 'required'
        ]);
        $input['paises'] = $request->input('paises');
        $request_risk = new SanofiRequestRisk();
        $request_risk->user_solicitante = $user->id;
        $request_risk->user_email = $user->email;
        $request_risk->provider_id = $request->input('provider_id');
        $request_risk->provider_name = $request->input('name_proveedor');
        $request_risk->provider_email = $request->input('email');
        $request_risk->provider_phone = $request->input('telefono');
        $request_risk->country_homologation = $request->input('country_homologation');
        $request_risk->observation = $request->input('observation');
        $request_risk->nacionality = $request->input('nacionality');
        $request_risk->sanofi_provider = $request->input('sanofi_provider');
        $request_risk->country_cpy = $request->input('country_cpy');
        $request_risk->request_type = $request->input('request_type');
        $request_risk->paises = json_encode($request->input('paises'));
        $request_risk->date_solicitud = Carbon::now();
        $request_risk->matriz_question = $request->input('matriz_question');
        $request_risk->terminos_question = $request->input('terminos_question');

        /* Validadores de Estado de Dependencias * */

        $sanofyHacat = SanofiHacat::find($request->hacat);

        $hys = $sanofyHacat->hys == 1 ? 1:0;
        $csr = $sanofyHacat->csr == 1 ? 1:0;
        $csy = $sanofyHacat->csy == 1 ? 1:0;
        $env = $sanofyHacat->env == 1 ? 1:0;
        $csi = $request->input('cadena_suministros');

        if($request_risk->matriz_question == 0){
            $request_risk->matriz_justification = $request->input('matriz_justification');
            $ethics = 0;
            $dda = 0;
        }else{
            $ethics = $sanofyHacat->ethics == 1 ? 1:0;
            $dda = $sanofyHacat->dda == 1 ? 1:0;
        }

        if($request_risk->sanofi_provider != 2){
            $request_risk->condicion_pago = $request->condicion_pago;
        }

        $request_risk->hacat = $request->hacat;
        $request_risk->nombre_comprador = $request->nombre_comprador;
        $request_risk->area_solicitante = $request->area_solicitante;
        $request_risk->status_id = 1;
        $request_risk->save();

        /* Agregar Aprobación de Compras */


        if($request->file('update_attachment_compras')){
            $fileReporte = $request->file('update_attachment_compras');
            $fileInformeName = $request_risk->id.'-Aprobacion-Compra.'.$fileReporte->getClientOriginalExtension();
            $request_risk->update(['aprobacion_compra' => $fileReporte->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName)]);
        }



        $request_form = new SanofiRequestForm([
            'sanofi_request_risk_id' => $request_risk->id,
            'password' => "G3NF4RR1SK" ,
            'quest_46' => $request->condicion_pago,
            'sanofi_provider' => $request_risk->sanofi_provider,
            'country_homologation' => $request_risk->country_homologation,
            'multiple_select_country' => $request_risk->paises,
            'ethics' => $ethics,
            'hys' => $hys,
            'csr' => $csr,
            'csy' => $csy,
            'csi' => $csi,
            'dda' => $dda,
            'env' => $env
        ]);

        $request_form->save();


        /*Adding files
        $fileReporte = $request->file('orden');
        $fileReporteName = 'OC-'.$request_risk->id.'.'.$fileReporte->getClientOriginalExtension();
        $request_risk->update(['purchase_order' => $fileReporte->storeAs('SANOFI/REQUEST/'.$request_risk->id, $fileReporteName)]);
        */

        $SanofiHomologationCountry = SanofiHomologationCountry::find($request_risk->country_homologation);

        foreach ($input['paises'] as $key => $pais) {
            $country = SanofiHomologationCountry::find($pais);
            $input['paises'][$key] = $country->country;
        }

        $paises = implode(",", $input['paises']);

        /* SEND EMAIL
        $data = array(
            'id_request' => "SR-0".$request_risk->id,
            'name_solicitante' => $user->name,
            'sociedad' => $SanofiHomologationCountry->name,
            'paises' => $paises,
            'provider_name' => $request_risk->provider_name,
            'provider_email' => $request_risk->provider_email,
            'provider_phone' => $request_risk->provider_phone,
            'date_solicitud' => $request_risk->date_solicitud
        );

        Mail::to($request_risk->user_email)->cc("soporte@riskgc.com")->send(new SanofiRiskCreate($data));
        */

        $request->session()->flash('error', 'Solicitud creada satisfactoriamente.');
        return redirect()->route('genfar-request-risk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestRisk  $sanofiRequestRisk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_risk = SanofiRequestRisk::find($id);
        $hacats = SanofiHacat::all();
        $statuses = SanofiRequestStatus::all();
        $user = auth()->user();

        $user_solicitante = User::find($request_risk->user_solicitante);
        if(is_null($request_risk->user_responsable)){
            $request_risk->user_responsable = "Sin Asignar";
        }else{
            $user = User::find($request_risk->user_responsable);
            $request_risk->user_responsable = $user->name;
        }

        $request_risk->user_solicitante = $user_solicitante->name;

        $sanofiHomologationCountry = SanofiHomologationCountry::find($request_risk->country_homologation);
        $request_risk->country_homologation = $sanofiHomologationCountry->name;

        $paises = json_decode($request_risk->paises);
        foreach ($paises as $key => $pais) {
            $country = SanofiHomologationCountry::find($pais);
            $paises[$key] = $country->country;
        }
        $request_risk->paises = implode(", ", $paises);


        $provider = SanofiProvider::find($request_risk->sanofi_provider);
        $request_risk->sanofi_provider = $provider->name;

        $statusName = SanofiRequestStatus::find($request_risk->status_id);
        $request_risk->status_id_name = $statusName->name;


        /*$type = SanofiRequestType::find($request_risk->request_type);
        $type ? $request_risk->request_type = $type->name : $request_risk->request_type = "Sin Información";
        */

        $hacat = SanofiHacat::find($request_risk->hacat);
        $hacat ? $request_risk->hacat = $hacat->name : $request_risk->hacat = "";

        /** SanofiRequestForm  */
        $request_form = SanofiRequestForm::where('sanofi_request_risk_id',$id)->first();
        $request_form->status = "Diligenciado";

        $provider = SanofiProvider::find($request_form->sanofi_provider);
        $request_form->sanofi_provider_name = $provider->name;

        /*Multiples países*/
        $paises = json_decode($request_form->multiple_select_country);
        if(is_null($paises)){

            $paises = explode(",", $request_form->multiple_select_country);
			foreach ($paises as $key => $pais) {
                $country = SanofiHomologationCountry::find($pais);
                $paises[$key] = $country->country;
            }
            $request_form->multiple_select_country = implode(", ", $paises);

        }else{
            if(is_array($paises)){
                foreach ($paises as $key => $pais) {
                    $country = SanofiHomologationCountry::find($pais);
                    $paises[$key] = $country->country;
                }
                $request_form->multiple_select_country = implode(", ", $paises);
            }else{
                $country = SanofiHomologationCountry::find($paises);
                $request_form->multiple_select_country = $country->country;
            }
		}

        /*País Solicitante*/
        $country_homologation = Country::find($request_form->country_homologation);
        $country_homologation ? $request_form->country_homologation_name = $country_homologation->name : $request_form->country_homologation_name = "Sin Información";

        /*País Donde Ejerce Medicina*/
        $country_medical = Country::find($request_form->quest_21);
        $country_medical ? $request_form->quest_21 = $country_medical->name : $request_form->quest_21 = "Sin Información";

        /*Documento representante Legal*/
        $document_representante = InspektorDocumentType::find($request_form->quest_22);
        $document_representante ? $request_form->quest_22 = $document_representante->name : $request_form->quest_22 = "Sin Información";


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
        $academic_degree = SanofiAcademicDegree::find($request_form->quest_hcp_1);
        $academic_degree ? $request_form->quest_hcp_1_name = $academic_degree->name." Score: ".$academic_degree->score : $request_form->quest_hcp_1_name = "Sin Información";

        $member_investigator = SanofiMemberInvestigator::find($request_form->quest_hcp_2);
        $member_investigator ? $request_form->quest_hcp_2_name = $member_investigator->name." Score: ".$member_investigator->score : $request_form->quest_hcp_2_name = "Sin Información";

        if($request_form->quest_hcp_3 == 1){
            $request_form->quest_hcp_3_name = "SI"." Score: 1";
        }elseif ($request_form->quest_hcp_3 == 0) {
            $request_form->quest_hcp_3_name = "NO"." Score: 0";
        }else{
            $request_form->quest_hcp_3_name = "Sin Información";
        }

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

        /* Cuestionario Interno SAGRILAFT* */
        // $request_form->coincidencia_laft  = $request_form->coincidencia_laft > 0 ? "SI":"NO";
        // $request_form->antecedentes_disciplinarios  = $request_form->antecedentes_disciplinarios > 0 ? "SI":"NO";
        // $request_form->antecedentes_penales   = $request_form->antecedentes_penales  > 0 ? "SI":"NO";
        // $request_form->antecedentes_fiscales    = $request_form->antecedentes_fiscales   > 0 ? "SI":"NO";
        // $request_form->coincidencia_pep    = $request_form->coincidencia_pep   > 0 ? "SI":"NO";
        // $request_form->coincidencia_listas     = $request_form->coincidencia_listas    > 0 ? "SI":"NO";
        // $request_form->coincidencia_fuentes      = $request_form->coincidencia_fuentes     > 0 ? "SI":"NO";

        /* Obtener BeneficialOwnership */

        $bfs = BeneficialOwnership::where('forms_id', $request_form->id)->get();

        foreach ($bfs as $coincidence) {

            if ($coincidence->type_bf == 1) {
                $coincidence->type_bf_texto = "MANUAL";
            }elseif ($coincidence->type_bf == 0) {
                $coincidence->type_bf_texto = "NO SUMINISTRA";
            }elseif ($coincidence->type_bf == 2) {
                $coincidence->type_bf_texto = "ARCHIVO";
            }

            if ($coincidence->is_pep == 0) {
                $coincidence->is_pep = "NO";
            }elseif ($coincidence->is_pep == 1) {
                $coincidence->is_pep = "SI";
            }elseif($coincidence->is_pep == null) {
                $coincidence->is_pep = "NO APLICA";
            }

            $document_type = InspektorDocumentType::find($coincidence->document_beneficial_ownership);

            if($document_type != null){
                $coincidence->document_beneficial_ownership = $document_type->name;
            }else{
                $coincidence->document_beneficial_ownership = "NO APLICA";
            }
        }
        // dd($request_form);

        return view('dashboard.sanofi.request_risk.show',compact('request_form', 'request_risk', 'bfs', 'user', 'hacats', 'statuses'));
    }

    public function pending_notification()
    {

        $requests_risk = SanofiRequestRisk::where('status_id',5)
            ->where('request_type','Homologación')
            ->where('id', '>', 447)
            ->get();


        $requests_risk_csr = [];
        $requests_risk_hys = [];
        $requests_risk_csy = [];
        $requests_risk_env = [];
        $requests_risk_ethics = [];
        $requests_risk_sarlaft = [];


        $ethicsCorreo  = array("santiago.pogo@genfar.com","daniela.martinezsilva@genfar.com","Nelson.Fonseca@genfar.com");
        $csrCorreo  = array("juanita.cuervo@genfar.com");
        $csyCorreo  = array("Ana.TorresVillalobos@genfar.com","Alexander.vidales@genfar.com");
        $hysCorreo  = array("carlos.Sanchez@genfar.com");
        $envCorreo  = array("carlos.Sanchez@genfar.com");
        $sarlaftCorreo  = array("nelson.fonseca@genfar.com");

        foreach ($requests_risk as $key) {
            $request_form = SanofiRequestForm::where('sanofi_request_risk_id', $key->id)->first();

            /*Evaluación CSR*/
            if($request_form->csr == 1 && $request_form->csr_comentario == null && ($request_form->csr_1 == 0 || $request_form->csr_2 == 0 ||
            $request_form->csr_3 == 0 || $request_form->csr_4 == 0 || $request_form->csr_5 == 0 ||
            $request_form->csr_6 == 0 || $request_form->csr_7 == 0 || $request_form->csr_9 == 0 ||
            $request_form->csr_10 == 0)){
                $requests_risk_csr[] = $key;
            }
            // /*Evaluación HYS*/
            // if($request_form->hys == 1 && $request_form->hys_comentario == null && ($request_form->hys_1 == 0 || $request_form->hys_2 == 1 || $request_form->hys_3 == 1 ||
            // $request_form->hys_4 == 1 || $request_form->hys_5 == 0 || $request_form->hys_6 == 0 ||
            // $request_form->hys_7 == 0 || $request_form->hys_8 == 0)){
            //     $requests_risk_hys[] = $key;
            // }
            /*Evaluación CSY*/
            if($request_form->csy == 1 && $request_form->csy_comentario == null && $request_form->csy_1 == 0){
                $requests_risk_csy[] = $key;
            }
            /*Evaluación ENV*/
            // if($request_form->env == 1 && $request_form->env_comentario == null && ($request_form->env_1 == 0 || $request_form->env_2 == 0 || $request_form->env_3 == 1 || $request_form->env_4 == 1 || $request_form->env_5 == 0 || $request_form->env_6 == 0 || $request_form->env_7 == 0 || $request_form->env_8 == 0)){
            //     $requests_risk_env[] = $key;
            // }
            /*Evaluación ETHICHS*/
            if($request_form->ethics == 1 && $request_form->ebi_recomendacion != "Bandera(s)/señales de alerta adecuadamente mitigada(s)"){
                $requests_risk_ethics[] = $key;
            }
            /*Evaluación SARLAFT*/
            if($request_form->sarlaft_comentario != "APROBADO" && ($request_form->coincidencia_laft == 1 || $request_form->antecedentes_disciplinarios == 1 || $request_form->antecedentes_penales == 1 || $request_form->antecedentes_fiscales == 1 || $request_form->coincidencia_pep == 1 || $request_form->coincidencia_listas == 1 || $request_form->coincidencia_fuentes == 1)){
                $requests_risk_sarlaft[] = $key;
            }
        }

        if(count($requests_risk_csr) > 0){
            $data = array(
                'tickets' => $requests_risk_csr,
                'amount' => count($requests_risk_csr),
                'type' => "CSR"
            );
            Mail::to($csrCorreo)->send(new GenfarNotifyAll($data));
        }

        if(count($requests_risk_hys) > 0){
            $data = array(
                'tickets' => $requests_risk_hys,
                'amount' => count($requests_risk_hys),
                'type' => "HYS"
            );
            Mail::to($hysCorreo)->send(new GenfarNotifyAll($data));
        }

        if(count($requests_risk_csy) > 0){
            $data = array(
                'tickets' => $requests_risk_csy,
                'amount' => count($requests_risk_csy),
                'type' => "CSY"
            );
            Mail::to($csyCorreo)->send(new GenfarNotifyAll($data));
        }

        if(count($requests_risk_env) > 0){
            $data = array(
                'tickets' => $requests_risk_env,
                'amount' => count($requests_risk_env),
                'type' => "ENV"
            );
            Mail::to($envCorreo)->send(new GenfarNotifyAll($data));
        }

        if(count($requests_risk_ethics) > 0){
            $data = array(
                'tickets' => $requests_risk_ethics,
                'amount' => count($requests_risk_ethics),
                'type' => "Ethics"
            );
            Mail::to($ethicsCorreo)->send(new GenfarNotifyAll($data));
        }

        if(count($requests_risk_sarlaft) > 0){
            $data = array(
                'tickets' => $requests_risk_sarlaft,
                'amount' => count($requests_risk_sarlaft),
                'type' => "SARLAFT"
            );
            Mail::to($sarlaftCorreo)->send(new GenfarNotifyAll($data));
        }

        return redirect()->back()->with('success', 'El correo de Solicitudes Pendientes se ha enviado.');

    }


    public function cancel(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $user = json_decode($request->user);
        $request_risk->observation .= " | ".$user->name." MOTIVO CANCELACIÓN: ".$request->observation;
        $request_risk->status_id = 2;
        $request_risk->date_finalizacion = Carbon::now();
        $request_risk->save();
        $request->session()->flash('message', 'Solicitud Cancelada Satisfactoriamente.');
        return redirect()->route('genfar-request-risk.index');
    }

    /** Gestión Formulario Ético */
    public function ethics(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $request_form = SanofiRequestForm::find($request->id);

        $user = json_decode($request->user);
        $user_solicitante = User::find($request_risk->user_solicitante);

        $observaciones = $request->objective_1." ".$request->objective_2." ".$request->objective_3." ".$request->objective_4." ".
        $request->objective_5." ".$request->objective_6." ".$request->objective_7." ".$request->objective_8." ".$request->objective_9." ".$request->objective_10." ".
        $request->objective_11." ".$request->objective_other;

        $request_risk->observation .= " | ".$user->name.", Comentario del E&BI Officer: ".$request->observation." Plan de acción del E&BI Officer: ".$observaciones." Recomendación del E&BI Officer: ".$request->recomendacion;
        $copiasCorreos  = array($user_solicitante->email,"santiago.pogo@genfar.com","daniela.martinezsilva@genfar.com","Nelson.Fonseca@genfar.com");


        $request_form->ebi_comentario = $request->observation; // COMENTARIO E&BI
        $request_form->ebi_recomendacion = $request->recomendacion; // RECOMENDACIÓN E&BI
        $request_form->ebi_plan = $observaciones; // PLAN DE ACCIÓN E&BI
        $request_form->ethics_date = Carbon::now(); //FECHA DE REVISIÓN E&BI


        $data = array(
            'name_solicitante' => $user->name,
            'comment' => $request->observation,
            'advices' => $request->recomendacion,
            'id_task' => "TASK-0".$request_risk->id,
            'id' => $request_risk->id
        );

        Mail::to($copiasCorreos)->send(new GenfarEthicPlan($data));

        $request_risk->save();
        $request_form->save();


        return redirect()->route('genfar-request-risk.index');
    }

    /** Gestión Formulario CSY */
    public function csy(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $request_form = SanofiRequestForm::find($request->id);

        $user = json_decode($request->user);
        $user_solicitante = User::find($request_risk->user_solicitante);
        $csyCorreo  = array($user_solicitante->email,"Ana.TorresVillalobos@genfar.com","Alexander.vidales@genfar.com");

        $request_risk->observation .= " | ".$user->name." GESTION CSY : ".$request->observation;
        $request_form->csy_comentario = $request->observation;
        $request_form->csy_date = Carbon::now(); //FECHA DE REVISIÓN CSY

        $data = array(
            'name_solicitante' => $user->name,
            'comment' => $request->observation,
            'advices' => $request->observation,
            'id_task' => "TASK-0".$request_risk->id,
            'id' => $request_risk->id
        );

        Mail::to($csyCorreo)->send(new GenfarEthicPlan($data));

        $request_risk->save();
        $request_form->save();

        return redirect()->route('genfar-request-risk.index');
    }

    /** Gestión Formulario CSR */
    public function csr(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $request_form = SanofiRequestForm::find($request->id);

        $user = json_decode($request->user);
        $user_solicitante = User::find($request_risk->user_solicitante);
        $csrCorreo  = array($user_solicitante->email,"juanita.cuervo@genfar.com");

        $request_risk->observation .= " | ".$user->name." GESTION CSR : ".$request->observation;
        $request_form->csr_comentario = $request->observation;
        $request_form->csr_date = Carbon::now(); //FECHA DE REVISIÓN CSR

        $data = array(
            'name_solicitante' => $user->name,
            'comment' => $request->observation,
            'advices' => $request->observation,
            'id_task' => "TASK-0".$request_risk->id,
            'id' => $request_risk->id
        );

        Mail::to($csrCorreo)->send(new GenfarEthicPlan($data));

        $request_risk->save();
        $request_form->save();

        return redirect()->route('genfar-request-risk.index');

    }

    /** Gestión Formulario HYS */
    public function hys(Request $request){
        $request_risk = SanofiRequestRisk::find($request->id);
        $request_form = SanofiRequestForm::find($request->id);

        $user = json_decode($request->user);
        $user_solicitante = User::find($request_risk->user_solicitante);
        $hysCorreo  = array($user_solicitante->email,"carlos.Sanchez@genfar.com");

        $request_risk->observation .= " | ".$user->name." GESTION HYS : ".$request->observation;
        $request_form->hys_comentario = $request->observation;
        $request_form->hys_date = Carbon::now(); //FECHA DE REVISIÓN HYS

        $data = array(
            'name_solicitante' => $user->name,
            'comment' => $request->observation,
            'advices' => $request->observation,
            'id_task' => "TASK-0".$request_risk->id,
            'id' => $request_risk->id
        );

        Mail::to($hysCorreo)->send(new GenfarEthicPlan($data));

        $request_risk->save();
        $request_form->save();

        return redirect()->route('genfar-request-risk.index');
    }

    /** Gestión Formulario ENV */
    public function env(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $request_form = SanofiRequestForm::find($request->id);

        $user = json_decode($request->user);
        $user_solicitante = User::find($request_risk->user_solicitante);
        $envCorreo  = array($user_solicitante->email,"carlos.Sanchez@genfar.com");

        $request_risk->observation .= " | ".$user->name." GESTION HYS : ".$request->observation;
        $request_form->env_comentario = $request->observation;
        $request_form->env_date = Carbon::now(); //FECHA DE REVISIÓN ENV

        $data = array(
            'name_solicitante' => $user->name,
            'comment' => $request->observation,
            'advices' => $request->observation,
            'id_task' => "TASK-0".$request_risk->id,
            'id' => $request_risk->id
        );

        Mail::to($envCorreo)->send(new GenfarEthicPlan($data));

        $request_risk->save();
        $request_form->save();

        return redirect()->route('genfar-request-risk.index');
    }

    public function perfilamiento(Request $request){

        $request_form = SanofiRequestForm::find($request->id);
        $promedio = 0;
        $promedio2 = 0;

        if($request_form->csi_1 == "Mas de 15 años"){
            $promedio = 1;
        }elseif ($request_form->csi_1 == "De 10 a 15 años") {
            $promedio = 3;
        }elseif ($request_form->csi_1 == "De 5 a 10 años") {
            $promedio = 7;
        }elseif ($request_form->csi_1 == "Menos de 5 años") {
            $promedio = 10;
        }else{
            $promedio = 0;
        }




        if($request_form->csi_2 == "OEA /C-TPAT / AEO / NEEC"){
            $promedio += 1;
        }elseif ($request_form->csi_2 == "ISO 28000 / BASC") {
            $promedio += 3;
        }elseif ($request_form->csi_2 == "Ninguna") {
            $promedio += 10;
        }else{
            $promedio += 0;
        }



        $promedio += $request->perfilamiento_1 + $request->perfilamiento_2 + $request->perfilamiento_3 + $request->perfilamiento_4;

        $request_form->calificacion_oea = $promedio/6;
        $request_form->save();


        return redirect()->back()->with('success', 'La evaluación del cuestionario OEA fué Calificado.');
    }

    public function sarlaft(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $request_form = SanofiRequestForm::find($request->id);

        $user = json_decode($request->user);
        $user_solicitante = User::find($request_risk->user_solicitante);

        $sarlaftCorreo  = array($user_solicitante->email,"nelson.fonseca@genfar.com");

        $request_risk->observation .= " | ".$user->name." GESTION SARLAFT : ".$request->observation." ".$request->sarlaft_observation;
        $request_form->sarlaft_comentario = $request->observation;
        $request_form->sarlaft_observation = $request->sarlaft_observation;
        $request_form->sarlaft_date = Carbon::now(); //FECHA DE REVISIÓN SARLAFT

        $advices = "EL PROVEEDOR HA SIDO ".$request->observation." EN LA EVALUACIÓN SARLAFT REALIZADA POR NELSON FONSECA";

        $data = array(
            'name_solicitante' => $user->name,
            'comment' => $request->observation,
            'advices' => $advices,
            'id_task' => "TASK-0".$request_risk->id,
            'id' => $request_risk->id
        );

        Mail::to($sarlaftCorreo)->send(new GenfarEthicPlan($data));

        $request_risk->save();
        $request_form->save();

        return redirect()->route('genfar-request-risk.index');
    }



    public function migo(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $user = json_decode($request->user);
        $request_risk->observation .= " | ".$user->name." ACTUALIZACIÓN DE MIGO: ";
        $request_risk->migo = $request->migo;
        $request_risk->gr = $request->migo;
        $request_risk->save();
        return back();
    }


    public function manage(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $fecha_hoy = Carbon::now();

        $user_solicitante = User::find($request_risk->user_solicitante);
        $request_form = SanofiRequestForm::where('sanofi_request_risk_id',(int)$request_risk->id)->first();
        $user = json_decode($request->user);

        $copiasCorreos  = array($user_solicitante->email,"santiago.pogo@genfar.com","daniela.martinezsilva@genfar.com");
        $csrCorreo  = array($user_solicitante->email,"juanita.cuervo@genfar.com");
        $csyCorreo  = array($user_solicitante->email,"Ana.TorresVillalobos@genfar.com","Alexander.vidales@genfar.com");
        $hysCorreo  = array($user_solicitante->email,"carlos.Sanchez@genfar.com");
        $envCorreo  = array($user_solicitante->email,"carlos.Sanchez@genfar.com");
        $sarlaftCorreo  = array($user_solicitante->email,"nelson.fonseca@genfar.com");


        if($request->status == 1){
            $request_risk->observation .= " | ".$user->name." MOTIVO EN PROCESO: ".$request->observation;
            $request_risk->status_id = 1;
        }elseif ($request->status == 2) {
            $request_risk->observation .= " | ".$user->name." MOTIVO CANCELACIÓN: ".$request->observation;
            $request_risk->status_id = 2;
            $request_risk->date_finalizacion = Carbon::now();
        }elseif ($request->status == 3) {
            $request_risk->observation .= " | ".$user->name." MOTIVO EN SEGUIMIENTO: ".$request->observation;
            $request_risk->status_id = 3;
        }elseif ($request->status == 4) {
            $request_risk->observation .= " | ".$user->name." MOTIVO DILIGENCIADO : ".$request->observation;
            $request_risk->status_id = 4;
            $request_risk->date_finalizacion = Carbon::now();
        }elseif ($request->status == 5) {

            $fileReporte = $request->file('attachment_dds');
            $fileReporte2 = $request->file('attachment_dda');

            if($fileReporte!=null){
                $fileInformeName = $request_risk->id.'-1001-Debida Diligencia Simple.'.$fileReporte->getClientOriginalExtension();
                $request_risk->update(['dds' => $fileReporte->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName)]);
            }

            if($fileReporte2!=null){
                $fileInformeName2 = $request_risk->id.'-1002-Debida Diligencia Ampliada.'.$fileReporte2->getClientOriginalExtension();
                $request_risk->update(['dda' => $fileReporte2->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName2)]);
            }

            /** ¿Ha identificado algún posible problema relacionado con la reputación del tercero expuesto o cualquier litigio existente o potencial que involucre al tercero expuesto o a su personal clave? */
            $request_form->alert_dda = $request->dda_acept;
            /** Hay coincidencias o hallazgo en Listas LA/FT/CO */
            $request_form->coincidencia_laft = $request->coincidencia_laft;
            /** Tiene Antecedentes Disciplianarios */
            $request_form->antecedentes_disciplinarios = $request->antecedentes_disciplinarios;
            /** Tiene Antecedentes Penales o condenas*/
            $request_form->antecedentes_penales = $request->antecedentes_penales;
            /** Tiene Antecedentes Fiscales*/
            $request_form->antecedentes_fiscales = $request->antecedentes_fiscales;
            /** Se trata de un PEP*/
            $request_form->coincidencia_pep = $request->coincidencia_pep;
            /** Hay coincidencias en otras listas*/
            $request_form->coincidencia_listas = $request->coincidencia_listas;
            /** ¿Otros Hallazgos en fuentes abiertas*/
            $request_form->coincidencia_fuentes = $request->coincidencia_fuentes;

            $request_form->save();


            /** ALERTA CUESTIONARIO ETICO */
            if($request_form->ethics == 1 && $request_risk->request_type == "Homologación"){
                /**Si hay Alerta */
                if($request_form->quest_26 == 0 || $request_form->quest_37 == 0 || $request_form->quest_73 == 1 || $request_form->quest_74 == 0 || $request_form->quest_48 == 1 || $request_form->quest_72 == 1 || $request_form->quest_65 == 1 || $request_form->quest_66 == 0 || $request_form->quest_67 == 0 || $request_form->quest_68 == 1 || $request_form->alert_dda == 1 ){
                    $data = array(
                        'name_solicitante' => $user->name,
                        'id_task' => "TASK-0".$request_risk->id,
                        'id' => $request_risk->id
                    );

                    Mail::to($copiasCorreos)->send(new GenfarEthicSubmit($data));
                }
                else{
                    $data = array(
                        'name_solicitante' => $user->name,
                        'id_task' => "TASK-0".$request_risk->id,
                        'id' => $request_risk->id
                    );
                    Mail::to($copiasCorreos)->send(new GenfarEthicNotSubmit($data));
                }
            }

            /** ALERTA CUESTIONARIO CSR */
            if($request_form->csr == 1 && $request_risk->request_type == "Homologación"){
                if($request_form->csr_1 == 0 || $request_form->csr_2 == 0 ||
                $request_form->csr_3 == 0 || $request_form->csr_4 == 0 || $request_form->csr_5 == 0 ||
                $request_form->csr_6 == 0 || $request_form->csr_7 == 0 || $request_form->csr_9 == 0 ||
                $request_form->csr_10 == 0){
                    $data = array(
                        'name_solicitante' => $user->name,
                        'id_task' => "TASK-0".$request_risk->id,
                        'id' => $request_risk->id
                    );

                    Mail::to($csrCorreo)->send(new GenfarCSRAlert($data));
                }
            }

            // /** ALERTA CUESTIONARIO HYS */
            // if($request_form->hys == 1 && $request_risk->request_type == "Homologación"){
            //     if($request_form->hys_1 == 0 || $request_form->hys_2 == 1 || $request_form->hys_3 == 1 || $request_form->hys_4 == 1 || $request_form->hys_5 == 0 || $request_form->hys_6 == 0 || $request_form->hys_7 == 0 || $request_form->hys_8 == 0){
            //         $data = array(
            //             'name_solicitante' => $user->name,
            //             'id_task' => "TASK-0".$request_risk->id,
            //             'id' => $request_risk->id
            //         );

            //         Mail::to($hysCorreo)->send(new GenfarHYSAlert($data));
            //     }
            // }

            // /** ALERTA CUESTIONARIO ENV */
            // if($request_form->env == 1 && $request_risk->request_type == "Homologación"){
            //     if($request_form->env_1 == 0 || $request_form->env_2 == 0 || $request_form->env_3 == 1 || $request_form->env_4 == 1 || $request_form->env_5 == 0 || $request_form->env_6 == 0 || $request_form->env_7 == 0 || $request_form->env_8 == 0){
            //         $data = array(
            //             'name_solicitante' => $user->name,
            //             'id_task' => "TASK-0".$request_risk->id,
            //             'id' => $request_risk->id
            //         );

            //         Mail::to($envCorreo)->send(new GenfarENVAlert($data));
            //     }
            // }

            /** ALERTA CUESTIONARIO CSY */
            if($request_form->csy == 1 && $request_risk->request_type == "Homologación"){
                if($request_form->csy_1 == 0){
                    $data = array(
                        'name_solicitante' => $user->name,
                        'id_task' => "TASK-0".$request_risk->id,
                        'id' => $request_risk->id
                    );
                    Mail::to($csyCorreo)->send(new GenfarCSYAlert($data));
                }
            }


            /** ALERTA CUESTIONARIO SARLAFT */
            if($request_form->coincidencia_laft == 1 || $request_form->antecedentes_disciplinarios == 1 || $request_form->antecedentes_penales == 1 || $request_form->antecedentes_fiscales == 1 || $request_form->coincidencia_pep == 1 || $request_form->coincidencia_listas == 1 || $request_form->coincidencia_fuentes == 1){
                $data = array(
                    'name_solicitante' => $user->name,
                    'id_task' => "TASK-0".$request_risk->id,
                    'id' => $request_risk->id
                );
                Mail::to($sarlaftCorreo)->send(new GenfarSARLAFTAlert($data));
            }

            $request_risk->date_finalizacion = Carbon::now();



            $request_risk->observation .= " | ".$fecha_hoy." MOTIVO HOMOLOGADO : ".$request->observation;
            $request_risk->status_id = 5;
        }

        $request_risk->save();
        return back();
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Diligence  $diligence
     * @return \Illuminate\Http\Response
     */
    public function downloadDDA($id){
        $request_risk = SanofiRequestRisk::where('id', $id)->first();
        return \Storage::download($request_risk->dda);
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Diligence  $diligence
     * @return \Illuminate\Http\Response
     */
    public function downloadDDS($id){
        $request_risk = SanofiRequestRisk::where('id', $id)->first();
        return \Storage::download($request_risk->dds);
    }

    public function buyer(Request $request){

        $request_risk = SanofiRequestRisk::find($request->id);
        $user = json_decode($request->user);
        $request_risk->hacat = $request->hacat;
        $request_risk->condicion_pago = $request->condicion_pago;
        $request_risk->nombre_comprador = $request->nombre_comprador;
        $request_risk->area_solicitante = $request->area_solicitante;
        $request_risk->due_diligence = $request->due_diligence;
        $request_risk->observation .= " | ".$user->name." Actualizacion Buyer";
        $request_risk->status_id = 8;
        $request_risk->save();
        return redirect()->route('genfar-request-risk.index')->with('success', 'La solicitud ha sido modificada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestRisk  $sanofiRequestRisk
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiRequestRisk $sanofiRequestRisk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiRequestRisk  $sanofiRequestRisk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiRequestRisk $sanofiRequestRisk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiRequestRisk  $sanofiRequestRisk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiRequestRisk $sanofiRequestRisk)
    {
        //
    }

    /**
     * Display the Swearch resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function findByURLView()
    {
        return view("dashboard.sanofi.findByURL");
    }

    public function findByURL(Request $request)
    {
        $output = "";
        $genfars = "";
        $olds = "";

        if($request->ajax()){
            $output = "";

            $genfars = DB::table('sanofi_request_risks')->where('provider_name','LIKE','%'.$request->search."%")->orWhere('provider_id','LIKE','%'.$request->search."%")->paginate(100);
            $sanofis = DB::table('sanofi_request_risk_olds')->where('provider_name','LIKE','%'.$request->search."%")->paginate(100);
            //$olds = DB::table('sanofi_request_olds')->where('nombre','LIKE','%'.$request->search."%")->orWhere('identificacion','LIKE','%'.$request->search."%")->paginate(100);
            $olds = DB::table('sanofi_request_olds')->where('identificacion','LIKE','%'.$request->search."%")->paginate(100);

            if($genfars){
                foreach($genfars as $key => $genfar){

                    $output.='<tr>'.
                    '<td>'.$genfar->id.'</td>'.
                    '<td>'.$genfar->provider_name.'</td>'.
                    '<td>'.$genfar->provider_id.'</td>'.
                    '<td>Solicitud de Genfar</td>'.
                    '<td><a href="https://ambientetest.datalaft.com:2091/genfar-request-risk/'.$genfar->id.'" target="_blank" class="btn btn-outline-danger"><i class="fas fa-edit"></i></a></td>'.
                    '</tr>';
                }
            }

            if($sanofis){
                foreach($sanofis as $key => $sanofi){
                    $output.='<tr>'.
                    '<td>'.$sanofi->id.'</td>'.
                    '<td>'.$sanofi->provider_name.'</td>'.
                    '<td> No Aplica</td>'.
                    '<td>Solicitud de Sanofi</td>'.
                    '<td><a href="https://ambientetest.datalaft.com:2091/sanofi-old/'.$sanofi->id.'" target="_blank" class="btn btn-outline-danger"><i class="fas fa-edit"></i></a></td>'.
                    '</tr>';
                }
            }

            if($olds){
                foreach($olds as $key => $old){
                    $output.='<tr>'.
                    '<td>'.$key->id.'</td>'.
                    '<td>'.$key->nombre.'</td>'.
                    '<td>'.$key->indentificacion.'</td>'.
                    '<td>Solicitud a Risk International</td>'.
                    '<td><a href="https://ambientetest.datalaft.com:2091/genfar-old/'.$key->id.'" target="_blank" class="btn btn-outline-danger"><i class="fas fa-edit"></i></a></td>'.
                    '</tr>';
                }
            }

            return Response($output);
        }
    }

    /* Update Methods */

    public function updateDds(Request $request){

        $validatedData = $request->validate([
            'update_attachment_dds' => 'required',
        ]);

        $request_risk = SanofiRequestRisk::find($request->id);
        $fileReporte = $request->file('update_attachment_dds');
        $fileInformeName = $request_risk->id.'-1001-Debida Diligencia Simple.'.$fileReporte->getClientOriginalExtension();
        $request_risk->update(['dds' => $fileReporte->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName)]);

        // Return a JSON response with the updated date value
        if($request_risk->save()){
            return redirect()->back()->with('success', 'La solicitud de Debida Diligencia ha sido Actualizada satisfactoriamente.');
        }else{
            return redirect()->back()->with('error', 'Se ha presentado un error al Actualizar la DD.');
        }
    }

    public function updateAprobacionCompras(Request $request){

        $validatedData = $request->validate([
            'update_attachment_compras' => 'required',
        ]);

        $request_risk = SanofiRequestRisk::find($request->id);

        $fileReporte = $request->file('update_attachment_compras');
        $fileInformeName = $request_risk->id.'-Aprobacion-Compra.'.$fileReporte->getClientOriginalExtension();
        $request_risk->update(['aprobacion_compra' => $fileReporte->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName)]);

        // Return a JSON response with the updated date value
        if($request_risk->save()){
            return redirect()->back()->with('success', 'El archivo de aprobación de compra ha sido Actualizada satisfactoriamente.');
        }else{
            return redirect()->back()->with('error', 'Se ha presentado un error al actualizar el archivo.');
        }
    }

    public function updateManifestacionSuscrita(Request $request){

        $validatedData = $request->validate([
            'update_attachment_manifestacion' => 'required',
        ]);

        $request_risk = SanofiRequestRisk::find($request->id);

        $fileReporte = $request->file('update_attachment_manifestacion');
        $fileInformeName = $request_risk->id.'-Manifestacion-Suscrita.'.$fileReporte->getClientOriginalExtension();
        $request_risk->update(['manifestacion_suscrita' => $fileReporte->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName)]);

        // Return a JSON response with the updated date value
        if($request_risk->save()){
            return redirect()->back()->with('success', 'El archivo de Manifestacion Suscrita de compra ha sido Actualizado satisfactoriamente.');
        }else{
            return redirect()->back()->with('error', 'Se ha presentado un error al actualizar el archivo.');
        }
    }

    public function updateDda(Request $request){

        $validatedData = $request->validate([
            'update_attachment_dda' => 'required',
        ]);

        $request_risk = SanofiRequestRisk::find($request->id);

        $fileReporte = $request->file('update_attachment_dda');
        $fileInformeName2 = $request_risk->id.'-1002-Debida Diligencia Ampliada.'.$fileReporte->getClientOriginalExtension();
        $request_risk->update(['dda' => $fileReporte->storeAs('GENFAR/SUPLIERS/'.$request_risk->id, $fileInformeName2)]);

        // Return a JSON response with the updated date value
        if($request_risk->save()){
            return redirect()->back()->with('success', 'La solicitud de Debida Diligencia ha sido Actualizada satisfactoriamente.');
        }else{
            return redirect()->back()->with('error', 'Se ha presentado un error al Actualizar la DD.');
        }

    }


    /*Download methods*/

    public function downloadPurchaseOrder($id){
        $file_reporte = SanofiRequestRisk::find($id);
        return \Storage::download($file_reporte->purchase_order);
    }

    public function export()
    {
        return Excel::download(new SanofiRequestRiskExport, 'genfar_risk_requests.xlsx');
    }

    public function exportForms()
    {
        return Excel::download(new GenfarFormsExport, 'genfar_forms.xlsx');
    }

    public function downloadAprobacionCompra($id){
        $file_reporte = SanofiRequestRisk::find($id);
        return \Storage::download($file_reporte->aprobacion_compra);
    }

    public function downloadManifestacion($id){
        $file_reporte = SanofiRequestRisk::find($id);
        return \Storage::download($file_reporte->manifestacion_suscrita);
    }
}
