<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InspektorDocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('inspektor_document_types')->insert(['cat' => 'TDN', 'name' => 'TRAVEL DOCUMENT NUMBER']);
		DB::table('inspektor_document_types')->insert(['cat' => 'BRD', 'name' => 'BUSSINESS REGISTRATION DOCUMENT']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CC', 'name' => 'CÉDULA DE CIUDADANÍA']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RD', 'name' => 'REGISTRATION DOCUMENT']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CE', 'name' => 'CÉDULA DE EXTRANJERÍA']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RFC', 'name' => 'REGISTRO FEDERAL DE CONTRIBUYENTES']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CRN', 'name' => 'COMMERCIAL REGISTRY NUMBER']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CIF', 'name' => 'CODIGO DE IDENTIFICACIÓN FISCAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RI', 'name' => 'REGISTRATION ID']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RIF', 'name' => 'RÉGIMEN DE IDENTIFICACIÓN FISCAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'FM', 'name' => 'FOLIO MERCANTIL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'MM', 'name' => 'MATRICULA MERCANTIL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NIT', 'name' => 'NUMERO DE IDENTIFICACIÓN TRIBUTARIA']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NI', 'name' => 'NATIONAL ID']);
		DB::table('inspektor_document_types')->insert(['cat' => 'PP', 'name' => 'PASAPORTE']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RUC', 'name' => 'REGISTRO UNICO CONTRIBUTIVO']);
		DB::table('inspektor_document_types')->insert(['cat' => 'TI', 'name' => 'TARJETA DE IDENTIDAD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NUIP', 'name' => 'NUMERO UNICO DE IDENTIFICACIÓN PERSONAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CrE', 'name' => 'CREDENCIAL ELECTORAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'VRI', 'name' => 'VESSEL REGISTRATION IDENTIFICATION']);
		DB::table('inspektor_document_types')->insert(['cat' => 'DNI', 'name' => 'DOCUMENTO NACIONAL DE IDENTIDAD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CI', 'name' => 'CÉDULA DE IDENTIDAD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CaI', 'name' => 'CARTEIRA DE IDENTIDADE']);
		DB::table('inspektor_document_types')->insert(['cat' => 'DUI', 'name' => 'DOCUMENTO ÚNICO DE IDENTIDAD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'DPI', 'name' => 'DOCUMENTO PERSONAL DE IDENTIFICACIÓN']);
		DB::table('inspektor_document_types')->insert(['cat' => 'TDI', 'name' => 'TARJETA DE IDENTIDAD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CURP', 'name' => 'CLAVE ÚNICA DE REGISTRO DE POBLACIÓN']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CIP', 'name' => 'CÉDULA DE IDENTIDAD PERSONAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CIC', 'name' => 'CÉDULA DE IDENTIDAD CIVIL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CdC', 'name' => 'CARTAO DE CIDADAO']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CIE', 'name' => 'CÉDULA DE IDENTIDAD Y ELECTORAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'SIN', 'name' => 'SOCIAL INSURANCE NUMBER']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NAS', 'name' => 'NUMÉRO D ASSURANCE SOCIAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CUIT', 'name' => 'CÓDIGO ÚNICO DE IDENTIFICACIÓN TRIBUTARIA']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CPF', 'name' => 'CADASTRO DE PERSONA FÍSICA']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CNPJ', 'name' => 'CADASTRO DE PERSONA JURÍDICA']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RG', 'name' => 'REGISTRO GERAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RUT', 'name' => 'ROL O REGISTRO ÚNICO TRIBUTARIO']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NITE', 'name' => 'NÚMERO DE IDENTIFICACIÓN TRIBUTARIA ESPECIAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RNC', 'name' => 'REGISTRO NACIONAL DEL CONTRIBUYENTE']);
		DB::table('inspektor_document_types')->insert(['cat' => 'TIN', 'name' => 'TAXPAYER IDENTIFICATION NUMBER']);
		DB::table('inspektor_document_types')->insert(['cat' => 'PC', 'name' => 'PASSPORT CARD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'RTN', 'name' => 'REGISTRO TRIBUTARIO NACIONAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'VAT', 'name' => 'VALUE ADDED TAX']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NIF', 'name' => 'CÓDIGO DE IDENTIFICACIÓN FISCAL PARA EMPRESAS']);
		DB::table('inspektor_document_types')->insert(['cat' => 'CdI', 'name' => 'CARNE DE IDENTIDAD']);
		DB::table('inspektor_document_types')->insert(['cat' => 'IDLC', 'name' => 'ID LICENCIA DE CONDUCIR']);
		DB::table('inspektor_document_types')->insert(['cat' => 'SNN', 'name' => 'NÚMERO DE SEGURO SOCIAL']);
		DB::table('inspektor_document_types')->insert(['cat' => 'NUC', 'name' => '-------']);
    }
}
