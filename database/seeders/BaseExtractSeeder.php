<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseExtractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('base_extracts')->insert(['name' => 'MANUAL/NOTICIAS']);
        DB::table('base_extracts')->insert(['name' => 'SCRAPING']);
        DB::table('base_extracts')->insert(['name' => 'MACRO']);
        DB::table('base_extracts')->insert(['name' => 'IMPORTE DESDE LA WEB']);
        DB::table('base_extracts')->insert(['name' => 'PDF/OCR']);
        DB::table('base_extracts')->insert(['name' => 'OTRA']);
    }
}
