<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanofiRequestOldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanofi_request_olds', function (Blueprint $table) {
            $table->id();
            $table->LongText('cod_homologacion')->nullable();
            $table->LongText('nombre')->nullable();
            $table->LongText('tipo_documento')->nullable();
            $table->LongText('identificacion')->nullable();
            $table->LongText('tipo_homologacion')->nullable();
            $table->LongText('fecha_diligenciamiento')->nullable();
            $table->LongText('pais')->nullable();
            $table->LongText('departamento')->nullable();
            $table->LongText('ciudad')->nullable();
            $table->LongText('direccion')->nullable();
            $table->LongText('correo')->nullable();
            $table->LongText('especialidad')->nullable();
            $table->LongText('especialidad_otra')->nullable();
            $table->LongText('funcionario')->nullable();
            $table->LongText('grado_academico')->nullable();
            $table->LongText('posicion_academico')->nullable();
            $table->LongText('miembro_cientifico')->nullable();
            $table->LongText('miembro_colciencias')->nullable();
            $table->LongText('experiencia_investigador')->nullable();
            $table->LongText('publicaciones')->nullable();
            $table->LongText('tiene_libros')->nullable();
            $table->LongText('conferencista')->nullable();
            $table->LongText('posters')->nullable();
            $table->LongText('premios')->nullable();
            $table->LongText('grados_academico')->nullable();
            $table->LongText('experiencia_clinica')->nullable();
            $table->LongText('experiencia_conferencia')->nullable();
            $table->LongText('asociado_hospital')->nullable();
            $table->LongText('articulos')->nullable();
            $table->LongText('libros')->nullable();
            $table->LongText('profesor_principal')->nullable();
            $table->LongText('ponencia_regional')->nullable();
            $table->LongText('ponencia_internacional')->nullable();
            $table->LongText('presidencia_internacional')->nullable();
            $table->LongText('miembro_internacional')->nullable();
            $table->LongText('presidencia_nacional')->nullable();
            $table->LongText('premios_internacionales')->nullable();
            $table->LongText('especialista')->nullable();
            $table->LongText('influencia')->nullable();
            $table->LongText('score')->nullable();
            $table->LongText('codigo_colegiatura')->nullable();
            $table->LongText('banco_beneficiario')->nullable();
            $table->LongText('ciudad_banco_beneficiario')->nullable();
            $table->LongText('país_banco_beneficiario')->nullable();
            $table->LongText('cuenta_beneficiario')->nullable();
            $table->LongText('tipo_cuenta')->nullable();
            $table->LongText('moneda')->nullable();
            $table->LongText('iban')->nullable();
            $table->LongText('swift')->nullable();
            $table->LongText('cuenta_interbancaria')->nullable();
            $table->LongText('banco_intermediario')->nullable();
            $table->LongText('cuenta_intermediario')->nullable();
            $table->LongText('ciudad_intermediario')->nullable();
            $table->LongText('pais_intermediario')->nullable();
            $table->LongText('aba_intermediario')->nullable();
            $table->LongText('tipo_cuenta_intermediario')->nullable();
            $table->LongText('gestiones_hcp')->nullable();
            $table->LongText('nombre_representante_legal')->nullable();
            $table->LongText('tipo_documento_representante_legal')->nullable();
            $table->LongText('documento_representante_legal')->nullable();
            $table->LongText('cargo_representante_legal')->nullable();
            $table->LongText('telefono_representante_legal')->nullable();
            $table->LongText('celular_representante_legal')->nullable();
            $table->LongText('email_representante_legal')->nullable();
            $table->LongText('fax_representante_legal')->nullable();
            $table->LongText('persona_contacto')->nullable();
            $table->LongText('taxonomia_documentos')->nullable();
            $table->LongText('fecha_homologacion')->nullable();
            $table->LongText('url_doc_proveedor')->nullable();
            $table->LongText('url_doc_homologacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanofi_request_olds');
    }
}
