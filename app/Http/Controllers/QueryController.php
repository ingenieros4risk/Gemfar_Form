<?php

namespace App\Http\Controllers;

use App\Models\Query\QueryStatus;
use App\Models\Query\QueryType;
use App\Models\Inspektor\InspektorGroupList;
use App\Models\Inspektor\InspektorList;
use App\Models\Query;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;


class QueryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['search', 'findWSInspektor']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $queries = Query::all();
        foreach ($queries as $query) {
            $user = User::find($query->user_id);
            $type = QueryType::find($query->query_type_id);
            $status = QueryStatus::find($query->query_status_id);

            $query->user_id = $user->name;
            $query->query_type_id = $type->name;
            $query->query_status_id = $status->name;
        }
        return view('dashboard.queries.index', compact('you', 'queries'));
    }

    public function findWSInspektor()
    {
        return view('dashboard.queries.inspektor');
    }

    public function findVenezuelaCNE()
    {
        return view('dashboard.queries.cne_venezuela');
    }

    /**
     * Display result of the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $respuesta = "";
        $password = "R1sk.2020*";
        $user = auth()->user();
        //$nombre = "Michael";
        //$documento = "1022393617";
        $nombre = $request->get('name');
        $documento = $request->get('document');
        $urlstring = "https://inspektortest.datalaft.com:8770/WSInspektor.asmx/LoadWSInspektor?Numeiden=".$documento."&Nombre=".$nombre."&Password=".$password;

        $response = Http::get($urlstring);

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $text = trim($array[0]);

        $query = new Query();
        $query->input = "Nombre:".$nombre." | Documento:".$documento;
        $query->answer = $text;
        $query->user_id = 0;
        $query->query_type_id = 1;
        $query->query_status_id = 2;
        $query->save();
        
        $message = url("/queries/".$query->id);

        return redirect()->back()->with('message', $message);
    }

        /**
     * Display result of the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_ve(Request $request)
    {
        $respuesta = "";
        $user = auth()->user();

        $urlstring = "http://www.cne.gob.ve/web/registro_electoral/ce.php?nacionalidad=".$request->tipo."&cedula=".$request->document;

        $response = Http::get($urlstring);

        $respuesta = $response->body();

        return Response($respuesta);
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Query::find($id);
        $user = User::find($query->user_id);
        $type = QueryType::find($query->query_type_id);
        $status = QueryStatus::find($query->query_status_id);
        $collection = collect([]);

        $query->user_id = $user->name;
        $query->query_type_id = $type->name;
        $query->query_status_id = $status->name;

        $arrayResult[] = explode('#', $query->answer, 3);

        $numconsulta = trim($arrayResult[0][0],"Número de consulta: ");
        $cantidadcoincidencias = trim($arrayResult[0][1],"Cantidad de coincidencias: ");

        if(empty($arrayResult[0][2])){
            $data = collect([
                'No' => "No ",
                'Prioridad' => "Hay ",
                'TipoDocumento' => "coincidencias ",
                'Documento' => "en ",
                'Nombre' => "esta ",
                'NumeroLista' => "consulta ",
                'NombreLista' => "",
                'Color' => ""
            ]);
            $collection->push($data);
        }else{
            $results = $arrayResult[0][2];
            $dataTrama = explode("#", $results);

            foreach ($dataTrama as $val) {
                $trama = explode("|", $val);

                $lista = InspektorList::find(trim($trama[5],"Número tipo lista: "));
                $group =InspektorGroupList::find($lista->group_id);
                
                $data = collect([
                    'No' => trim($trama[0],"No: "),
                    'Prioridad' => trim($trama[1],"Prioridad: "),
                    'TipoDocumento' => trim($trama[2],"Tipo documento:"),
                    'Documento' => trim($trama[3],"Numero documento: "),
                    'Nombre' => trim($trama[4],"Nombre: "),
                    'NumeroLista' => trim($trama[5],"Número tipo lista: "),
                    'NombreLista' => $trama[6],
                    'Color' => $group->color
                ]);
                $collection->push($data);
            }    
        }
        return view('dashboard.queries.show', compact( 'query','collection','numconsulta','cantidadcoincidencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit(Query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
    }
}
