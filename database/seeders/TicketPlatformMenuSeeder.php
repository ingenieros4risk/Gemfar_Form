<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPlatformMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_platform_menus')->insert(['name' => 'Cuenta', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Configuración', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Notificaciones', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Consultar Listas', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Listas Propias', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Reportes', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Perfilamiento Terceros', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Extras', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Otro', 'id_ticket_platform' => 1]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Mi Cuenta', 'id_ticket_platform' => 2]);//10
        DB::table('ticket_platform_menus')->insert(['name' => 'Administrar Empresas', 'id_ticket_platform' => 2]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Listas restrictivas', 'id_ticket_platform' => 2]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Reporte', 'id_ticket_platform' => 2]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Log', 'id_ticket_platform' => 2]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Consultas Realizadas', 'id_ticket_platform' => 2]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Administrar Contenidos', 'id_ticket_platform' => 2]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Cuenta', 'id_ticket_platform' => 3]);//17
        DB::table('ticket_platform_menus')->insert(['name' => 'Configuración', 'id_ticket_platform' => 3]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Notificaciones', 'id_ticket_platform' => 3]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Consultar Listas', 'id_ticket_platform' => 3]);//20
        DB::table('ticket_platform_menus')->insert(['name' => 'Listas Propias', 'id_ticket_platform' => 3]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Reportes', 'id_ticket_platform' => 3]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Perfilamiento Terceros', 'id_ticket_platform' => 3]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Extras', 'id_ticket_platform' => 3]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Otro', 'id_ticket_platform' => 3]);        
        DB::table('ticket_platform_menus')->insert(['name' => 'Dashboard', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Actividades', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Fuentes', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Noticias', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'DDA', 'id_ticket_platform' => 4]);//30
        DB::table('ticket_platform_menus')->insert(['name' => 'Bases', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Soporte', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Tickets', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Calidad', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Clientes', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Configuraciones', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Inspektor', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Sanofi', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Formulario Sanofi', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Mapas de Riesgo', 'id_ticket_platform' => 4]);//40
        DB::table('ticket_platform_menus')->insert(['name' => 'Otro', 'id_ticket_platform' => 4]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Dashboard', 'id_ticket_platform' => 5]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Mi Cuenta', 'id_ticket_platform' => 5]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Parametrización General', 'id_ticket_platform' => 5]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Seguridad', 'id_ticket_platform' => 5]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Riesgos', 'id_ticket_platform' => 5]);
        DB::table('ticket_platform_menus')->insert(['name' => 'AML', 'id_ticket_platform' => 5]);
        DB::table('ticket_platform_menus')->insert(['name' => 'Otro', 'id_ticket_platform' => 5]);
    }
}
