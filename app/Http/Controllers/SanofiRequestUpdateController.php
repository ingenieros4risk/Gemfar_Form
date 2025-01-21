<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiRequestUpdate;
use Illuminate\Http\Request;

class SanofiRequestUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $requests_risk_updates = SanofiRequestUpdate::all();

        return view('dashboard.sanofi.request_update.index', compact('requests_risk_updates', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiRequestUpdate  $sanofiRequestUpdate
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiRequestUpdate $sanofiRequestUpdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestUpdate  $sanofiRequestUpdate
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiRequestUpdate $sanofiRequestUpdate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiRequestUpdate  $sanofiRequestUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiRequestUpdate $sanofiRequestUpdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiRequestUpdate  $sanofiRequestUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiRequestUpdate $sanofiRequestUpdate)
    {
        //
    }
}