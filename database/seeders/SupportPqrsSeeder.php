<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportPqrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_p_q_r_s')->insert(['name' => 'Pregunta']);
        DB::table('support_p_q_r_s')->insert(['name' => 'Queja']);
        DB::table('support_p_q_r_s')->insert(['name' => 'Reclamo']);
        DB::table('support_p_q_r_s')->insert(['name' => 'Solicitud']);
    }
}
