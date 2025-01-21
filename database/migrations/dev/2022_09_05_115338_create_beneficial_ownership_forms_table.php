<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficialOwnershipFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        'id', 'country_id', 'document', 'name', 'sanofi_provider', 'status_form', 'date_form', 'form_type', 'provider_prepared',
        'provider_position', 'provider_sign', 'sanofi_verified', 'sanofi_date', 'sanofi_position', 'sanofi_comment', 'sanofi_recommendation',
        'sanofi_approval', 'has_beneficiaries', 'provider_justification'
        */
        Schema::create('beneficial_ownership_forms', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('country_id')->unsigned()->nullable();            
            $table->LongText('document')->nullable();
            $table->LongText('name')->nullable();
            $table->integer('sanofi_provider')->unsigned()->nullable();
            $table->integer('status_form')->unsigned()->nullable();
            $table->dateTimeTz('date_form')->nullable();
            $table->integer('form_type')->unsigned()->nullable();
            $table->LongText('provider_prepared')->nullable();
            $table->string('provider_position')->nullable();
            $table->string('provider_sign')->nullable();
            $table->integer('sanofi_verified')->nullable();
            $table->dateTimeTz('sanofi_date')->nullable();
            $table->string('sanofi_position')->nullable();
            $table->LongText('sanofi_comment')->nullable();
            $table->LongText('sanofi_recommendation')->nullable();
            $table->LongText('sanofi_approval')->nullable();
            $table->tinyInteger('has_beneficiaries')->nullable();
            $table->LongText('provider_justification')->nullable();
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
        Schema::dropIfExists('beneficial_ownership_forms');
    }
}
