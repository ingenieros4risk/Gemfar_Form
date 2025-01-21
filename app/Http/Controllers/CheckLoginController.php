<?php

namespace App\Http\Controllers;

use App\Models\User\CheckLogin;
use App\Models\User;
use Illuminate\Http\Request;

class CheckLoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $logins = CheckLogin::all();
        
        foreach ($logins as $login) {
            $obj_name = User::find($login->id_user);
            $login->id_user = $obj_name->name;
        }

        return view('dashboard.admin.usersLog', compact('logins', 'you'));
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
     * @param  \App\Models\User\CheckLogin  $checkLogin
     * @return \Illuminate\Http\Response
     */
    public function show(CheckLogin $checkLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\CheckLogin  $checkLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckLogin $checkLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\CheckLogin  $checkLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckLogin $checkLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\CheckLogin  $checkLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckLogin $checkLogin)
    {
        //
    }
}
