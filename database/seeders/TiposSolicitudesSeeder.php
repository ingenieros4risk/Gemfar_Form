<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TiposSolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_solicitudes')->insert(['name' => 'Listas Restrictiva Simple']);
        DB::table('tipos_solicitudes')->insert(['name' => 'Creación completa de un cliente']);
        DB::table('tipos_solicitudes')->insert(['name' => 'Creación de un Destinatario']);
        DB::table('tipos_solicitudes')->insert(['name' => 'Actualización de información de un cliente ya creado']);
        DB::table('tipos_solicitudes')->insert(['name' => 'Homologación Cliente - Proveedor']);
    }
}
