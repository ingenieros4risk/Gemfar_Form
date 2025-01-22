<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_sales')->insert(['name' => 'Institucional']);
        DB::table('type_sales')->insert(['name' => 'Retail ']);
        DB::table('type_sales')->insert(['name' => 'Varios']);
    }
}
