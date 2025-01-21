<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiMemberInvestigatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_member_investigators')->insert(['name' => 'Investigador Principal de Proyecto Global/Global Project Principal Investigator', 'score' =>6]);
		DB::table('sanofi_member_investigators')->insert(['name' => 'Investigador en Proyecto Global / Researcher at Global Project', 'score' =>5]);
		DB::table('sanofi_member_investigators')->insert(['name' => 'Investigador Principal en Proyecto regional (LATAM) / Principal Investigator in Regional Project (LATAM)', 'score' =>4]);
		DB::table('sanofi_member_investigators')->insert(['name' => 'Investigador en Proyecto regional (LATAM) / Researcher in Regional Project (LATAM)', 'score' =>3]);
		DB::table('sanofi_member_investigators')->insert(['name' => 'Investigador Principal en Proyecto Nacional / Principal Investigator in National Project', 'score' =>2]);
		DB::table('sanofi_member_investigators')->insert(['name' => 'Investigador Proyecto Nacional / National Project Researcher', 'score' =>1]);
		DB::table('sanofi_member_investigators')->insert(['name' => 'No experiencia como investigador / No experience as a researcher', 'score' =>0]);
    }
}
