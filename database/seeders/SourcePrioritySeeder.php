<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcePrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('source_priorities')->insert(['name' => 'Alta']);
    	DB::table('source_priorities')->insert(['name' => 'Media']);
    	DB::table('source_priorities')->insert(['name' => 'Baja']);
    	DB::table('source_priorities')->insert(['name' => 'Sin determinar']);
        
    }
}
