<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\ClientType;
use App\Models\Inspektor\CurrentType;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Sanofi\SanofiRequestStatus;
use App\Models\GenfarClientForm;
use App\Models\User;
use App\Models\SociedadSolicitante;
use App\Models\TipoSolicitud;
use App\Models\Country;
use App\Models\SalesOrganization;
use App\Models\Channels;
use App\Models\Sector;
use App\Models\TypeSale;
use App\Models\GroupClients;
use App\Models\Oficinas_Ventas;
use App\Models\GrupoVendedores;



use Illuminate\Http\Request;
use Carbon\Carbon;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $clients = Clients::all();

        foreach ($clients as $key) {

            $user_solicitante = User::find($key->id_user);

            if(is_null($key->id_user)){
                $key->id_user = "Sin Asignar";
            }else{
                $user = User::find($key->id_user);
                $key->id_user = $user->name;
            }

            $status = SanofiRequestStatus::find($key->id_status);
            $key->id_status = $status->name;
            $key->class = $status->class;
            $key->status = $status->id;

            $client_type = ClientType::find($key->id_client_type);
            $key->id_client_type = $client_type->name;
        }

        return view('dashboard.sanofi.client.index', compact('clients','you'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients_types = ClientType::all();
        $sociedad_solicitantes = SociedadSolicitante::all();
        $tipos_solicitudes = TipoSolicitud::all();
        $countries = Country::all();
        $sales_organization = SalesOrganization::orderBy('name', 'asc')->get();
        $channels = Channels::orderBy('name', 'asc')->get();
        $sectors = Sector::orderBy('name', 'asc')->get();
        $type_sales = TypeSale::orderBy('name', 'asc')->get();
        $group_clients = GroupClients::orderBy('name', 'asc')->get();
        $oficinas_ventas = Oficinas_Ventas::orderBy('name', 'asc')->get();
        $grupos_vendedores = GrupoVendedores::orderBy('name', 'asc')->get();

        return view('dashboard.sanofi.client.create', compact(
            'clients_types','sociedad_solicitantes','tipos_solicitudes',
            'countries', 'sales_organization', 'channels',
            'sectors', 'type_sales', 'group_clients',
            'oficinas_ventas', 'grupos_vendedores'));
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
        $client = new Clients;

        $client->id_client_type = $request->input('id_client_type');
        $client->third_party_name = $request->input('third_party_name');
        $client->area_solicitante = $request->input('area_solicitante');
        $client->id_sociedad_solicitante = $request->input('id_sociedad_solicitante');
        $client->id_tipo_solicitud = $request->input('id_tipo_solicitud');
        $client->id_country = $request->input('id_country');
        $client->number_client = $request->input('number_client');
        $client->id_sales_organization = $request->input('id_sales_organization');
        $client->id_channel = $request->input('id_channel');
        $client->id_sector = $request->input('id_sector');
        $client->id_type_sale = $request->input('id_type_sale');
        $client->id_group_client = $request->input('id_group_client');
        $client->id_oficina_ventas = $request->input('id_oficina_ventas');
        $client->grupo_vendedores = $request->input('grupo_vendedores');
        $client->vol_men_esti_comp = $request->input('vol_men_esti_comp');
        $client->name_comercial = $request->input('name_comercial');
        $client->email = $request->input('email');
        $client->password = "G3NF4RR1SK";
        $client->id_user = $user->id;
        $client->date_solicitud = Carbon::now();
        $client->id_status = 1;

        // dd($client);
        $client->save();

        if($request->file('update_attachment_sales')){
            $fileReporte = $request->file('update_attachment_sales');
            $fileInformeName = $client->id.'-Proyeccion-Venta.'.$fileReporte->getClientOriginalExtension();
            $client->update(['update_attachment_sales' => $fileReporte->storeAs('GENFAR/CLIENTS/'.$client->id, $fileInformeName)]);
        }

        $request_client_form = new GenfarClientForm([
            'client_id' => $client->id,
            'password' => "G3NF4RR1SK"
        ]);

        $request_client_form->save();

        $request->session()->flash('error', 'Solicitud creada satisfactoriamente.');
        return redirect()->route('genfar-request-clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('Estoy en ClientsController@show'); 
        $user = auth()->user();
        $Client = Clients::find($id);
        $statuses = SanofiRequestStatus::all();
        $clientForm = GenfarClientForm::where('client_id', $Client->id)->first();
        $document_types = InspektorDocumentType::pluck('name', 'id')->toArray();
        $money = CurrentType::pluck('name', 'id')->toArray();
        $uploadedDocuments = $clientForm ? $clientForm->getUploadedDocuments() : [];

        return view('dashboard.sanofi.client.show',compact('Client', 'user', 'statuses', 'clientForm','document_types', 'money', 'uploadedDocuments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
