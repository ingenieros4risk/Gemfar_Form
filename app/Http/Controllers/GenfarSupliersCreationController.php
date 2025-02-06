<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\GenfarSupliersCreation;
use App\Exports\SanofiRequestRiskExport;
use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiRequestStatus;
use App\Models\Sanofi\SanofiProvider;
use App\Models\Sanofi\RequestRiskStatus;
use App\Models\Sanofi\SanofiRequestType;
use App\Models\Sanofi\SanofiHacat;
use App\Models\Sanofi\GenfarIndustryKey;
use App\Models\User;
//use App\Mail\SanofiRiskCreate;
use App\Mail\GenfarCreateSupplier;
use App\Mail\GenfarAprobarSupplier;
use App\Mail\GenfarConfirmarSupplier;
use App\Mail\eProveedoresApproveNotificaction;
use App\Mail\eProveedoresConfirmNotificaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\MailNotify;
use App\Exports\SanofiExportsSuppliers;


class GenfarSupliersCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
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

            /*
            
            $provider = SanofiProvider::find($key->genfar_provider);
            $provider ? $key->genfar_provider = $provider->name : $key->genfar_provider = "Sin Información";

            
            $type = SanofiRequestType::find($key->request_type);
            $type ? $key->request_type = $type->name : $key->request_type = "Sin Información";


            $status = SanofiRequestStatus::find($key->status_id);
            $key->status_id = $status->name;
            $key->class = $status->class;
            $key->status = $status->id;
            $key->user_solicitante = $user_solicitante->name;
            */

        }  


        return view('dashboard.sanofi.supliers.index', compact('requests_risk', 'you'));
    }

    /**
     * Send Email notification the specified resource from storage.
     *
     */    
    public function pending_notification() 
    {

        $requests_risk_no_approve = GenfarSupliersCreation::where('approve',NULL)->get();

        $userApprove = array("hyndayara.martins@eurofarma.com");
  
        
        $data_approve = array(
            'tickets' => $requests_risk_no_approve,
            'amount' => count($requests_risk_no_approve)
        );
		
		Mail::to($userApprove)->send(new eProveedoresApproveNotificaction($data_approve));
        
        return redirect()->back()->with('success', 'El correo de Solicitudes Pendientes por Aprobar se ha enviado.');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $you = auth()->user();
        $requests_risk = GenfarSupliersCreation::where('status', 0 )->get();

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

            /*
            
            $provider = SanofiProvider::find($key->genfar_provider);
            $provider ? $key->genfar_provider = $provider->name : $key->genfar_provider = "Sin Información";

            
            $type = SanofiRequestType::find($key->request_type);
            $type ? $key->request_type = $type->name : $key->request_type = "Sin Información";


            $status = SanofiRequestStatus::find($key->status_id);
            $key->status_id = $status->name;
            $key->class = $status->class;
            $key->status = $status->id;
            $key->user_solicitante = $user_solicitante->name;
            */

        }  
        return view('dashboard.sanofi.supliers.pending', compact('requests_risk', 'you'));
    }


    public function getIndustryKey($id) 
    {
        return GenfarIndustryKey::where('provider_id', $id)->pluck('name', 'id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAsGenfar($solicitud)
    {
        $solicitud = SanofiRequestRisk::find($solicitud);
        $hacats = SanofiHacat::all();
        $societies = SanofiHomologationCountry::all();
        $providers = SanofiProvider::all();
        $statusses = RequestRiskStatus::all();
        $types = SanofiRequestType::all();
        $industrykeys = GenfarIndustryKey::all();
        return view('dashboard.sanofi.supliers.create', compact('industrykeys', 'societies', 'providers', 'statusses', 'types', 'hacats', 'solicitud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitud = null;
        $hacats = SanofiHacat::all();
        $societies = SanofiHomologationCountry::all();
        $providers = SanofiProvider::all();
        $statusses = RequestRiskStatus::all();
        $types = SanofiRequestType::all();
        $industrykeys = GenfarIndustryKey::all();
        return view('dashboard.sanofi.supliers.create', compact('industrykeys', 'societies', 'providers', 'statusses', 'types', 'hacats', 'solicitud'));
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

        $copiasCorreos  = array($user->email,"catherine.ramirez@genfar.com","laura.garciacortes-ext@genfar.com");
        $copiasCorreoCompras = array($user->email,"catherine.ramirez@genfar.com");

        $validatedData = $request->validate([
            'paises' => 'required',
            'name_proveedor' => 'required',
            'tax_id' => 'required'
        ],[
            'paises' => 'Seleccione un respusta',
            'name_proveedor' => 'Seleccione un respusta',
            'tax_id' => 'Seleccione un respusta'
        ]);


        $input['paises'] = $request->input('paises');
        
        $request_risk = new GenfarSupliersCreation();

        $request_risk->solicitante = $user->id;
        $request_risk->genfar_provider = $request->input('genfar_provider');
        $request_risk->country_homologation = $request->input('country_homologation');
        $request_risk->paises = json_encode($request->input('paises'));
        $request_risk->provider_name = $request->input('name_proveedor');
        $request_risk->tax_id = $request->input('tax_id');
        $request_risk->provider_mail = $request->input('email');
        $request_risk->provider_phone = $request->input('telefono');

        /* Hacat field */
        if ($request->input('genfar_provider') == 1 or $request->input('genfar_provider') == 3 or $request->input('genfar_provider') == 4 or
        $request->input('genfar_provider') == 5 ) {
            $request_risk->hacat = $request->input('hacat');    
        }

        /* Industry Key field */
        if ($request->input('genfar_provider') == 2 or $request->input('genfar_provider') == 3 or $request->input('genfar_provider') == 4 or
        $request->input('genfar_provider') == 5 or $request->input('genfar_provider') == 6 ) {
            $request_risk->industrykey = $request->input('industrykey');
        }

        if($request->input('id')){
            $request_risk->id_genfar = $request->input('id');
        }

        $request_risk->action = $request->input('action');
        $request_risk->nacionality = $request->input('nacionality');

        if($request->input('suplier_code_co') != null){
            $request_risk->supplier_code_co = $request->input('suplier_code_co');
        }

        if($request->input('suplier_code_pe') != null){
            $request_risk->supplier_code_pe = $request->input('suplier_code_pe');
        }

        if($request->input('suplier_code_ec') != null){
            $request_risk->supplier_code_ec = $request->input('suplier_code_ec');
        }

        
        $request_risk->date_request = Carbon::now();
        $request_risk->comments = $request_risk->date_request." ".$request->input('comments');
        
        
        $SanofiHomologationCountry = SanofiHomologationCountry::find($request_risk->country_homologation);

        foreach ($input['paises'] as $key => $pais) {
            $country = SanofiHomologationCountry::find($pais);
            $input['paises'][$key] = $country->country;
        }

        $paises = implode(",", $input['paises']);


        /* SEND EMAIL */

        $fileToClient = $request->file('attachment');
        
        $request_risk->status = 0;
        
        $request_risk->save();
        
       if(!$fileToClient){

            $data = array(
                'name_solicitante' => $user->name,
                'id_task' => "TASK-0".$request_risk->id,
                'id' => $request_risk->id,
                'action' => $request->input('action'),
                'provider' => $request->input('name_proveedor'),
                'comments' => $request_risk->comments,
                'file_to_client' => 0
            );

            $request_risk->attachment = "Sin Adjunto";

            if($request_risk->genfar_provider != 2){
                Mail::to($copiasCorreos)->send(new GenfarCreateSupplier($data));
            }else{
                Mail::to($copiasCorreoCompras)->send(new GenfarCreateSupplier($data));
            }

        }else{

            $data = array(
                'name_solicitante' => $user->name,
                'id_task' => "TASK-0".$request_risk->id,
                'id' => $request_risk->id,
                'action' => $request->input('action'),
                'provider' => $request->input('name_proveedor'),
                'comments' => $request_risk->comments,
                'file_to_client' => $fileToClient
            );

            $fileInformeName = 'SUP-'.$request_risk->id.'.'.$fileToClient->getClientOriginalExtension();
            $request_risk->update(['attachment' => $fileToClient->storeAs('SANOFI/SUPLIERS/'.$request_risk->id, $fileInformeName)]);

            if($request_risk->genfar_provider != 2){
                Mail::to($copiasCorreos)->send(new GenfarCreateSupplier($data));
            }else{
                Mail::to($copiasCorreoCompras)->send(new GenfarCreateSupplier($data));
            }
        }

        return redirect ('/genfar-supliers')->with('success','La Tarea se ha sido creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanofi\GenfarSupliersCreation  $genfarSupliersCreation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_risk = GenfarSupliersCreation::find($id);
        $hacats = SanofiHacat::all();
        $statuses = SanofiRequestStatus::all();
        $user = auth()->user();


        $user_solicitante = User::find($request_risk->solicitante);
        if(is_null($request_risk->solicitante)){
            $request_risk->solicitante = "Sin Asignar";
        }else{
            $user = User::find($request_risk->solicitante);
            $request_risk->solicitante = $user->name;
        }
        
        if(is_null($request_risk->country_homologation)){
            $request_risk->country_homologation = "Sin Asignar";
        }else{
            $countryHomologation = SanofiHomologationCountry::find($request_risk->country_homologation);
            $request_risk->country_homologation = $countryHomologation->name;
        }

        if(is_null($request_risk->genfar_provider)){
            $request_risk->genfar_provider = "Sin Asignar";
        }else{
            if($request_risk->genfar_provider == 7){
                $request_risk->genfar_provider = "Empleados";
            }else{
                $provider = SanofiProvider::find($request_risk->genfar_provider);
                $request_risk->genfar_provider = $provider->name;
            }
        }

        if(is_null($request_risk->industrykey)){
            $request_risk->industrykey = "No APLICA";
        }else{
            $industrykey = GenfarIndustryKey::find($request_risk->industrykey);
            $request_risk->industrykey = $industrykey->name;
        }

        

        $paises = json_decode($request_risk->paises);
        

        foreach ($paises as $key => $pais) {
            $country = SanofiHomologationCountry::find($pais);
            $paises[$key] = $country->country;
            switch ($pais) {
                case "2":
                    $request_risk->supplier_code_co_q = "CO";
                    break;
                case "3":
                    $request_risk->supplier_code_pe_q = "PE";
                    break;
                case "4":
                    $request_risk->supplier_code_ec_q = "EC";
                    break;                                
                default:
                    break;
            }
            
        }
        $request_risk->paises = implode(", ", $paises);

        /*
        $provider = SanofiProvider::find($request_risk->genfar_provider); 
        $request_risk->genfar_provider = $provider->name;

        $statusName = SanofiRequestStatus::find($request_risk->status_id);
        $request_risk->status_id_name = $statusName->name;

        $type = SanofiRequestType::find($request_risk->request_type);
        $type ? $request_risk->request_type = $type->name : $request_risk->request_type = "Sin Información";
        */

        $hacats = SanofiHacat::all();
        $societies = SanofiHomologationCountry::all();
        $providers = SanofiProvider::all();
        $statusses = RequestRiskStatus::all();
        $types = SanofiRequestType::all();
        $industrykeys = GenfarIndustryKey::all();

        return view('dashboard.sanofi.supliers.show',compact('request_risk', 'user', 'industrykeys', 'societies', 'providers', 'statusses', 'types', 'hacats'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\GenfarSupliersCreation  $genfarSupliersCreation
     * @return \Illuminate\Http\Response
     */
    public function edit($genfarSupliersCreation)
    {


    }
	
    public function aprobar(Request $request){

        $request->validate([
            'resumen' => 'required',
            'observacion' => 'required'
        ]);

        $fecha_hoy = Carbon::now();
        $request_risk = GenfarSupliersCreation::find($request->id);
        $solicitante = User::find($request_risk->solicitante);

        $you = auth()->user();

        $request_risk->approve = $request->input('resumen');
        if($request->input('supplier_code_co') != null){
            $request_risk->supplier_code_co = $request->input('supplier_code_co');
        }

        if($request->input('supplier_code_pe') != null){
            $request_risk->supplier_code_pe = $request->input('supplier_code_pe');
        }

        if($request->input('supplier_code_ec') != null){
            $request_risk->supplier_code_ec = $request->input('supplier_code_ec');
        }

        if($request->input('resumen') == "RECHAZAR"){
            $observacion = "RECHAZADO";
        }else {
            $observacion = "APROBADO";
        }

        
        
        /* SEND APROBACION EMAIL  */

        /*ADDING FILES*/
        $fileReporte = $request->file('approve_file');


        if($fileReporte!=null){

            /*Nombre del archivo*/ 
            $fileReporteName = 'ADJUNTO_APROBACION-'.$request_risk->id.'.'.$fileReporte->getClientOriginalExtension();
            $request_risk->update(['approve_file' => $fileReporte->storeAs('SANOFI/SUPLIERS/'.$request_risk->id, $fileReporteName)]);   

            /* SEND EMAIL */        
            $data = array(
                'name_solicitante' => $solicitante->name,
                'id_task' => "TASK-0".$request_risk->id,
                'id' => $request_risk->id,
                'resumen' => $observacion,
                'comments' => $request->input('observacion'),
                'file_to_client' => $fileReporte
            );
            /* Si hay archivo **/

            if ($request_risk->action == "Bloquear") {
                if ($request->input('resumen') == "APROBAR") {
                    $request_risk->status = 1;
                    $request_risk->date_updated = Carbon::now();
                    $request_risk->date_approve = Carbon::now();
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                }elseif ($request->input('resumen') == "RECHAZAR") {
                    $request_risk->status = 2;
                    $request_risk->date_updated = Carbon::now();
                    $request_risk->save();
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                }     
            }else{
                if ($request->input('resumen') == "APROBAR") {
                    $request_risk->status = 1;
                    $request_risk->date_updated = Carbon::now();
                    $request_risk->date_approve = Carbon::now();
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                }elseif ($request->input('resumen') == "RECHAZAR") {
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                    $request_risk->status = 2;
                    $request_risk->date_updated = Carbon::now();
                    $request_risk->save();
                }
            }

        }else {
            $data = array(
                'name_solicitante' => $solicitante->name,
                'id_task' => "TASK-0".$request_risk->id,
                'id' => $request_risk->id,
                'resumen' => $observacion,
                'comments' => $request->input('observacion'),
                'file_to_client' => 0
            );
    
            if ($request_risk->action == "Bloquear") {
                if ($request->input('resumen') == "APROBAR") {
                    $request_risk->status = 1;
                    $request_risk->date_updated = Carbon::now();
                    $request_risk->date_approve = Carbon::now();
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                }elseif ($request->input('resumen') == "RECHAZAR") {
                    $request_risk->status = 2;
                    $request_risk->date_updated = Carbon::now();;
                    $request_risk->save();
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                }     
            }else{
                if ($request->input('resumen') == "APROBAR") {
                    $request_risk->status = 1;
                    $request_risk->date_updated = Carbon::now();
                    $request_risk->date_approve = Carbon::now();
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                }elseif ($request->input('resumen') == "RECHAZAR") {
                    Mail::to($solicitante->email)->send(new GenfarAprobarSupplier($data));
                    $request_risk->status = 2;
                    $request_risk->date_updated = Carbon::now();;
                    $request_risk->save();
                }
            }
        }

        $request_risk->comments .= " | ".$fecha_hoy." ".$you->name." ESTADO APROBACIÓN: ".$observacion." OBSERVACIÓN: ".$request->input('observacion');
        $request_risk->save();
       
        return redirect()->back()->with('error', 'La solicitud se ha Aprobado satisfactoriamente.');

    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Diligence  $diligence
     * @return \Illuminate\Http\Response
     */
    public function downloadattach($id){
        $request_risk = GenfarSupliersCreation::find($id);
        return \Storage::download($request_risk->attachment);
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Diligence  $diligence
     * @return \Illuminate\Http\Response
     */
    //public function downloadattachConfirmation($id){
    //    $request_risk = GenfarSupliersCreation::find($id);
    //    return \Storage::download($request_risk->confirm_file);
    //}

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Diligence  $diligence
     * @return \Illuminate\Http\Response
     */
    public function downloadattachAprobation($id){
        $request_risk = GenfarSupliersCreation::find($id);
        return \Storage::download($request_risk->approve_file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\GenfarSupliersCreation  $genfarSupliersCreation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha_hoy = Carbon::now();
        $request_risk = GenfarSupliersCreation::find($id);
        $user_solicitante = User::find($request_risk->solicitante);
        $copiasCorreos  = array($user_solicitante->email,"catherine.ramirez@genfar.com","laura.garciacortes-ext@genfar.com");
        $copiasCorreoCompras = array($user_solicitante->email,"catherine.ramirez@genfar.com");

        $input['paises'] = $request->input('paises');
        $request_risk->genfar_provider = $request->input('genfar_provider');
        $request_risk->country_homologation = $request->input('country_homologation');
        $request_risk->paises = json_encode($request->input('paises'));
        $request_risk->provider_name = $request->input('name_proveedor');
        $request_risk->tax_id = $request->input('tax_id');
        $request_risk->provider_mail = $request->input('email');
        $request_risk->provider_phone = $request->input('telefono');
        $request_risk->action = $request->input('action');
        $request_risk->nacionality = $request->input('nacionality');
        $request_risk->supplier_code_co = $request->input('suplier_code_co');
        $request_risk->supplier_code_pe = $request->input('suplier_code_pe');
        $request_risk->supplier_code_ec = $request->input('suplier_code_ec');
        $request_risk->comments .= " | ".$fecha_hoy." ".$user_solicitante->name." OBSERVACIÓN: ".$request->input('comments');
        $request_risk->approve = null;
        $request_risk->confirm = null;
        $request_risk->status = 0;
        $request_risk->date_request = Carbon::now();

        
        /* Hacat field */
        if ($request->input('genfar_provider') == 1 or $request->input('genfar_provider') == 3 or $request->input('genfar_provider') == 4 or
        $request->input('genfar_provider') == 5 ) {
            $request_risk->hacat = $request->input('hacat');    
        }

        /* Industry Key field */
        if ($request->input('genfar_provider') == 2 or $request->input('genfar_provider') == 3 or $request->input('genfar_provider') == 4 or
        $request->input('genfar_provider') == 5 or $request->input('genfar_provider') == 6 ) {
            $request_risk->industrykey = $request->input('industrykey');
        }


        $SanofiHomologationCountry = SanofiHomologationCountry::find($request_risk->country_homologation);

        foreach ($input['paises'] as $key => $pais) {
            $country = SanofiHomologationCountry::find($pais);
            $input['paises'][$key] = $country->country;
        }

        $paises = implode(",", $input['paises']);


        /* SEND EMAIL */

        $fileToClient = $request->file('attachment');
        
        if($request_risk->save())
        {

            if(!$fileToClient){

                $data = array(
                    'name_solicitante' => $user_solicitante->name,
                    'id_task' => "TASK-0".$request_risk->id,
                    'id' => $request_risk->id,
                    'action' => $request->input('action'),
                    'provider' => $request->input('name_proveedor'),
                    'comments' => $request_risk->comments,
                    'file_to_client' => 0
                );
    
                $request_risk->attachment = "Sin Adjunto";
                if($request_risk->genfar_provider != 2){
                    Mail::to($copiasCorreos)->send(new GenfarCreateSupplier($data));
                }else{
                    Mail::to($copiasCorreoCompras)->send(new GenfarCreateSupplier($data));
                }
    
            }else{
    
                $data = array(
                    'name_solicitante' => $user_solicitante->name,
                    'id_task' => "TASK-0".$request_risk->id,
                    'id' => $request_risk->id,
                    'action' => $request->input('action'),
                    'provider' => $request->input('name_proveedor'),
                    'comments' => $request_risk->comments,
                    'file_to_client' => $fileToClient
                );
    
                $fileInformeName = 'SUP-'.$request_risk->id.'.'.$fileToClient->getClientOriginalExtension();
                $request_risk->update(['attachment' => $fileToClient->storeAs('SANOFI/SUPLIERS/'.$request_risk->id, $fileInformeName)]);
    
                if($request_risk->genfar_provider != 2){
                    Mail::to($copiasCorreos)->send(new GenfarCreateSupplier($data));
                }else{
                    Mail::to($copiasCorreoCompras)->send(new GenfarCreateSupplier($data));
                }
            }
        }

        return redirect ('/genfar-supliers')->with('success','La Tarea se ha sido modificada satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\GenfarSupliersCreation  $genfarSupliersCreation
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenfarSupliersCreation $genfarSupliersCreation)
    {
        //
    }

    /**
     * Export the specified resource from storage.
     *
     */    
    public function export() 
    {
        return Excel::download(new SanofiExportsSuppliers, 'GenfarTaskSuppliers.xlsx');
    }
}
