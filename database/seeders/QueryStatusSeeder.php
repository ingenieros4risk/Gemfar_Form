<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('query_statuses')->insert(['name' => 'Proceso']);
    	DB::table('query_statuses')->insert(['name' => 'Finalizada']);
    }
}
