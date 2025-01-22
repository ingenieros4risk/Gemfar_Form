<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class SociedadSolicitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sociedad_solicitantes')->insert(['name' => 'Genfar S.A.']);
        DB::table('sociedad_solicitantes')->insert(['name' => 'Genfar Desarrollo y Manufactura S.A.']);
        DB::table('sociedad_solicitantes')->insert(['name' => 'Genfar del Perú S.A.C.']);
        DB::table('sociedad_solicitantes')->insert(['name' => 'Genfar del Ecuador S.A.S.']);
    }
}
