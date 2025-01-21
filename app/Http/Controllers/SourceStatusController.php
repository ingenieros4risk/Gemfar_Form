<?php

namespace App\Http\Controllers;

use App\Models\Source\SourceStatus;
use Illuminate\Http\Request;

class SourceStatusController extends Controller
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
        $statuses = SourceStatus::all();
        return view('dashboard.sources.statuses.index', compact('statuses', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sources.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $source = new SourceStatus();
        $source->name = $request->input('name');

        if ($source->save()) {
            $request->session()->flash('message', 'Fuente creada satisfactoriamente.');
            return redirect()->route('sources.statuses.index');
        }else{
            $request->session()->flash('message', 'Fuente no se ha podido crear.');
            return redirect()->route('sources.statuses.create');    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Source\SourceStatus  $sourceStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SourceStatus $sourceStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Source\SourceStatus  $sourceStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $you = auth()->user();
        $source = SourceStatus::find($id);
            
        return view('dashboard.sources.statuses.index', [ 'source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Source\SourceStatus  $sourceStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceStatus $sourceStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Source\SourceStatus  $sourceStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceStatus $sourceStatus)
    {
        //
    }
}
