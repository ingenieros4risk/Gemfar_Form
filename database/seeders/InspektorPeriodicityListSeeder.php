<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InspektorPeriodicityListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Diaria']);//1
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Semanal']);//2
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Quincenal']);//3
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Mensual']);//4
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Trimestral']);//5
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Semestral']);//6
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Anual']);//7
        DB::table('inspektor_periodicity_lists')->insert(['name' => 'Hasta la vigencia']);//8
    }
}
