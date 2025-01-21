<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSubsectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('client_subsectors')->insert(['name' => 'AGRICOLA/IMPORTACIONES E IMPORTACIONES - AMBIENTALES']);
		DB::table('client_subsectors')->insert(['name' => 'AGRÍCOLA/AGROPECUARIO']);
		DB::table('client_subsectors')->insert(['name' => 'AGRÍCOLA/AGROPECUARIO/DISTRIBUCION']);
		DB::table('client_subsectors')->insert(['name' => 'AGRÍCOLA/ AGROPECUARIO']);
		DB::table('client_subsectors')->insert(['name' => 'ALIMENTOS']);
		DB::table('client_subsectors')->insert(['name' => 'ASEGURADOR']);
		DB::table('client_subsectors')->insert(['name' => 'ASEGURADOR/REASUGURADOR']);
		DB::table('client_subsectors')->insert(['name' => 'AUTOMOTRIZ']);
		DB::table('client_subsectors')->insert(['name' => 'AUTOMOTRIZ / AUTOPARTES']);
		DB::table('client_subsectors')->insert(['name' => 'AUTOMOTRIZ / AUTOPARTES / MOTOCICLETAS']);
		DB::table('client_subsectors')->insert(['name' => 'BANCARIO']);
		DB::table('client_subsectors')->insert(['name' => 'CASA DE CAMBIO']);
		DB::table('client_subsectors')->insert(['name' => 'CASA DE CAMBIO DIGITAL']);
		DB::table('client_subsectors')->insert(['name' => 'CEMENTO/CONSTRUCCIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'COMERCIO/DISTRIBUCIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'COMERCIO/SUPERMERCADO']);
		DB::table('client_subsectors')->insert(['name' => 'COMERCIO']);
		DB::table('client_subsectors')->insert(['name' => 'COMERCIO/COMERCIO Y CONSTRUCCIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'COMERCIO/COMERCIO Y TRANSPORTE DE CARGA']);
		DB::table('client_subsectors')->insert(['name' => 'COMERCIO/COMERCIO -LICOR TABACO']);
		DB::table('client_subsectors')->insert(['name' => 'CONSTRUCCIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'CONSTRUCCIÓN/ACTIVIDADES DE ARQUITECTURA E INGENIERIA']);
		DB::table('client_subsectors')->insert(['name' => 'CONSTRUCTORA']);
		DB::table('client_subsectors')->insert(['name' => 'CONSULTORIA']);
		DB::table('client_subsectors')->insert(['name' => 'CONSULTORÍA']);
		DB::table('client_subsectors')->insert(['name' => 'COOPERATIVO']);
		DB::table('client_subsectors')->insert(['name' => 'COOPERATIVO/CAJA DE COMPENSACIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'COOPERATIVO/FONDO DE EMPLEADOS']);
		DB::table('client_subsectors')->insert(['name' => 'CRÉDITO/ FINANCIAMIENTO']);
		DB::table('client_subsectors')->insert(['name' => 'EDUCACIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'EPS']);
		DB::table('client_subsectors')->insert(['name' => 'FINANCIERO']);
		DB::table('client_subsectors')->insert(['name' => 'FINTECH']);
		DB::table('client_subsectors')->insert(['name' => 'FONDO DE EMPLEADOS']);
		DB::table('client_subsectors')->insert(['name' => 'HIDROCARBUROS']);
		DB::table('client_subsectors')->insert(['name' => 'HOSPITAL']);
		DB::table('client_subsectors')->insert(['name' => 'INGENIO']);
		DB::table('client_subsectors')->insert(['name' => 'INMOBILIARIO']);
		DB::table('client_subsectors')->insert(['name' => 'IPS']);
		DB::table('client_subsectors')->insert(['name' => 'JUEGOS DE SUERTE Y AZAR/JUEGOS DE SUERTE Y AZAR']);
		DB::table('client_subsectors')->insert(['name' => 'JUEGOS DE SUERTE Y AZAR/JUEGOS Y APUESTAS']);
		DB::table('client_subsectors')->insert(['name' => 'JUEGOS DE SUERTE Y AZAR']);
		DB::table('client_subsectors')->insert(['name' => 'LABORATORIO']);
		DB::table('client_subsectors')->insert(['name' => 'MANUFACTURA']);
		DB::table('client_subsectors')->insert(['name' => 'MINERIA']);
		DB::table('client_subsectors')->insert(['name' => 'MINERO ENERGÉTICO/ENERGÍA']);
		DB::table('client_subsectors')->insert(['name' => 'MINERO ENERGÉTICO/HIDROCARBUROS']);
		DB::table('client_subsectors')->insert(['name' => 'MINERO ENERGÉTICO']);
		DB::table('client_subsectors')->insert(['name' => 'MINERO ENERGÉTICO/MINERO']);
		DB::table('client_subsectors')->insert(['name' => 'MINERO ENERGÉTICO/EXPLORACION Y PETROLEOS']);
		DB::table('client_subsectors')->insert(['name' => 'OTROS']);
		DB::table('client_subsectors')->insert(['name' => 'PARTIDO POLITICO']);
		DB::table('client_subsectors')->insert(['name' => 'POSTAL /GIROS']);
		DB::table('client_subsectors')->insert(['name' => 'PRODUCCIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'RETAIL/SUPERMERCADO']);
		DB::table('client_subsectors')->insert(['name' => 'RETAIL']);
		DB::table('client_subsectors')->insert(['name' => 'SALUD']);
		DB::table('client_subsectors')->insert(['name' => 'SEGURIDAD Y VIGILANCIA']);
		DB::table('client_subsectors')->insert(['name' => 'SEGUROS']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIO/TRANSPORTE']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/CINE/ RADIO / TELEVISIÓN']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/CONCESIONARIO VIRTUAL DE VEHÍCULOS. OFERTA DE VALOR: EVITAR PROBLEMAS DE CLIENTES.']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/RECREATIVO']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/TECNOLOGÍA']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/CONSULTORÍA']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/FINANCIERO EN PARTE']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS/ACTIVIDADES JURIDICAS']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS PÚBLICOS/DISTRIBUCIÓN Y COMERCIALIZACIÓN DE ENERGÍA']);
		DB::table('client_subsectors')->insert(['name' => 'SERVICIOS PÚBLICOS']);
		DB::table('client_subsectors')->insert(['name' => 'SOLIDARIO']);
		DB::table('client_subsectors')->insert(['name' => 'TECNOLOGÍA/JUEGOS DE SUERTE Y AZAR / CORRESPONSAL BANCARIO / GIROS BANCARIOS']);
		DB::table('client_subsectors')->insert(['name' => 'TECNOLOGÍA']);
		DB::table('client_subsectors')->insert(['name' => 'TEXTIL/AUTOGAS- DISTRIBUCIÓN Y TRANSPORTE DE COMBUSTIBLE + RETAIL = COMERCIALIZADORA RETAIL DE COMBUSTIBLE Y TRANSPORTE DE COMBUSTIBLE']);
		DB::table('client_subsectors')->insert(['name' => 'TEXTIL']);
		DB::table('client_subsectors')->insert(['name' => 'TRANSPORTE/TRANSPORTE AÉREO']);
		DB::table('client_subsectors')->insert(['name' => 'TRANSPORTE']);
		DB::table('client_subsectors')->insert(['name' => 'TURISMO']);
        DB::table('client_subsectors')->insert(['name' => 'NO IDENTIFICA']);
    }
}
