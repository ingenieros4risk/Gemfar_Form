<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientMarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_markets')->insert(['name' => 'PRIVADO']);
        DB::table('client_markets')->insert(['name' => 'PÚBLICO']);
        DB::table('client_markets')->insert(['name' => 'MIXTO']);
        DB::table('client_markets')->insert(['name' => 'ESAL']);

    }
}
