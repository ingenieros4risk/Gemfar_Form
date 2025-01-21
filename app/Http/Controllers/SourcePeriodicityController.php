<?php

namespace App\Http\Controllers;

use App\Models\Source\SourcePeriodicity;
use Illuminate\Http\Request;

class SourcePeriodicityController extends Controller
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
        $periodicities = SourcePeriodicity::all();
        return view('dashboard.sources.periodicities.index', compact('periodicities', 'you'));
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
     * @param  \App\Models\Source\SourcePeriodicity  $sourcePeriodicity
     * @return \Illuminate\Http\Response
     */
    public function show(SourcePeriodicity $sourcePeriodicity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source\SourcePeriodicity  $sourcePeriodicity
     * @return \Illuminate\Http\Response
     */
    public function edit(SourcePeriodicity $sourcePeriodicity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source\SourcePeriodicity  $sourcePeriodicity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourcePeriodicity $sourcePeriodicity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source\SourcePeriodicity  $sourcePeriodicity
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourcePeriodicity $sourcePeriodicity)
    {
        //
    }
}
