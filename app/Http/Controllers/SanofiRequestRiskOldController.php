<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiRequestRiskOld;
use App\Models\Country;
use App\Exports\SanofiRequestRiskExport;
use App\Models\Sanofi\SanofiHomologationCountry;
use App\Models\Sanofi\SanofiRequestStatus;
use App\Models\Sanofi\SanofiProvider;
use App\Models\Sanofi\RequestRiskStatus;
use App\Models\Sanofi\SanofiRequestType;
use App\Models\Sanofi\SanofiHacat;
use App\Models\Sanofi\SanofiRequestForm;
use App\Models\Sanofi\SanofiRequestRisk;
use App\Models\Inspektor\InspektorDocumentType;
use App\Models\Inspektor\CurrentType;
use App\Models\User;
use App\Models\Sanofi\SanofiAcademicDegree;
use App\Models\Sanofi\SanofiAcademicPosition;
use App\Models\Sanofi\SanofiHasAward;
use App\Models\Sanofi\SanofiHasBook;
use App\Models\Sanofi\SanofiHasConference;
use App\Models\Sanofi\SanofiHasPoster;
use App\Models\Sanofi\SanofiHasPublication;
use App\Models\Sanofi\SanofiHomologationType;
use App\Models\Sanofi\SanofiMedicalSpeciality;
use App\Models\Sanofi\SanofiMemberInvestigator;
use App\Models\Sanofi\SanofiMemberSociety;
use Illuminate\Http\Request;

class SanofiRequestRiskOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $requests_risk = SanofiRequestRiskOld::all();

        return view('dashboard.sanofi.request_risk_old.index', compact('requests_risk', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiRequestRiskOld  $sanofiRequestRiskOld
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_risk = SanofiRequestRiskOld::find($id);
        $hacats = SanofiHacat::all();
        $statuses = SanofiRequestStatus::all();
        $user = auth()->user();

        return view('dashboard.sanofi.request_risk_old.show',compact('request_risk', 'user', 'hacats', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiRequestRiskOld  $sanofiRequestRiskOld
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiRequestRiskOld $sanofiRequestRiskOld)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiRequestRiskOld  $sanofiRequestRiskOld
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiRequestRiskOld $sanofiRequestRiskOld)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiRequestRiskOld  $sanofiRequestRiskOld
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiRequestRiskOld $sanofiRequestRiskOld)
    {
        //
    }
}
