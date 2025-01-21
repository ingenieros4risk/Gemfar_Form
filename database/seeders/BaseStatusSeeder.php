<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('base_statuses')->insert(['name' => 'Pendiente']);
        DB::table('base_statuses')->insert(['name' => 'Actualizado']);
    }
}
