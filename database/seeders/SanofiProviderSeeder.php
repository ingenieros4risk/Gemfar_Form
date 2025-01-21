<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /* 
      DB::table('sanofi_providers')->insert(['name' => 'Compras / Buyer']); // 1 PJ
      DB::table('sanofi_providers')->insert(['name' => 'Health Care Provider (HCP)']); // 2 PN
      DB::table('sanofi_providers')->insert(['name' => 'Health Care Organization (HCO)']);  // 3 PJ
      DB::table('sanofi_providers')->insert(['name' => 'Otros / Other']);  // 4 
    */
      DB::table('sanofi_providers')->insert(['name' => 'Category A – Vendors/Suppliers – PROCUREMENT SCOPE']);
      DB::table('sanofi_providers')->insert(['name' => 'Category B – Customers (Distributors, Wholesalers) – TRADE SCOPE']);
      DB::table('sanofi_providers')->insert(['name' => 'Category C – HCP’s, Non - Scientific External Expert']);
      DB::table('sanofi_providers')->insert(['name' => 'Category C – HCO’s & MSA’s, ']);
      DB::table('sanofi_providers')->insert(['name' => 'Category C – NGO’s, PAG’s, PCO’s']);
      DB::table('sanofi_providers')->insert(['name' => 'Others Third Parties']);

    }
}
