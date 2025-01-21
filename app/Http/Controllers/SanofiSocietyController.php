<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiSociety;
use Illuminate\Http\Request;

class SanofiSocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $societies = SanofiSociety::all();  
        return view('dashboard.sanofi.societies.index', compact('societies', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiSociety  $sanofiSociety
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiSociety $sanofiSociety)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiSociety  $sanofiSociety
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiSociety $sanofiSociety)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiSociety  $sanofiSociety
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiSociety $sanofiSociety)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiSociety  $sanofiSociety
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiSociety $sanofiSociety)
    {
        //
    }
}
