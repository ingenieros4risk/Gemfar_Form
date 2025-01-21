<?php

namespace App\Http\Controllers;

use App\Models\Inspektor\InspektorParameterization;
use App\Models\Inspektor\InspektorParameterizationType;
use App\Models\Inspektor\InspektorList;
use App\Models\Inspektor\InspektorPriority;
use Illuminate\Http\Request;

class InspektorParameterizationController extends Controller
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
        $parameterizations = InspektorParameterization::all();
        return view('dashboard.inspektor.parameterizations.index', compact('parameterizations', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $you = auth()->user();
        $types = InspektorParameterizationType::all();
        $lists = InspektorList::all();
        $priorities = InspektorPriority::all();
        return view('dashboard.inspektor.parameterizations.create', compact('types','you','lists','priorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $input['value'] = $request->input('value');


        $parameterization = new InspektorParameterization();
        $parameterization->name = $request->input('name');
        $parameterization->type_id = $request->input('type_id');
        $parameterization->color = $request->input('color');
        $parameterization->message = $request->input('message');
        $parameterization->value = json_encode($request->input('value'));
        $parameterization->save();
        $request->session()->flash('message', 'Parametrización creada satisfactoriamente.');
        return redirect()->route('parameterizations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorParameterization  $inspektorParameterization
     * @return \Illuminate\Http\Response
     */
    public function show(InspektorParameterization $inspektorParameterization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorParameterization  $inspektorParameterization
     * @return \Illuminate\Http\Response
     */
    public function edit(InspektorParameterization $inspektorParameterization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspektor\InspektorParameterization  $inspektorParameterization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspektorParameterization $inspektorParameterization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspektor\InspektorParameterization  $inspektorParameterization
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspektorParameterization $inspektorParameterization)
    {
        //
    }
}
