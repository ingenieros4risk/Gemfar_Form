<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InspektorParameterizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspektor_parameterization_types')->insert(['name' => 'Por Listas']);//1
        DB::table('inspektor_parameterization_types')->insert(['name' => 'Por Prioridades']);//1
    }
}
