<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHasAward;
use Illuminate\Http\Request;

class SanofiHasAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $awards = SanofiHasAward::all();  
        return view('dashboard.sanofi.has_awards.index', compact('awards', 'you'));        
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
     * @param  \App\Models\Sanofi\SanofiHasAward  $sanofiHasAward
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHasAward $sanofiHasAward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHasAward  $sanofiHasAward
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHasAward $sanofiHasAward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHasAward  $sanofiHasAward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHasAward $sanofiHasAward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHasAward  $sanofiHasAward
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHasAward $sanofiHasAward)
    {
        //
    }
}
