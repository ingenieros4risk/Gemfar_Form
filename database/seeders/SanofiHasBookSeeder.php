<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanofiHasBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanofi_has_books')->insert(['name' => 'Más de un Libro o 1 libro más varios capítulos/More than one Book or 1 book plus several chapters', 'score' =>5]);
		DB::table('sanofi_has_books')->insert(['name' => 'Un Libro/A Book', 'score' =>4]);
		DB::table('sanofi_has_books')->insert(['name' => 'Más de un capítulo de libro/More than one book chapter', 'score' =>3]);
		DB::table('sanofi_has_books')->insert(['name' => 'Un capítulo de libro/A book chapter', 'score' =>2]);
		DB::table('sanofi_has_books')->insert(['name' => 'Ninguno/None', 'score' =>0]);
    }
}
