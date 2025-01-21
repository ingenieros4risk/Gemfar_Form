<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('query_types')->insert(['name' => 'Inspektor WS Individual']);
        DB::table('query_types')->insert(['name' => 'Inspektor WS Masivo']);
        DB::table('query_types')->insert(['name' => 'Rama Judicial']);
    }
}
