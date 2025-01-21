<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA/ PYME']);
    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA / GRAN EMPRESA']);
    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA']);
    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA/ PYME']);
    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA / MULTINACIONAL']);
    	DB::table('client_types')->insert(['name' => 'PERSONA NATURAL']);
    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA / ESAL']);
    	DB::table('client_types')->insert(['name' => 'PERSONA JURÍDICA/ PYME']);
    	DB::table('client_types')->insert(['name' => 'JURIDICO/ CONSULTORIA']);
    }
}
