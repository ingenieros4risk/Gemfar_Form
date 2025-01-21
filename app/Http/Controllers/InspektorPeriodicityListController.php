<?php

namespace App\Http\Controllers;

use App\Models\Inspektor\InspektorPeriodicityList;
use Illuminate\Http\Request;

class InspektorPeriodicityListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $periodicities = InspektorPeriodicityList::all();  
        return view('dashboard.inspektor.periodicities.index', compact('periodicities', 'you'));
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
     * @param  \App\Models\Inspektor\InspektorPeriodicityList  $inspektorPeriodicityList
     * @return \Illuminate\Http\Response
     */
    public function show(InspektorPeriodicityList $inspektorPeriodicityList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorPeriodicityList  $inspektorPeriodicityList
     * @return \Illuminate\Http\Response
     */
    public function edit(InspektorPeriodicityList $inspektorPeriodicityList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspektor\InspektorPeriodicityList  $inspektorPeriodicityList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspektorPeriodicityList $inspektorPeriodicityList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspektor\InspektorPeriodicityList  $inspektorPeriodicityList
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspektorPeriodicityList $inspektorPeriodicityList)
    {
        //
    }
}
