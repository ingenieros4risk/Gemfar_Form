<?php

namespace App\Http\Controllers;

use App\Models\GenfarClientForm;
use App\Models\Clients;
use App\Models\Country;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiProvider;

use Illuminate\Http\Request;

class GenfarClientFormController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth', ['except' => ['create',]]);
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
        $clients_forms = GenfarClientForm::all();
        foreach ($clients_forms as $key) {

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

        return view('dashboard.clients.index', compact('clients_forms', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang,$id)
    {
        $clients_forms = GenfarClientForm::where('client_id',(int)$id)->first();

        return view('dashboard.sanofi.request_client.create', compact('clients_forms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenfarClientForm  $genfarClientForm
     * @return \Illuminate\Http\Response
     */
    public function show(GenfarClientForm $genfarClientForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GenfarClientForm  $genfarClientForm
     * @return \Illuminate\Http\Response
     */
    public function edit(GenfarClientForm $genfarClientForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenfarClientForm  $genfarClientForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenfarClientForm $genfarClientForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenfarClientForm  $genfarClientForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenfarClientForm $genfarClientForm)
    {
        //
    }
}
