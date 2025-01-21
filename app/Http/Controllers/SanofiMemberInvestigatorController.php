<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiMemberInvestigator;
use Illuminate\Http\Request;

class SanofiMemberInvestigatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $investigators = SanofiMemberInvestigator::all();  
        return view('dashboard.sanofi.member_investigator.index', compact('investigators', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiMemberInvestigator  $sanofiMemberInvestigator
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiMemberInvestigator $sanofiMemberInvestigator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiMemberInvestigator  $sanofiMemberInvestigator
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiMemberInvestigator $sanofiMemberInvestigator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiMemberInvestigator  $sanofiMemberInvestigator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiMemberInvestigator $sanofiMemberInvestigator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiMemberInvestigator  $sanofiMemberInvestigator
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiMemberInvestigator $sanofiMemberInvestigator)
    {
        //
    }
}
