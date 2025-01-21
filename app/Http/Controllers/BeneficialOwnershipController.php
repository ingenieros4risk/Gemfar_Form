<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\BeneficialOwnership;
use App\Models\Inspektor\InspektorDocumentType;
use Illuminate\Http\Request;

class BeneficialOwnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $coincidences = BeneficialOwnership::all();
        
        foreach ($coincidences as $coincidence) {
            
            if ($coincidence->type_bf == 1) {
                $coincidence->type_bf_texto = "MANUAL";
            }elseif ($coincidence->type_bf == 0) {
                $coincidence->type_bf_texto = "NO SUMINISTRA";
            }elseif ($coincidence->type_bf == 2) {
                $coincidence->type_bf_texto = "ARCHIVO";
            }

            if ($coincidence->is_pep == 0) {
                $coincidence->is_pep = "NO";
            }elseif ($coincidence->is_pep == 1) {
                $coincidence->is_pep = "SI";
            }elseif($coincidence->is_pep == null) {
                $coincidence->is_pep = "NO APLICA";
            }

            $document_type = InspektorDocumentType::find($coincidence->document_beneficial_ownership);

            if($document_type != null){
                $coincidence->document_beneficial_ownership = $document_type->name;
            }else{
                $coincidence->document_beneficial_ownership = "NO APLICA";
            }
            
        }
        
        return view('dashboard.sanofi.beneficial', [
            "user_info" => $you,
            "coincidences" => $coincidences
        ]);
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
     * @param  \App\Models\Sanofi\BeneficialOwnership  $beneficialOwnership
     * @return \Illuminate\Http\Response
     */
    public function show(BeneficialOwnership $beneficialOwnership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\BeneficialOwnership  $beneficialOwnership
     * @return \Illuminate\Http\Response
     */
    public function edit(BeneficialOwnership $beneficialOwnership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\BeneficialOwnership  $beneficialOwnership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeneficialOwnership $beneficialOwnership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\BeneficialOwnership  $beneficialOwnership
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeneficialOwnership $beneficialOwnership)
    {
        //
    }
}
