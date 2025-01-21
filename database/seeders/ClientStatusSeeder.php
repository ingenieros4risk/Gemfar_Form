<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_statuses')->insert(['name' => 'Activo']);
        DB::table('client_statuses')->insert(['name' => 'Otro Servicio']);
        DB::table('client_statuses')->insert(['name' => 'Inactivo']);
        DB::table('client_statuses')->insert(['name' => 'Pruebas']);
    }
}
