<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiAcademicDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_academic_degrees')->insert(['name' => 'PHD/Segunda Subespecialización - PHD / Second Subspecialty', 'score' =>5]);
		DB::table('sanofi_academic_degrees')->insert(['name' => 'Sub Especializado/Fellow -Sub Specialized / Fellow', 'score' =>4]);
		DB::table('sanofi_academic_degrees')->insert(['name' => 'Maestria en áreas de salud - Master in health areas', 'score' =>3]);
		DB::table('sanofi_academic_degrees')->insert(['name' => 'Health Care Provider especialista Clínico/Health Care Provider Clinical Specialist', 'score' =>3]);
		DB::table('sanofi_academic_degrees')->insert(['name' => 'Health Care Provider  especialista Administrativo/Health Care Provider Administrative specialist', 'score' =>2]);
		DB::table('sanofi_academic_degrees')->insert(['name' => 'Health Care Provider (graduado con licencia profesional) - Health Care Provider (graduate with professional license)', 'score' =>1]);

    }
}
