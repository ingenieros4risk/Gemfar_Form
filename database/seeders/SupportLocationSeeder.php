<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupportLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_locations')->insert(['name'=>'BOGOTÁ']);
		DB::table('support_locations')->insert(['name'=>'CALI']);
		DB::table('support_locations')->insert(['name'=>'MEDELLÍN']);
		DB::table('support_locations')->insert(['name'=>'LIMA']);
		DB::table('support_locations')->insert(['name'=>'QUITO']);
		DB::table('support_locations')->insert(['name'=>'TEGUCIGALPA']);
		DB::table('support_locations')->insert(['name'=>'CARACAS']);
		DB::table('support_locations')->insert(['name'=>'CIUDAD DE PANAMÁ']);
		DB::table('support_locations')->insert(['name'=>'SAN JOSÉ']);
		DB::table('support_locations')->insert(['name'=>'CIUDAD DE MÉXICO']);
		DB::table('support_locations')->insert(['name'=>'CIUDAD DE GUATEMALA']);
		DB::table('support_locations')->insert(['name'=>'ARMENIA']);
		DB::table('support_locations')->insert(['name'=>'BARRANQUILLA']);
		DB::table('support_locations')->insert(['name'=>'BUCARAMANGA']);
		DB::table('support_locations')->insert(['name'=>'BUGA']);
		DB::table('support_locations')->insert(['name'=>'CAREPA - ANTIOQUIA']);
		DB::table('support_locations')->insert(['name'=>'CARTAGENA']);
		DB::table('support_locations')->insert(['name'=>'CHIA']);
		DB::table('support_locations')->insert(['name'=>'COPACABANA']);
		DB::table('support_locations')->insert(['name'=>'COTA']);
		DB::table('support_locations')->insert(['name'=>'CÚCUTA']);
		DB::table('support_locations')->insert(['name'=>'ENVIGADO']);
		DB::table('support_locations')->insert(['name'=>'FLORENCIA']);
		DB::table('support_locations')->insert(['name'=>'FLORIDABLANCA - BUCARAMANGA']);
		DB::table('support_locations')->insert(['name'=>'GUACHENE']);
		DB::table('support_locations')->insert(['name'=>'GUAJIRA']);
		DB::table('support_locations')->insert(['name'=>'IPIALES']);
		DB::table('support_locations')->insert(['name'=>'LIMA']);
		DB::table('support_locations')->insert(['name'=>'MAICAO']);
		DB::table('support_locations')->insert(['name'=>'MANIZALEZ']);
		DB::table('support_locations')->insert(['name'=>'MONTERIA']);
		DB::table('support_locations')->insert(['name'=>'MOSQUERA']);
		DB::table('support_locations')->insert(['name'=>'NEIVA']);
		DB::table('support_locations')->insert(['name'=>'PALMIRA']);
		DB::table('support_locations')->insert(['name'=>'PASTO']);
		DB::table('support_locations')->insert(['name'=>'PEREIRA']);
		DB::table('support_locations')->insert(['name'=>'POPAYÁN']);
		DB::table('support_locations')->insert(['name'=>'QUIBDO']);
		DB::table('support_locations')->insert(['name'=>'RIOACHA']);
		DB::table('support_locations')->insert(['name'=>'RIONEGRO']);
		DB::table('support_locations')->insert(['name'=>'SANTA MARTA']); 
		DB::table('support_locations')->insert(['name'=>'SANTANDER DE QUILICHAO']); 
		DB::table('support_locations')->insert(['name'=>'SIBERIA']);
		DB::table('support_locations')->insert(['name'=>'SINCELEJO']);
		DB::table('support_locations')->insert(['name'=>'SOACHA']);
		DB::table('support_locations')->insert(['name'=>'TENJO']);
		DB::table('support_locations')->insert(['name'=>'TOCANCIPA']);
		DB::table('support_locations')->insert(['name'=>'TULUA']);
		DB::table('support_locations')->insert(['name'=>'TURREQUES']);
		DB::table('support_locations')->insert(['name'=>'VALLEDUPAR']);
		DB::table('support_locations')->insert(['name'=>'YOPAL']);
		DB::table('support_locations')->insert(['name'=>'YUMBO']);
		DB::table('support_locations')->insert(['name'=>'SANTIAGO  DE CHILE']);
    }
}
