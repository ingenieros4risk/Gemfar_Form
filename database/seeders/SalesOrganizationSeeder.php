<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_organizations')->insert(['name' => '7031  Genfar S.A.']);
        DB::table('sales_organizations')->insert(['name' => '7032  Genfar Desarrollo y Manufactura S.A.']);
        DB::table('sales_organizations')->insert(['name' => '7061  Genfar Del Perú S.A.C']);
        DB::table('sales_organizations')->insert(['name' => '7091  Genfar Del Ecuador S.A.S']);
    }
}
