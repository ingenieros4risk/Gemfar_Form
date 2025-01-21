<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiMemberSociety;
use Illuminate\Http\Request;

class SanofiMemberSocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $societies = SanofiMemberSociety::all();  
        return view('dashboard.sanofi.member_societies.index', compact('societies', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiMemberSociety  $sanofiMemberSociety
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiMemberSociety $sanofiMemberSociety)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiMemberSociety  $sanofiMemberSociety
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiMemberSociety $sanofiMemberSociety)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiMemberSociety  $sanofiMemberSociety
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiMemberSociety $sanofiMemberSociety)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiMemberSociety  $sanofiMemberSociety
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiMemberSociety $sanofiMemberSociety)
    {
        //
    }
}
