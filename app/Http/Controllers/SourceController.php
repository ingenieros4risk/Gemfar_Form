<?php

namespace App\Http\Controllers;

use App\Exports\SourceExport;
use App\Models\Source;
use App\Models\Source\SourceImpact;
use App\Models\Source\SourceMonitor;
use App\Models\Source\SourcePeriodicity;
use App\Models\Source\SourcePriority;
use App\Models\Source\SourceStatus;
use App\Models\Source\SourceType;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $sources = Source::all();
        foreach ($sources as $source) {
            $name_user = User::find($source->users_id);
            if ($name_user) {
                $source->users_id = $name_user->name;  
            }else{
                $source->users_id = "Sin Responsable";
            }
            $impact = SourceImpact::find($source->impact_id);
            $monitor = SourceMonitor::find($source->monitor_id);
            $periodicity = SourcePeriodicity::find($source->periodicity_id);
            $priority = SourcePriority::find($source->priority_id);
            $status = SourceStatus::find($source->status_id);
            $type= SourceType::find($source->type_id);
            $flag = Country::find($source->country_id);
            //
            $source->impact_id = $impact->name;
            $source->monitor_id = $monitor->name;
            $source->periodicity_id = $periodicity->name;
            $source->priority_id = $priority->name;
            $source->status_id = $status->name;
            $source->type_id = $type->name;
            $source->country_id = $flag->flag;
        }
        return view('dashboard.sources.index', compact('sources', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impacts = SourceImpact::all();
        $monitors = SourceMonitor::all();
        $periodicities = SourcePeriodicity::all();
        $priorities = SourcePriority::all();
        $statuses = SourceStatus::all();
        $types = SourceType::all();
        $users = User::all();
        $countries = Country::all();

        return view('dashboard.sources.create',compact('impacts', 'monitors', 'periodicities', 'priorities', 'statuses','types','users', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $source = new Source();
        $source->name = $request->input('name');
        $source->link = $request->input('link');
        $source->link_short = $request->input('link_short');
        $source->users_id = $request->input('users_id');
        $source->country_id = $request->input('country_id');
        $source->periodicity_id = $request->input('periodicity_id');
        $source->priority_id = $request->input('priority_id');
        $source->impact_id = $request->input('impact_id');
        $source->status_id = $request->input('status_id');
        $source->type_id = $request->input('type_id');
        $source->monitor_id = $request->input('monitor_id');
        $source->comment = $request->input('comment');
        $source->section = $request->input('section');
        
        if($source->save()){
            $request->session()->flash('message', 'Fuente creada satisfactoriamente.');
            return redirect()->route('sources.index');
        }else{
            $request->session()->flash('message', 'Error al crear Fuente.');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function fix()
    {
        $sources = Source::all();
        foreach ($sources as $source) {
            $var = $this->ChangeAphostrophes($source->link_short);
            $source->link_short = $var;
            $source->save();
        }
        dd("Done!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function ChangeAphostrophes($source)
    {
        $source = str_replace(
            array('https://www.', 'http://www.', 'http://', 'https://', 'www.'),
            array('', '', '', '', ''),
            $source);

        return $source;
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $source = Source::find($id);
        $impacts = SourceImpact::all();
        $monitors = SourceMonitor::all();
        $periodicities = SourcePeriodicity::all();
        $priorities = SourcePriority::all();
        $statuses = SourceStatus::all();
        $types = SourceType::all();
        $users = User::all();
        $countries = Country::all();

        $impact = SourceImpact::find($source->impact_id);
        $monitor = SourceMonitor::find($source->monitor_id);
        $periodicity = SourcePeriodicity::find($source->periodicity_id);
        $priority = SourcePriority::find($source->priority_id);
        $status = SourceStatus::find($source->status_id);
        $type = SourceType::find($source->type_id);
        $user = User::find($source->users_id);
        $country = Country::find($source->country_id);

        $source->impact_id = $impact->name;
        $source->monitor_id = $monitor->name; 
        $source->periodicity_id = $periodicity->name;
        $source->priority_id = $priority->name;
        $source->status_id = $status->name;
        $source->type_id = $type->name;
        $source->country_id = $country->flag;
        
        if ($user) {
            $user = User::find($source->users_id);
            $source->users_id = $user->name;
        }else{
            $source->users_id = "Sin asignar";
        }

        return view('dashboard.sources.edit',compact('source', 'impacts', 'monitors', 'periodicities', 'priorities', 'statuses','types','users', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $source = Source::find($id);
        $source->name = $request->input('name');
        $source->link = $request->input('link');
        $source->link_short = $request->input('link_short');
        $source->users_id = $request->input('users_id');
        $source->country_id = $request->input('country_id');
        $source->periodicity_id = $request->input('periodicity_id');
        $source->priority_id = $request->input('priority_id');
        $source->impact_id = $request->input('impact_id');
        $source->status_id = $request->input('status_id');
        $source->type_id = $request->input('type_id');
        $source->monitor_id = $request->input('monitor_id');
        $source->comment = $request->input('comment');
        $source->section = $request->input('section');
        
        if($source->save()){
            $request->session()->flash('message', 'Fuente actualizada satisfactoriamente.');
            return redirect()->route('sources.index');
        }else{
            $request->session()->flash('message', 'Error al actualizar Fuente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        //
    }

    /**
     * Export the specified resource from storage.
     *
     */    
    public function export() 
    {
        return Excel::download(new SourceExport, 'fuentes.xlsx');
    }
}
