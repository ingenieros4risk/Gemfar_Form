<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_platforms')->insert(['name' => 'Inspektor Cliente']);//1
        DB::table('ticket_platforms')->insert(['name' => 'Inspektor Administrador']);//2
        DB::table('ticket_platforms')->insert(['name' => 'Inspektor Perú']);//3
        DB::table('ticket_platforms')->insert(['name' => 'Datalaft']);//4
        DB::table('ticket_platforms')->insert(['name' => 'Sherlock']);//5
    }
}
