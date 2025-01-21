<?php

namespace App\Http\Controllers;

use App\Models\Inspektor\InspektorGroupList;
use Illuminate\Http\Request;

class InspektorGroupListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $groups = InspektorGroupList::all();
        return view('dashboard.inspektor.groups.index', compact('groups', 'you'));
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
     * @param  \App\Models\Inspektor\InspektorGroupList  $inspektorGroupList
     * @return \Illuminate\Http\Response
     */
    public function show(InspektorGroupList $inspektorGroupList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspektor\InspektorGroupList  $inspektorGroupList
     * @return \Illuminate\Http\Response
     */
    public function edit(InspektorGroupList $inspektorGroupList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspektor\InspektorGroupList  $inspektorGroupList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspektorGroupList $inspektorGroupList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspektor\InspektorGroupList  $inspektorGroupList
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspektorGroupList $inspektorGroupList)
    {
        //
    }
}
