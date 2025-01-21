<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Models\Ticket\TicketFollowUp;
use Illuminate\Http\Request;

class TicketFollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $seguimientos = TicketFollowUp::all();
        foreach ($seguimientos as $seguimiento) {
            $id_user_follow = User::find($seguimiento->id_user_follow);
            $id_user_follow ? $seguimiento->id_user_follow = $id_user_follow->name : $seguimiento->id_user_follow = "Sin Asignar";
            $id_user_assign = User::find($seguimiento->id_user_assign);
            $id_user_assign ? $seguimiento->id_user_assign = $id_user_assign->name : $seguimiento->id_user_assign = "Sin Asignar";
        }
        
        return view('dashboard.tickets.follow', [
            "user_info" => $you,
            "seguimientos" => $seguimientos
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
     * @param  \App\Models\Ticket\TicketFollowUp  $ticketFollowUp
     * @return \Illuminate\Http\Response
     */
    public function show(TicketFollowUp $ticketFollowUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket\TicketFollowUp  $ticketFollowUp
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketFollowUp $ticketFollowUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket\TicketFollowUp  $ticketFollowUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketFollowUp $ticketFollowUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket\TicketFollowUp  $ticketFollowUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketFollowUp $ticketFollowUp)
    {
        //
    }
}
