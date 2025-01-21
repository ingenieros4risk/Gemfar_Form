<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupportAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('support_answers')->insert(['name' => 'Correo']);
		DB::table('support_answers')->insert(['name' => 'Chat']);
		DB::table('support_answers')->insert(['name' => 'Llamada']);
		DB::table('support_answers')->insert(['name' => 'Correo y Llamada']);
		DB::table('support_answers')->insert(['name' => 'Correo y Chat']);
		DB::table('support_answers')->insert(['name' => 'Correo y Llamada']);
		DB::table('support_answers')->insert(['name' => 'Chat, Correo y Llamada']);
		DB::table('support_answers')->insert(['name' => 'WhatsApp']);
		DB::table('support_answers')->insert(['name' => 'Conexión remota']);
    }
}
