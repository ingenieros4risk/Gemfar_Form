<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_sectors')->insert(['name' => 'REAL']);
        DB::table('client_sectors')->insert(['name' => 'FINANCIERO']);
        DB::table('client_sectors')->insert(['name' => 'SALUD']);
        DB::table('client_sectors')->insert(['name' => 'COOPERATIVO']);
        DB::table('client_sectors')->insert(['name' => 'VIGILANCIA']);
        DB::table('client_sectors')->insert(['name' => 'SOLIDARIO']);
        DB::table('client_sectors')->insert(['name' => 'REAL/ JUEGOS DE SUERTE Y AZAR']);
        DB::table('client_sectors')->insert(['name' => 'ENTIDAD SIN ANIMO DE LUCRO']);
        DB::table('client_sectors')->insert(['name' => 'FINTECHS']);
        DB::table('client_sectors')->insert(['name' => 'SEGUROS']);
        DB::table('client_sectors')->insert(['name' => 'HIDROCARBUROS']);
        DB::table('client_sectors')->insert(['name' => 'INMOBILIARIA']);
        DB::table('client_sectors')->insert(['name' => 'CERTIFICADOR']);
        DB::table('client_sectors')->insert(['name' => 'PESQUERO']);
        DB::table('client_sectors')->insert(['name' => 'DERECHO']);
        DB::table('client_sectors')->insert(['name' => 'NOTARIA']);
        DB::table('client_sectors')->insert(['name' => 'REGULADOR']);
        DB::table('client_sectors')->insert(['name' => 'COMUNICACIÓN']);
        DB::table('client_sectors')->insert(['name' => 'SEGURIDAD']);
        DB::table('client_sectors')->insert(['name' => 'REVISORES FISCALES']);
        DB::table('client_sectors')->insert(['name' => 'SIN IDENTIFICAR']);
    }
}
