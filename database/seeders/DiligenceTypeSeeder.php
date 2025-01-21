<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiligenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diligence_types')->insert([
            'name' => 'Simplificada'
        ]);

        DB::table('diligence_types')->insert([
            'name' => 'Amplificada'
        ]);

        DB::table('diligence_types')->insert([
            'name' => 'Reforzada'
        ]);
    }
}
