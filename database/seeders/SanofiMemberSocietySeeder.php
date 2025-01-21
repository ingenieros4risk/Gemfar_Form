<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiMemberSocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_member_societies')->insert(['name' => 'Sociedad  Internacional / International Society', 'score' =>5]);
		DB::table('sanofi_member_societies')->insert(['name' => 'Sociedad Regional (LATAM) / Regional Society (LATAM)', 'score' =>4]);
		DB::table('sanofi_member_societies')->insert(['name' => 'Sociedad Nacional / National Society', 'score' =>3]);
		DB::table('sanofi_member_societies')->insert(['name' => 'Sociedad Directiva de Capítulo de Sociedad científica Nacional/Board of Directors of the National Scientific Society Chapter', 'score' =>2]);
		DB::table('sanofi_member_societies')->insert(['name' => 'Ninguna / None', 'score' =>0]);

    }
}
