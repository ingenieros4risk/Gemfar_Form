<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportMediumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_media')->insert(['name'=>'Chat']);
        DB::table('support_media')->insert(['name'=>'Correo Electrónico']);
        DB::table('support_media')->insert(['name'=>'Llamada']);
        DB::table('support_media')->insert(['name'=>'WhatsApp']);
        DB::table('support_media')->insert(['name'=>'Conexión remota']);
    }
}
