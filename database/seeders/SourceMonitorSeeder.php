<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceMonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('source_monitors')->insert(['name' => 'Monitoreo']);
    	DB::table('source_monitors')->insert(['name' => 'Sin Monitorear']);
    	DB::table('source_monitors')->insert(['name' => 'Subscripción']);
    	DB::table('source_monitors')->insert(['name' => 'Alerta']);
    	DB::table('source_monitors')->insert(['name' => 'Bases']);
    	DB::table('source_monitors')->insert(['name' => 'PEPS']);
        
    }
}
