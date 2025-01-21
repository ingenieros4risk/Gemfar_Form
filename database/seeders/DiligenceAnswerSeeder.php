<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiligenceAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('diligence_answers')->insert(['name' => 'Simplificada']);
    	DB::table('diligence_answers')->insert(['name' => 'Estandar']);
    	DB::table('diligence_answers')->insert(['name' => 'Reforzada']);
    }
}
