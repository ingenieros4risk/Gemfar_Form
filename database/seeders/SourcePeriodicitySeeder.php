<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcePeriodicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source_periodicities')->insert(['name' => 'Lunes/Miercoles/Viernes']);
        DB::table('source_periodicities')->insert(['name' => 'Diario']);
        DB::table('source_periodicities')->insert(['name' => 'Martes/Jueves']);
        DB::table('source_periodicities')->insert(['name' => 'Sin determinar']);
    }
}
