<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_types')->insert(['name' => 'Falla/Caida/Inconsistencia']);
        DB::table('ticket_types')->insert(['name' => 'Para Comite']);
        DB::table('ticket_types')->insert(['name' => 'Requerimiento']);
        DB::table('ticket_types')->insert(['name' => 'Solicitud Equipo Datalaft']);
        DB::table('ticket_types')->insert(['name' => 'Acompañamiento']);
        DB::table('ticket_types')->insert(['name' => 'Solicitud Scraping']);
    }
}
