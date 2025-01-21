<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_priorities')->insert(['name' => 'Baja']);
        DB::table('client_priorities')->insert(['name' => 'Media']);
        DB::table('client_priorities')->insert(['name' => 'Alta']);
    }
}
