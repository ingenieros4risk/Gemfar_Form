<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InspektorPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspektor_priorities')->insert(['number' => '1']);//1
        DB::table('inspektor_priorities')->insert(['number' => '2']);//1
        DB::table('inspektor_priorities')->insert(['number' => '3']);//1
        DB::table('inspektor_priorities')->insert(['number' => '4']);//1

    }
}
