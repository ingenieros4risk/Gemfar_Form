<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiAcademicPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_academic_positions')->insert(['name' => 'Profesor Honorario: de labor docente ha tenido importantes logros, tanto culturales como intelectuales, otorgado por una institución / Honorary Professor: teaching work has had important achievements, both cultural and intellectual, awarded by an institution', 'score' =>5]);
		DB::table('sanofi_academic_positions')->insert(['name' => 'Profesor Emérito-Jefe de Programa Académico / Emeritus Professor-Head of Academic Program', 'score' =>4]);
		DB::table('sanofi_academic_positions')->insert(['name' => 'Profesor Titular: quien dicta un curso específico en una institución educativa / Full Professor: who teaches a specific course in an educational institution', 'score' =>3]);
		DB::table('sanofi_academic_positions')->insert(['name' => 'Profesor asociado/Catedrático/Académico - Associate professor / Professor / Academic', 'score' =>2]);
        DB::table('sanofi_academic_positions')->insert(['name' => 'Profesor Ad-honorem / Professor Ad-honorem', 'score' =>1]);
		DB::table('sanofi_academic_positions')->insert(['name' => 'Ninguna / None', 'score' =>5]);

    }
}
