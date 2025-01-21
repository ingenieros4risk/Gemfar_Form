<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHomologationCountry;
use Illuminate\Http\Request;

class SanofiHomologationCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $countries = SanofiHomologationCountry::all();  
        return view('dashboard.sanofi.homologation_countries.index', compact('countries', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiHomologationCountry  $sanofiHomologationCountry
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHomologationCountry $sanofiHomologationCountry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHomologationCountry  $sanofiHomologationCountry
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHomologationCountry $sanofiHomologationCountry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHomologationCountry  $sanofiHomologationCountry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHomologationCountry $sanofiHomologationCountry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHomologationCountry  $sanofiHomologationCountry
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHomologationCountry $sanofiHomologationCountry)
    {
        //
    }
}
