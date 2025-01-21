<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHasConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('sanofi_has_conferences')->insert(['name' => 'Conferencias Globales/Global Conferences', 'score' =>5]);
		DB::table('sanofi_has_conferences')->insert(['name' => 'Conferencias Regionales LATAM/LATAM Regional Conferences', 'score' =>4]);
		DB::table('sanofi_has_conferences')->insert(['name' => 'Conferencias Nacionales/National Conferences', 'score' =>3]);
		DB::table('sanofi_has_conferences')->insert(['name' => 'Conferencias Locales/Local Conferences', 'score' =>2]);
		DB::table('sanofi_has_conferences')->insert(['name' => 'Ninguna/None', 'score' =>0]);

    }
}
