<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketMediumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_media')->insert(['name' => 'Chat']);
        DB::table('ticket_media')->insert(['name' => 'Correo Electrónico']);
        DB::table('ticket_media')->insert(['name' => 'Llamada']);
        DB::table('ticket_media')->insert(['name' => 'WhatsApp']);
        DB::table('ticket_media')->insert(['name' => 'Conexión Remota']);
    }
}
