<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHasPosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_has_posters')->insert(['name' => 'Multiples Internacionales/International Multiples', 'score' =>3]);
		DB::table('sanofi_has_posters')->insert(['name' => 'Internacional/International', 'score' =>2]);
		DB::table('sanofi_has_posters')->insert(['name' => 'Nacional/National', 'score' =>1]); 
        DB::table('sanofi_has_posters')->insert(['name' => 'Ninguno/None', 'score' =>0]); 
    }
}

