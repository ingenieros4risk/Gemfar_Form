<?php

namespace App\Http\Controllers;

use App\Models\Sanofi\SanofiHasBook;
use Illuminate\Http\Request;

class SanofiHasBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $books = SanofiHasBook::all();  
        return view('dashboard.sanofi.has_books.index', compact('books', 'you'));
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
     * @param  \App\Models\Sanofi\SanofiHasBook  $sanofiHasBook
     * @return \Illuminate\Http\Response
     */
    public function show(SanofiHasBook $sanofiHasBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanofi\SanofiHasBook  $sanofiHasBook
     * @return \Illuminate\Http\Response
     */
    public function edit(SanofiHasBook $sanofiHasBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanofi\SanofiHasBook  $sanofiHasBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanofiHasBook $sanofiHasBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanofi\SanofiHasBook  $sanofiHasBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanofiHasBook $sanofiHasBook)
    {
        //
    }
}
