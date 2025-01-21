<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHasAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_has_awards')->insert(['name' => 'Premios Internacionales en áreas de salud/International awards in health areas', 'score' =>2]);
		DB::table('sanofi_has_awards')->insert(['name' => 'Premios Nacionales en áreas de salud/National awards in health areas', 'score' =>1]);
		DB::table('sanofi_has_awards')->insert(['name' => 'Ninguno/None', 'score' =>0]);
    }
}
