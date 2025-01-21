<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanofiRequestFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanofi_request_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('sanofi_request_risk_id')->unsigned()->nullable();
            $table->tinyInteger('ethics')->unsigned()->nullable();
            $table->tinyInteger('hys')->unsigned()->nullable();
            $table->tinyInteger('csr')->unsigned()->nullable();
            $table->tinyInteger('env')->unsigned()->nullable();
            $table->tinyInteger('csy')->unsigned()->nullable();
            $table->tinyInteger('dda')->unsigned()->nullable();
            $table->string('password',30)->nullable();
            $table->string('name')->nullable();
            $table->string('document')->nullable();
            $table->integer('sanofi_provider')->unsigned()->nullable();
            $table->string('multiple_select_country')->nullable();
            $table->integer('country_homologation')->unsigned()->nullable();// País de donde viene
            $table->string('certificado_existencia')->nullable();
            $table->string('certificado_bancaria')->nullable();
            $table->string('rut')->nullable();
            $table->string('cedula_rep')->nullable();
            $table->string('licencia_medica')->nullable();
            $table->string('curriculum_vitae')->nullable();
            $table->string('quest_1',30)->nullable();
            $table->string('quest_3',30)->nullable();
            $table->string('quest_4',30)->nullable();
            $table->string('quest_5',30)->nullable();
            $table->string('quest_6',30)->nullable();
            $table->string('quest_8',30)->nullable();
            $table->string('quest_9',30)->nullable();
            $table->string('quest_10',1)->nullable();
            $table->string('quest_11',30)->nullable();
            $table->string('quest_12',30)->nullable();
            $table->string('quest_13',30)->nullable();
            $table->string('quest_14',30)->nullable();
            $table->string('quest_15',30)->nullable();
            $table->string('quest_16',30)->nullable();
            $table->string('quest_17',30)->nullable();
            $table->string('quest_18',30)->nullable();
            $table->string('quest_19',30)->nullable();
            $table->string('quest_21',30)->nullable();
            $table->tinyInteger('quest_22')->nullable();
            $table->tinyInteger('quest_24')->nullable();
            
            
            $table->string('quest_27',30)->nullable();
            $table->string('quest_28',30)->nullable();
            $table->string('quest_29',30)->nullable();
            $table->tinyInteger('quest_30')->nullable();
            $table->string('quest_31',30)->nullable();
            $table->string('quest_32',30)->nullable();
            
            
            $table->string('quest_35',30)->nullable();
            $table->string('quest_36',30)->nullable();
            
            $table->tinyInteger('quest_38')->nullable();
            $table->tinyInteger('quest_39')->nullable();
            $table->string('quest_46',30)->nullable();
            $table->tinyInteger('quest_47')->nullable();
            
            $table->string('quest_59',30)->nullable();
            $table->string('quest_60',30)->nullable();
            $table->string('quest_61',30)->nullable();
            
            
            $table->string('quest_40',30)->nullable();
            $table->string('quest_41',30)->nullable();
            $table->string('quest_42',30)->nullable();
            $table->string('quest_43',30)->nullable();
            $table->string('quest_44',30)->nullable();
            $table->string('quest_45',30)->nullable();
            $table->string('quest_49',30)->nullable();
            $table->tinyInteger('quest_50')->nullable();
            $table->string('quest_51',30)->nullable();
            $table->string('quest_52',30)->nullable();
            $table->string('quest_53',30)->nullable();
            $table->string('quest_54',30)->nullable();
            $table->string('quest_55',30)->nullable();
            $table->string('quest_56',30)->nullable();
            $table->string('quest_57',30)->nullable();
            $table->string('quest_58',30)->nullable();
            $table->string('quest_62',30)->nullable();
            $table->string('quest_63',30)->nullable();
            $table->string('quest_75',30)->nullable();
            $table->string('quest_76',30)->nullable();
            $table->string('quest_77',30)->nullable();
            $table->string('quest_92',30)->nullable();
            $table->string('quest_93',30)->nullable();
            $table->string('quest_94',30)->nullable();
            $table->string('quest_95',30)->nullable();
            $table->string('quest_96',30)->nullable();
            $table->string('quest_97',30)->nullable();
            $table->string('quest_98',30)->nullable();
            $table->string('quest_99',30)->nullable();
            $table->string('quest_100',30)->nullable();
            $table->string('quest_101',30)->nullable();
            $table->string('quest_102',30)->nullable();
            $table->string('quest_103',30)->nullable();
            $table->string('quest_104',30)->nullable();
            //Ethics
            $table->string('quest_71',30)->nullable();
            $table->string('quest_71f',30)->nullable();
            $table->string('quest_25',30)->nullable();
            $table->tinyInteger('quest_26')->nullable();
            $table->string('quest_33',30)->nullable();
            $table->tinyInteger('quest_34')->nullable();
            $table->string('quest_70',30)->nullable();
            $table->tinyInteger('quest_37')->nullable();
            $table->tinyInteger('quest_73')->nullable();
            $table->string('quest_73_add',30)->nullable();
            $table->tinyInteger('quest_74')->nullable();
            $table->tinyInteger('quest_48')->nullable();
            $table->string('quest_48f',30)->nullable();
            $table->tinyInteger('quest_72')->nullable();
            $table->string('quest_72F')->nullable();
            $table->tinyInteger('quest_64')->nullable();
            $table->string('quest_64f',30)->nullable();
            $table->tinyInteger('quest_65')->nullable();
            $table->string('quest_65f',30)->nullable();
            $table->tinyInteger('quest_66')->nullable();
            $table->tinyInteger('quest_67')->nullable();
            $table->tinyInteger('quest_68')->nullable();
            $table->string('quest_68f',30)->nullable();
            $table->tinyInteger('quest_69')->nullable();
            $table->tinyInteger('alert_dda')->nullable();
            //CSR
            $table->string('csr_1',30)->nullable();
            $table->string('csr_2',30)->nullable();
            $table->string('csr_3',30)->nullable();
            $table->string('empaque',30)->nullable();
            $table->string('csr_4',30)->nullable();
            $table->string('csr_5',30)->nullable();
            $table->string('csr_6',30)->nullable();
            $table->string('confidencial',30)->nullable();
            $table->string('csr_7',30)->nullable();
            $table->string('csr_8',30)->nullable();
            // Env
            $table->tinyInteger('env_1')->nullable();
            $table->tinyInteger('env_2')->nullable();
            $table->tinyInteger('env_3')->nullable();
            $table->tinyInteger('env_4')->nullable();
            $table->tinyInteger('env_5')->nullable();
            $table->tinyInteger('env_6')->nullable();
            $table->tinyInteger('env_7')->nullable();
            $table->tinyInteger('env_8')->nullable();
            // H y S
            $table->tinyInteger('hys_1')->nullable();
            $table->tinyInteger('hys_2')->nullable();
            $table->tinyInteger('hys_3')->nullable();
            $table->tinyInteger('hys_4')->nullable();
            $table->tinyInteger('hys_5')->nullable();
            $table->tinyInteger('hys_6')->nullable();
            $table->tinyInteger('hys_7')->nullable();
            $table->tinyInteger('hys_8')->nullable();
            // CSY
            $table->tinyInteger('csy_1')->nullable();
            // EBI
            $table->string('ebi_comentario',30)->nullable();
            $table->string('ebi_plan')->nullable();
            $table->string('ebi_recomendacion')->nullable();

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
        Schema::dropIfExists('sanofi_request_forms');
    }
}
