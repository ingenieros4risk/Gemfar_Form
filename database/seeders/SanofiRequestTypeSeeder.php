<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiRequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_request_types')->insert(['name' => 'Lista Restrictivas Simples']);
        DB::table('sanofi_request_types')->insert(['name' => 'Debida Diligencia Ampliada']);
        DB::table('sanofi_request_types')->insert(['name' => 'Homologación y Lista Restrictiva']);
    }
}
