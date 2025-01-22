<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalEntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('legal_entities')->insert(['name' => 'Genfar']);
        DB::table('legal_entities')->insert(['name' => 'Genfar / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Genzyme']);
        DB::table('legal_entities')->insert(['name' => 'Genzyme / Genfar']);
        DB::table('legal_entities')->insert(['name' => 'Genzyme / Genfar / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Genzyme / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Genfar']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Genfar / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Genzyme']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Genzyme / Genfar']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Genzyme / Genfar / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Genzyme / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Sanofi / Pasteur']);
        DB::table('legal_entities')->insert(['name' => 'Genfar del Perú SAC']);
        DB::table('legal_entities')->insert(['name' => 'Genfar del Ecuador SAS']);
    }
}
