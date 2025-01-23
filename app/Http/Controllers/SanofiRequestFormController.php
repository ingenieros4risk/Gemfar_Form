<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Exports\SanofiRequestFormExportAsOne;
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
use App\Models\Sanofi\BeneficialOwnership;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Inspektor\CurrentType;
use Carbon\Carbon;
use PDF;

class SanofiRequestFormController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth', ['except' => ['create', 'sanofiUpdate', 'sherlock',]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paisesLista = [];
        $you = auth()->user();
        $requests_forms = SanofiRequestForm::all();
        foreach ($requests_forms as $key) {

            $country_homologation = Country::find($key->country_homologation);
            $country_homologation ? $key->country_homologation = $country_homologation->name : $key->sanofi_provider = "Sin Información";

            $paises = explode(",",$key->multiple_select_country);
            
            if(is_array($paises)){
                foreach ($paises as $keys => $pais) {
                    $countries = SanofiHomologationCountry::find($pais);
                    $countries ? $paisesLista[$keys] = $countries->country: $paisesLista[$keys] = "Sin Definir";
                }
                $key->multiple_select_country = implode(", ", $paisesLista);
                 
            }else{
                $tmp = SanofiHomologationCountry::find($paises);
                $key->multiple_select_country = $tmp->country;
            }

            $provider = SanofiProvider::find($key->sanofi_provider);
            $provider ? $key->sanofi_provider_name = $provider->name : $key->sanofi_provider_name = "Sin Información";

        }

        
        return view('dashboard.genfar.index', compact('requests_forms', 'you'));
    }

    /**
     * Create the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang,$id)
    {
        $requests_form = SanofiRequestForm::where('sanofi_request_risk_id',(int)$id)->first();
        return view('dashboard.sanofi.create', compact('requests_form'));
    }

    /**
     * Sherlock the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sherlock()
    {
        $requests_forms = SanofiRequestForm::all();  
        return view('dashboard.sanofi.sherlock', compact('requests_forms'));
    }

    /**
     * Create the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sanofiUpdate()
    {
        return view('dashboard.sanofi.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("Pruebas 1152: Formulario Agregado Satrisfactoriamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestForm  $sanofiRequestForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
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
        $member_societies = SanofiMemberSociety::all();


        $request_form = SanofiRequestForm::find($id);
        $request_form->status = "Diligenciado";

        $provider = SanofiProvider::find($request_form->sanofi_provider);
        $request_form->sanofi_provider_name = $provider->name;

        /*Multiples países*/
        $paises = json_decode($request_form->multiple_select_country);
        if(is_null($paises)){
            $paises = explode(",", $request_form->multiple_select_country);
        }

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

        $academic_position = SanofiAcademicPosition::find($request_form->quest_hcp_4);
        $academic_position ? $request_form->quest_hcp_4_name = $academic_position->name." Score: ".$academic_position->score : $request_form->quest_hcp_4_name = "Sin Información";

        $member_society = SanofiMemberSociety::find($request_form->quest_hcp_5);
        $member_society ? $request_form->quest_hcp_5_name = $member_society->name." Score: ".$member_society->score : $request_form->quest_hcp_5_name = "Sin Información";

        $publication = SanofiHasPublication::find($request_form->quest_hcp_6);
        $publication ? $request_form->quest_hcp_6_name = $publication->name." Score: ".$publication->score: $request_form->quest_hcp_6_name = "Sin Información";

        $poster = SanofiHasPoster::find($request_form->quest_hcp_7);
        $poster ? $request_form->quest_hcp_7_name = $poster->name." Score: ".$poster->score: $request_form->quest_hcp_7_name = "Sin Información";

        $book = SanofiHasBook::find($request_form->quest_hcp_8);
        $book ? $request_form->quest_hcp_8_name = $book->name." Score: ".$book->score: $request_form->quest_hcp_8_name = "Sin Información";

        $conference = SanofiHasConference::find($request_form->quest_hcp_9);
        $conference ? $request_form->quest_hcp_9_name = $conference->name." Score: ".$conference->score: $request_form->quest_hcp_9_name = "Sin Información";

        $adwar = SanofiHasAward::find($request_form->quest_hcp_10);
        $adwar ? $request_form->quest_hcp_10_name = $adwar->name." Score: ".$adwar->score: $request_form->quest_hcp_10_name = "Sin Información";

        if($request_form->quest_hcp_11 == 1){
            $request_form->quest_hcp_11_name = "SI"." Score: 1";
        }elseif ($request_form->quest_hcp_11 == 0) {
            $request_form->quest_hcp_11_name = "NO"." Score: 0";
        }else{
            $request_form->quest_hcp_11_name = "Sin Información";
        }

        if($request_form->quest_hcp_12 == 1){
            $request_form->quest_hcp_12_name = "SI"." Score: 1";
        }elseif ($request_form->quest_hcp_12 == 0) {
            $request_form->quest_hcp_12_name = "NO"." Score: 0";
        }else{
            $request_form->quest_hcp_12_name = "Sin Información";
        }

        $influence = SanofiInfluence::find($request_form->quest_hcp_13);
        $influence ? $request_form->quest_hcp_13_name = $influence->name." Score: ".$influence->score: $request_form->quest_hcp_13_name = "Sin Información";

        /* PREGUNTAS CONFLICTO DE INTERES*/

        /* -- Lógica Requiere Due Diligence */

        if($request_form->is_pep_checks == 1 and $request_form->is_decision_check == 1){
            $request_form->require_dda = "Requiere Due Diligence sobre HCP";
        }elseif ($request_form->is_decision_check == 1) {
            $request_form->require_dda = "Requiere Due Diligence sobre HCP";
        }elseif ($request_form->is_pep_checks == 0 or $request_form->is_decision_check == 0) {
            $request_form->require_dda = "NO Requiere Due Diligence sobre HCP";
        }elseif(is_null($request_form->is_pep_checks) or is_null($request_form->is_decision_check)){
            $request_form->require_dda = "Sin Información";
        }

        $request_form->is_pep_checks ? ($request_form->is_pep_checks == 1 ? $request_form->is_pep_checks = "SI":$request_form->is_pep_checks = "NO"):$request_form->is_pep_checks = "Sin Información";

        $request_form->is_decision_check ? ($request_form->is_decision_check == 1 ? $request_form->is_decision_check = "SI":$request_form->is_decision_check = "NO"):$request_form->is_decision_check = "Sin Información";

        /*Parametrizacion Score*/

        if($request_form->score < 8){
            $request_form->score = "PUNTOS:".$request_form->score." CATEGORIA: No Aceptable";
        }elseif ($request_form->score >= 9 and $request_form->score < 12) {
            $request_form->score = "PUNTOS:".$request_form->score." CATEGORIA: Local";
        }elseif ($request_form->score >= 12 and $request_form->score < 20) {
            $request_form->score = "PUNTOS:".$request_form->score." CATEGORIA: Nacional 2";
        }elseif ($request_form->score >= 20 and $request_form->score < 32) {
            $request_form->score = "PUNTOS:".$request_form->score." CATEGORIA: Nacional 1";
        }elseif ($request_form->score >= 32 and $request_form->score < 40) {
            $request_form->score = "PUNTOS:".$request_form->score." CATEGORIA: Regional";
        }elseif ($request_form->score > 40) {
            $request_form->score = "PUNTOS:".$request_form->score." CATEGORIA: Global";
        }

        /*Verify if is internacional medical*/

        if($request_form->country_homologation != 1 and $request_form->country_homologation != 5 and $request_form->country_homologation != 6 and $request_form->country_homologation != 10 and $request_form->country_homologation != 12 and $request_form->country_homologation != 15 and $request_form->country_homologation != 16 and $request_form->country_homologation != 3){
            $request_form->internacional_medical = 0;
        }else{
            $request_form->internacional_medical = 1;
        }

       
        return view('dashboard.sanofi.show',compact(
            'request_form',
            'user',
            'influences',
            'academic_degrees',
            'academic_positions',
            'adwars',
            'books',
            'conferences',
            'posters',
            'publications',
            'medical_especilities',
            'member_investigators',
            'member_societies'
        ));
    }

    public function categorizacion(Request $request){

        $request_form = SanofiRequestForm::find($request->id);

        $request_form->quest_hcp_1 = $request->academic_degrees;
        $request_form->quest_hcp_2 = $request->member_investigators;
        $request_form->quest_hcp_3 = $request->quest_hcp_3;
        $request_form->quest_hcp_4 = $request->academic_positions;
        $request_form->quest_hcp_5 = $request->member_societies;
        $request_form->quest_hcp_6 = $request->publications;
        $request_form->quest_hcp_7 = $request->posters;
        $request_form->quest_hcp_8 = $request->books;
        $request_form->quest_hcp_9 = $request->conferences;
        $request_form->quest_hcp_10 = $request->adwars;
        $request_form->quest_hcp_11 = $request->quest_hcp_11;
        $request_form->quest_hcp_12 = $request->quest_hcp_12;
        $request_form->quest_hcp_13 = $request->influences;

        $quest_hcp_1 = SanofiAcademicDegree::find($request_form->quest_hcp_1);
        $quest_hcp_2 =  SanofiMemberInvestigator::find($request_form->quest_hcp_2);
        $quest_hcp_3 = $request_form->quest_hcp_3;
        $quest_hcp_4 = SanofiAcademicPosition::find($request_form->quest_hcp_4);
        $quest_hcp_5 = SanofiMemberSociety::find($request_form->quest_hcp_5);
        $quest_hcp_6 = SanofiHasPublication::find($request_form->quest_hcp_6);
        $quest_hcp_7 = SanofiHasPoster::find($request_form->quest_hcp_7);
        $quest_hcp_8 = SanofiHasBook::find($request_form->quest_hcp_8);
        $quest_hcp_9 = SanofiHasConference::find($request_form->quest_hcp_9);
        $quest_hcp_10 = SanofiHasAward::find($request_form->quest_hcp_10);
        $quest_hcp_11 = $request_form->quest_hcp_11;
        $quest_hcp_12 = $request_form->quest_hcp_12;
        $quest_hcp_13 = SanofiInfluence::find($request_form->quest_hcp_13);

        $score = $quest_hcp_1->score + $quest_hcp_2->score + $quest_hcp_3 + $quest_hcp_4->score
        + $quest_hcp_5->score + $quest_hcp_6->score + $quest_hcp_7->score + $quest_hcp_8->score + $quest_hcp_9->score + $quest_hcp_10->score + $quest_hcp_11 +$quest_hcp_12 + $quest_hcp_13->score;

        $request_form->score = $score;
        $request_form->save();
        
        $request->session()->flash('message', 'Solicitud CATEGORIZACIÓN Satisfactoriamente.');
        return redirect()->route('genfar.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestForm  $sanofiRequestForm
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiRequestForm $sanofiRequestForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiRequestForm  $sanofiRequestForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiRequestForm $sanofiRequestForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiRequestForm  $sanofiRequestForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiRequestForm $sanofiRequestForm)
    {
        //
    }

    // Generate PDF
    public function createAllPDF() {
      // retreive all records from db
      $requests_forms = SanofiRequestForm::orderBy('id')
               ->take(100)
               ->get();

      //$requests_forms = SanofiRequestForm::all();
               

      // share data to view
      view()->share('requests_forms',$requests_forms);
      $pdf = PDF::loadView('pdf_view_sanofi', $requests_forms)->setPaper('a4', 'landscape');;

      // download PDF file with download method
      return $pdf->download('Lista de proveedores Homologados.pdf');
    }
    
    public function consentimiento($lang,$id) {
        $requests_form = SanofiRequestForm::find($id);
        view()->share('requests_form',$requests_form);
        $pdf = PDF::loadView('consentimientos', $requests_form);
        return $pdf->download('Consentimiento Informado.pdf');
    }

    public function manifestacion($lang,$id) {
        $requests_form = SanofiRequestForm::find($id);
        view()->share('requests_form',$requests_form);
        $pdf = PDF::loadView('manifestacion', $requests_form);
        return $pdf->download('Manifestación Suscrita.pdf');
    }


    /*Download methods*/

    public function downloadCurriculumVitae($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->curriculum_vitae);
    }

    public function downloadCertificadoExistencia($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_existencia);
    }

    public function downloadRUT($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->rut);
    }

    public function downloadCedulaRepresentante($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->cedula_rep);
    }

    public function downloadLicenciaMedica($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->licencia_medica);
    }

    public function downloadCertificadoBancario($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_bancaria);
    }        

    public function downloadCertificadoOEA($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_oea);
    }

    public function downloadCertificadoLAFT($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_laft);
    }     

    public function downloadCertificadoISO($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_iso);
    }       

    public function downloadCertificadoPoliticas($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_politicas);
    }

    public function downloadCertificadoFinanciero($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_financiero);
    }

    public function downloadCertificadoComercial($id){
        $file_reporte = SanofiRequestForm::find($id);
        return \Storage::download($file_reporte->certificado_comercial);
    }

    public function downloadBeneficial($id){
        $requests_form = BeneficialOwnership::find($id);
        return \Storage::download($requests_form->coincidence_file);
    }

    public function downloadNoBeneficial($id){
        $requests_form = BeneficialOwnership::find($id);
        return \Storage::download($requests_form->no_coincidence_file);
    }
    public function export(Request $request) 
    {
        return Excel::download(new SanofiRequestFormExportAsOne($request->id), 'sanofi_form_requests'.$request->id.'.xlsx');
    }
}
