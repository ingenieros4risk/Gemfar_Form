<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHasPublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_has_publications')->insert(['name' => 'Indexadas mayor o igual a 21/Indexed greater than or equal to 21', 'score' =>9]);
		DB::table('sanofi_has_publications')->insert(['name' => 'Indexada 16-20/Indexed 16-20', 'score' =>8]);
		DB::table('sanofi_has_publications')->insert(['name' => 'Indexadas 11-15/Indexed 11-15', 'score' =>7]); 
		DB::table('sanofi_has_publications')->insert(['name' => 'Indexadas 6-10/Indexed 6-10', 'score' =>6]);
		DB::table('sanofi_has_publications')->insert(['name' => 'Indexadas menor a 5/Indexed less than 5', 'score' =>4]);
		DB::table('sanofi_has_publications')->insert(['name' => 'Publicacion no indexadas/Non-indexed publication', 'score' =>3]);
        DB::table('sanofi_has_publications')->insert(['name' => 'Ninguna/None', 'score' =>0]);
    }
}

