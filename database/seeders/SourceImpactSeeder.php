<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('source_impacts')->insert(['name' => 'Internacional']);
    	DB::table('source_impacts')->insert(['name' => 'Nacional']);
    	DB::table('source_impacts')->insert(['name' => 'Regional']);
    	DB::table('source_impacts')->insert(['name' => 'Sin determinar']);
        
    }
}
