<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_statuses')->insert(['name'=>'Pendiente']);
        DB::table('support_statuses')->insert(['name'=>'Finalizada']);
    }
}
