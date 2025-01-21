<?php

namespace App\Http\Controllers;

use App\Models\Inspektor\InspektorPriority;
use Illuminate\Http\Request;

class InspektorPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $priorities = InspektorPriority::all();

        return view('dashboard.inspektor.priorities.index', compact('priorities', 'you'));
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
     * @param  \App\Models\Inspektor\InspektorPriority  $inspektorPriority
     * @return \Illuminate\Http\Response
     */
    public function show(InspektorPriority $inspektorPriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorPriority  $inspektorPriority
     * @return \Illuminate\Http\Response
     */
    public function edit(InspektorPriority $inspektorPriority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspektor\InspektorPriority  $inspektorPriority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspektorPriority $inspektorPriority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspektor\InspektorPriority  $inspektorPriority
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspektorPriority $inspektorPriority)
    {
        //
    }
}
