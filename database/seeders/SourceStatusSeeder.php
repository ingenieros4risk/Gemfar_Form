<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('source_statuses')->insert(['name' => 'Activo']);
    	DB::table('source_statuses')->insert(['name' => 'Inactivo']);
    }
}
