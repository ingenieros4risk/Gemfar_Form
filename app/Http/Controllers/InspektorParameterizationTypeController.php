<?php

namespace App\Http\Controllers;

use App\Models\Inspektor\InspektorParameterizationType;
use Illuminate\Http\Request;

class InspektorParameterizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $types = InspektorParameterizationType::all();
        return view('dashboard.inspektor.parameterizations.types.index', compact('types', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Inspektor\InspektorParameterizationType  $inspektorParameterizationType
     * @return \Illuminate\Http\Response
     */
    public function show(InspektorParameterizationType $inspektorParameterizationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorParameterizationType  $inspektorParameterizationType
     * @return \Illuminate\Http\Response
     */
    public function edit(InspektorParameterizationType $inspektorParameterizationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspektor\InspektorParameterizationType  $inspektorParameterizationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspektorParameterizationType $inspektorParameterizationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspektor\InspektorParameterizationType  $inspektorParameterizationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspektorParameterizationType $inspektorParameterizationType)
    {
        //
    }
}
