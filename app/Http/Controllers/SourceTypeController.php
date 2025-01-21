<?php

namespace App\Http\Controllers;

use App\Models\Source\SourceType;
use Illuminate\Http\Request;

class SourceTypeController extends Controller
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
        $types = SourceType::all();
        return view('dashboard.sources.types.index', compact('types', 'you'));
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
     * @param  \App\Models\Source\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function show(SourceType $sourceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function edit(SourceType $sourceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceType $sourceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source\SourceType  $sourceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceType $sourceType)
    {
        //
    }
}
