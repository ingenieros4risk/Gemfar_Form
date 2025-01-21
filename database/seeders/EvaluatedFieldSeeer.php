<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluatedFieldSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('evaluated_fields')->insert(['name' => 'Fuente', 'weight' => 1]); //1
    	DB::table('evaluated_fields')->insert(['name' => 'Alias', 'weight' => 1]); //2
    	DB::table('evaluated_fields')->insert(['name' => 'Zona', 'weight' => 1]); //3
    	DB::table('evaluated_fields')->insert(['name' => 'Otra información', 'weight' => 1]); //4
    	DB::table('evaluated_fields')->insert(['name' => 'Usuario que actualizo/registro', 'weight' => 1]); //5
    	DB::table('evaluated_fields')->insert(['name' => 'Cargo o delito', 'weight' => 2]); //6
    	DB::table('evaluated_fields')->insert(['name' => 'Periodo desde', 'weight' => 2]); //7
    	DB::table('evaluated_fields')->insert(['name' => 'Periodo hasta', 'weight' => 2]); //8
    	DB::table('evaluated_fields')->insert(['name' => 'Tipo persona', 'weight' => 2]); //9
    	DB::table('evaluated_fields')->insert(['name' => 'Imagen', 'weight' => 2]); //10
    	DB::table('evaluated_fields')->insert(['name' => 'Tipo de documento', 'weight' => 3]); //11
    	DB::table('evaluated_fields')->insert(['name' => 'Documento de identidad', 'weight' => 3]); //12
    	DB::table('evaluated_fields')->insert(['name' => 'Lista', 'weight' => 3]); //13
    	DB::table('evaluated_fields')->insert(['name' => 'Nombre completo', 'weight' => 3]); //14
    	DB::table('evaluated_fields')->insert(['name' => 'Link', 'weight' => 3]); //15
    	DB::table('evaluated_fields')->insert(['name' => 'Estado', 'weight' => 3]); //16
    	DB::table('evaluated_fields')->insert(['name' => 'Número de Terceros faltantes', 'weight' => 29]); //17
    	DB::table('evaluated_fields')->insert(['name' => 'Tercero que no debía ingresarse', 'weight' => 2]); //18
    }
}
