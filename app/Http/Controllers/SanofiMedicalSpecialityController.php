<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiMedicalSpeciality;
use Illuminate\Http\Request;

class SanofiMedicalSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $especialities = SanofiMedicalSpeciality::all();  
        return view('dashboard.sanofi.medical_especialities.index', compact('especialities', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiMedicalSpeciality  $sanofiMedicalSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiMedicalSpeciality $sanofiMedicalSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiMedicalSpeciality  $sanofiMedicalSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiMedicalSpeciality $sanofiMedicalSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiMedicalSpeciality  $sanofiMedicalSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiMedicalSpeciality $sanofiMedicalSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiMedicalSpeciality  $sanofiMedicalSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiMedicalSpeciality $sanofiMedicalSpeciality)
    {
        //
    }
}
