<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHasConference;
use Illuminate\Http\Request;

class SanofiHasConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $conferences = SanofiHasConference::all();  
        return view('dashboard.sanofi.has_conference.index', compact('conferences', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiHasConference  $sanofiHasConference
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHasConference $sanofiHasConference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHasConference  $sanofiHasConference
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHasConference $sanofiHasConference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHasConference  $sanofiHasConference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHasConference $sanofiHasConference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHasConference  $sanofiHasConference
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHasConference $sanofiHasConference)
    {
        //
    }
}
