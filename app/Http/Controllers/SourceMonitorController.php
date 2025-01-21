<?php

namespace App\Http\Controllers;

use App\Models\Source\SourceMonitor;
use Illuminate\Http\Request;

class SourceMonitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $monitors = SourceMonitor::all();
        return view('dashboard.sources.monitors.index', compact('monitors', 'you'));
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
     * @param  \App\Models\Source\SourceMonitor  $sourceMonitor
     * @return \Illuminate\Http\Response
     */
    public function show(SourceMonitor $sourceMonitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source\SourceMonitor  $sourceMonitor
     * @return \Illuminate\Http\Response
     */
    public function edit(SourceMonitor $sourceMonitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source\SourceMonitor  $sourceMonitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceMonitor $sourceMonitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source\SourceMonitor  $sourceMonitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceMonitor $sourceMonitor)
    {
        //
    }
}
