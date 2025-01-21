<?php

namespace App\Http\Controllers;

use App\Models\Source\SourcePriority;
use Illuminate\Http\Request;

class SourcePriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $priorities = SourcePriority::all();
        return view('dashboard.sources.priorities.index', compact('priorities', 'you'));
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
     * @param  \App\Models\Source\SourcePriority  $sourcePriority
     * @return \Illuminate\Http\Response
     */
    public function show(SourcePriority $sourcePriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source\SourcePriority  $sourcePriority
     * @return \Illuminate\Http\Response
     */
    public function edit(SourcePriority $sourcePriority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source\SourcePriority  $sourcePriority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourcePriority $sourcePriority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source\SourcePriority  $sourcePriority
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourcePriority $sourcePriority)
    {
        //
    }
}
