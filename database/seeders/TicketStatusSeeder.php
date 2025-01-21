<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert([
            'name' => 'Pendiente'
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Asignada'
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'En trámite'
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Rechazada'
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Reasignada'
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'En Revisión'
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Finalizada'
        ]);

    }
}
