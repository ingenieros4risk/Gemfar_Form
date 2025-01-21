<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHomologationCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_homologation_countries')->insert(['country'=>'Colombia','name' => 'Genfar S.A', 'score' => 1, 'flag' =>'cif-co', 'money'=>'Pesos colombianos']);
        DB::table('sanofi_homologation_countries')->insert(['country'=>'Colombia','name' => 'Genfar Desarrollo y Manufactura S.A. ', 'score' => 2, 'flag' =>'cif-co', 'money'=>'Pesos colombianos']);
        DB::table('sanofi_homologation_countries')->insert(['country'=>'Perú','name' => 'Genfar de Peru S.A.C.', 'score' => 3, 'flag' =>'cif-pe', 'money'=>'Soles']);
        DB::table('sanofi_homologation_countries')->insert(['country'=>'Ecuador','name' => 'Genfar del  Ecuador S.A.S', 'score' => 5, 'flag' =>'cif-ec', 'money'=>'Dólar']);
    }
}
