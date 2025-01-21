<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHasPoster;
use Illuminate\Http\Request;

class SanofiHasPosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $posters = SanofiHasPoster::all();  
        return view('dashboard.sanofi.has_poster.index', compact('posters', 'you'));        
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
     * @param  \App\Models\Sanofi\SanofiHasPoster  $sanofiHasPoster
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHasPoster $sanofiHasPoster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHasPoster  $sanofiHasPoster
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHasPoster $sanofiHasPoster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHasPoster  $sanofiHasPoster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHasPoster $sanofiHasPoster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHasPoster  $sanofiHasPoster
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHasPoster $sanofiHasPoster)
    {
        //
    }
}
