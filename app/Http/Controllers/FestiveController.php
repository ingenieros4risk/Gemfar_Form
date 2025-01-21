<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Festive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FestiveController extends Controller
{
    protected $festives = ['expired_at'];

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
     * Display a listing of the refestive.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $you = auth()->user();
        $festives = Festive::all();
        foreach ($festives as $festive) {
            $date = $festive->date;
            $festive->date = $date;
        }
        return view('dashboard.festive.index', compact('festives', 'you'));
    }

    /**
     * Show the form for creating a new refestive.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created refestive in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified refestive.
     *
     * @param  \App\Models\Festive  $festive
     * @return \Illuminate\Http\Response
     */
    public function show(Festive $festive)
    {
        //
    }

    /**
     * Show the form for editing the specified refestive.
     *
     * @param  \App\Models\Festive  $festive
     * @return \Illuminate\Http\Response
     */
    public function edit(Festive $festive)
    {
        //
    }

    /**
     * Update the specified refestive in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Festive  $festive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Festive $festive)
    {
        //
    }

    /**
     * Remove the specified refestive from storage.
     *
     * @param  \App\Models\Festive  $festive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Festive $festive)
    {
        //
    }
}
