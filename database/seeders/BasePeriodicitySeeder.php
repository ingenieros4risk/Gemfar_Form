<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasePeriodicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('base_periodicities')->insert(['name' => 'Mensual', 'time' => 30]);
        DB::table('base_periodicities')->insert(['name' => 'Quincenal', 'time' => 15]);
        DB::table('base_periodicities')->insert(['name' => 'Trimestral', 'time' => 90]);
        DB::table('base_periodicities')->insert(['name' => 'Semestral', 'time' => 180]);
        DB::table('base_periodicities')->insert(['name' => 'Semanal', 'time' => 7]);
        DB::table('base_periodicities')->insert(['name' => 'Anual', 'time' => 365]);
    }
}
