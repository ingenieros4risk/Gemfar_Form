<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiligenceAnswerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diligence_answer_types')->insert(['name' => 'Simplificada']);
        DB::table('diligence_answer_types')->insert(['name' => 'Estandar']);
        DB::table('diligence_answer_types')->insert(['name' => 'Reforzada']);        
    }
}
