<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHomologationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_homologation_types')->insert(['name' => 'Internacional', 'score' =>1]);
        DB::table('sanofi_homologation_types')->insert(['name' => 'Nacional', 'score' =>2]);
    }
}
