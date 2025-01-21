<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('source_types')->insert(['name' => 'Oficial']);
    	DB::table('source_types')->insert(['name' => 'Otro']);
    	DB::table('source_types')->insert(['name' => 'Sin determinar']);
    }
}
