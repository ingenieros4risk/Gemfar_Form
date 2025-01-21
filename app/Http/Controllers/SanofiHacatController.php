<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHacat;
use Illuminate\Http\Request;

class SanofiHacatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $hacats = SanofiHacat::all();  
        return view('dashboard.sanofi.hacat.index', compact('hacats', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiHacat  $sanofiHacat
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHacat $sanofiHacat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHacat  $sanofiHacat
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHacat $sanofiHacat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHacat  $sanofiHacat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHacat $sanofiHacat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHacat  $sanofiHacat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHacat $sanofiHacat)
    {
        //
    }
}
