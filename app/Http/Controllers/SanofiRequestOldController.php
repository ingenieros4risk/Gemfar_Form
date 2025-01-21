<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiRequestOld;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequestRiskOldExport;
use Illuminate\Http\Request;

class SanofiRequestOldController extends Controller
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
        $requests_olds = SanofiRequestOld::all();
        $you = auth()->user();

        return view('dashboard.sanofi.request_old.index', compact('requests_olds', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiRequestOld  $sanofiRequestOld
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $request_old = SanofiRequestOld::find($id);

        return view('dashboard.sanofi.request_old.show',compact(
            'request_old',
            'user'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestOld  $sanofiRequestOld
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiRequestOld $sanofiRequestOld)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiRequestOld  $sanofiRequestOld
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiRequestOld $sanofiRequestOld)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiRequestOld  $sanofiRequestOld
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiRequestOld $sanofiRequestOld)
    {
        //
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\SanofiRequestOld
     * @return \Illuminate\Http\Response
     */
    public function downloadReportProvider($id){
        $sanofiRequestOlds = SanofiRequestOld::find($id);
        return \Storage::download($sanofiRequestOlds->url_doc_proveedor);
    }

        /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\SanofiRequestOld
     * @return \Illuminate\Http\Response
     */
    public function downloadReportHomologation($id){
        $sanofiRequestOlds = SanofiRequestOld::find($id);
        return \Storage::download($sanofiRequestOlds->url_doc_homologacion);
    }

    
    /**
     * Export the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiRequestRiskOld  $sanofiRequestRiskOld
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request) 
    {
        return Excel::download(new RequestRiskOldExport, 'Solicitudes Risk International.xlsx');
    }
}
