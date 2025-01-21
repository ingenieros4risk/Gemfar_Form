<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_priorities')->insert(['name'=>'Baja']);
        DB::table('support_priorities')->insert(['name'=>'Media']);
        DB::table('support_priorities')->insert(['name'=>'Alta']);
    }
}
