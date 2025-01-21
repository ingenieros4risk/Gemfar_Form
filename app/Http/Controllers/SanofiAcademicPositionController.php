<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiAcademicPosition;
use Illuminate\Http\Request;

class SanofiAcademicPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $positions = SanofiAcademicPosition::all();  
        return view('dashboard.sanofi.academic_position.index', compact('positions', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiAcademicPosition  $sanofiAcademicPosition
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiAcademicPosition $sanofiAcademicPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiAcademicPosition  $sanofiAcademicPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiAcademicPosition $sanofiAcademicPosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiAcademicPosition  $sanofiAcademicPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiAcademicPosition $sanofiAcademicPosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiAcademicPosition  $sanofiAcademicPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiAcademicPosition $sanofiAcademicPosition)
    {
        //
    }
}
