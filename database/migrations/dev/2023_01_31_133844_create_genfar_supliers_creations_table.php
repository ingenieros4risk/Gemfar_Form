<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenfarSupliersCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genfar_supliers_creations', function (Blueprint $table) {
            $table->id();
            $table->integer('country_homologation')->unsigned(); // País
            $table->string('provider_name')->nullable(); // SuplierName
            $table->string('provider_mail')->nullable(); // SuplierName
            $table->string('provider_phone')->nullable(); // SuplierName
            $table->integer('genfar_provider')->unsigned()->nullable(); // Tipo proveedor
            $table->string('action')->nullable(); // Acción
            $table->string('industrykey')->nullable(); // Sociedades
            $table->integer('solicitante')->unsigned()->nullable();
            $table->string('nacionality')->nullable(); // Sociedades
            $table->string('paises')->nullable(); // Sociedades
            $table->string('tax_id')->nullable();
            $table->string('suplier_code')->nullable();
            $table->LongText('comments')->nullable();
            $table->string('attachment')->nullable();
            $table->string('hacat')->nullable();
            $table->integer('status')->unsigned()->nullable(); // Tipo proveedor
            $table->integer('id_genfar')->unsigned()->nullable();
            $table->string('confirm')->nullable();
            $table->string('approve')->nullable();
            $table->dateTimeTz('date_request')->nullable();
            $table->dateTimeTz('date_updated')->nullable();
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
        Schema::dropIfExists('genfar_supliers_creations');
    }
}
