<?php

namespace App\Http\Controllers;

use App\Models\Inspektor\InspektorList;
use App\Models\Inspektor\InspektorPeriodicityList;
use App\Models\Inspektor\InspektorGroupList;
use App\Exports\InspektorListExport;
use App\Models\Country;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InspektorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $lists = InspektorList::all();
        foreach ($lists as $list) {
            $country = Country::find($list->country_id);
            $periodicity = InspektorPeriodicityList::find($list->periodicity_id);
            $group = InspektorGroupList::find($list->group_id);
            $list->country_id = $country->flag;
            $list->periodicity_id = $periodicity->name;
            $list->group_id = $group->name;
        }  
        return view('dashboard.inspektor.lists.index', compact('lists', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $periodicities = InspektorPeriodicityList::all();
        $groups = InspektorGroupList::all();
        return view('dashboard.inspektor.lists.create', compact('countries', 'periodicities', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list = new InspektorList();
        $list->name = $request->input('name');
        $list->description = $request->input('description');
        $list->source = $request->input('font');
        $list->country_id = $request->input('country_id');
        $list->group_id = $request->input('group_id');
        $list->periodicity_id = $request->input('periodicity_id');

        
        if ($list->save()) {
            $request->session()->flash('message', 'Lista de Inspektor creada satisfactoriamente.');
            return redirect()->route('inspektor_lists.index');
        }else{
            $request->session()->flash('message', 'list no se ha podido crear.');
            return redirect()->route('inspektor_lists.index');    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorList  $inspektorList
     * @return \Illuminate\Http\Response
     */
    public function show(InspektorList $inspektorList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorList  $inspektorList
     * @return \Illuminate\Http\Response
     */
    public function edit(InspektorList $inspektorList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspektor\InspektorList  $inspektorList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspektorList $inspektorList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspektor\InspektorList  $inspektorList
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspektorList $inspektorList)
    {
        //
    }

    /**
     * Export the specified resource from storage.
     *
     */    
    public function export() 
    {
        return Excel::download(new InspektorListExport, 'inspektor_lists.xlsx');
    }    
}
