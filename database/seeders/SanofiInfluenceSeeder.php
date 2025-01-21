<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiInfluenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('sanofi_influences')->insert(['name' => 'Influencia en País (más de un país) / Influence in Country (more than one country)', 'score' =>3]);
		DB::table('sanofi_influences')->insert(['name' => 'Influencia en varias ciudades o un país / Influence in several cities or a country', 'score' =>2]);
		DB::table('sanofi_influences')->insert(['name' => 'Influencia en Ciudad / Influence in City', 'score' =>1]);
    }
}
