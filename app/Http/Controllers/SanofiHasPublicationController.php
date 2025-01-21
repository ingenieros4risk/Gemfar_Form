<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHasPublication;
use Illuminate\Http\Request;

class SanofiHasPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $publications = SanofiHasPublication::all();  
        return view('dashboard.sanofi.has_publications.index', compact('publications', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiHasPublication  $sanofiHasPublication
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHasPublication $sanofiHasPublication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHasPublication  $sanofiHasPublication
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHasPublication $sanofiHasPublication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHasPublication  $sanofiHasPublication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHasPublication $sanofiHasPublication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHasPublication  $sanofiHasPublication
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHasPublication $sanofiHasPublication)
    {
        //
    }
}
