<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InspektorGroupListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspektor_group_lists')->insert(['name' => 'Listas Restrictivas' , 'color' => '#990000']);
        DB::table('inspektor_group_lists')->insert(['name' => 'Listas Asociadas a LA/FT, Corrupción u otros Delitos (Penal)' , 'color' => '#FF0000']);
        DB::table('inspektor_group_lists')->insert(['name' => 'Listas Asociadas a LA/FT, Corrupción u otros Delitos (Administrativo)' , 'color' => '#FF9B00']);
        DB::table('inspektor_group_lists')->insert(['name' => 'Sanciones Administrativas' , 'color' => '#FFFF00']);
        DB::table('inspektor_group_lists')->insert(['name' => 'Listas de Afectación Financiera' , 'color' => '#FFFF00']);
        DB::table('inspektor_group_lists')->insert(['name' => 'Listas Informativas y PEPs' , 'color' => '#008000']);
    }
}
