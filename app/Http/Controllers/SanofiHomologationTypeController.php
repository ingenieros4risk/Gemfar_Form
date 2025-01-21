<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHomologationType;
use Illuminate\Http\Request;

class SanofiHomologationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $types = SanofiHomologationType::all();  
        return view('dashboard.sanofi.homologation_types.index', compact('types', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiHomologationType  $sanofiHomologationType
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHomologationType $sanofiHomologationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHomologationType  $sanofiHomologationType
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHomologationType $sanofiHomologationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHomologationType  $sanofiHomologationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHomologationType $sanofiHomologationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHomologationType  $sanofiHomologationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHomologationType $sanofiHomologationType)
    {
        //
    }
}
