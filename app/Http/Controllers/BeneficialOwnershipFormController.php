<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\BeneficialOwnershipForm;
use Illuminate\Http\Request;

class BeneficialOwnershipFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.beneficial_ownership.create');
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
     * @param  \App\Models\Sanofi\BeneficialOwnershipForm  $beneficialOwnershipForm
     * @return \Illuminate\Http\Response
     */
    public function show(BeneficialOwnershipForm $beneficialOwnershipForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\BeneficialOwnershipForm  $beneficialOwnershipForm
     * @return \Illuminate\Http\Response
     */
    public function edit(BeneficialOwnershipForm $beneficialOwnershipForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\BeneficialOwnershipForm  $beneficialOwnershipForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeneficialOwnershipForm $beneficialOwnershipForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\BeneficialOwnershipForm  $beneficialOwnershipForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeneficialOwnershipForm $beneficialOwnershipForm)
    {
        //
    }
}
