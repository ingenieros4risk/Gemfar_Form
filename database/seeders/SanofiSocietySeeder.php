<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiSocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI COLOMBIA', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI PERÚ', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'GENZYME COSTA RICA', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI GUATEMALA', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI AVENTIS REPUBLICA DOMINICANA', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI VENEZUELA', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI PANAMÁ', 'score' =>0]);
        DB::table('sanofi_societies')->insert(['name' => 'SANOFI ECUADOR', 'score' =>0]);
        
    }
}
