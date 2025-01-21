<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//1
        DB::table('mapas')->insert([
            'fuente' => 'AML',
            'informacion' => 'https://www.baselgovernance.org/sites/default/files/2019-08/Basel%20AML%20Index%202019.pdf',
            'riesgo' => 'Una clasificación de país y revisión de dinero riesgos de lavado y financiamiento del terrorismo alrededor del mundo',
            'medicion' => '0,0 a 10,0'
        ]);
        //2
        DB::table('mapas')->insert([
            'fuente' => 'TRANSPARECIA INTERNACIONAL',
            'informacion' => 'https://www.transparency.org/cpi2019',
            'riesgo' => 'El Índice de Percepción de la Corrupción clasifica a 180 países y territorios según sus niveles percibidos de corrupción en el sector público, según expertos y empresarios. El análisis de este año muestra que la corrupción es más generalizada en países donde grandes cantidades de dinero pueden fluir libremente en campañas electorales y donde los gobiernos solo escuchan las voces de individuos ricos o bien conectados.',
            'medicion' => '0 a 100'
        ]);
        //3
        DB::table('mapas')->insert([
            'fuente' => 'UIAF',
            'informacion' => 'https://www.uiaf.gov.co/asuntos_internacionales/lista_paises_no_cooperantes_29282',
            'riesgo' => 'Dentro de las acciones internacionales en la lucha contra el lavado de activos y la financiación del terrorismo, el Grupo de Acción Financiera Internacional (GAFI), desarrolla de manera continua un proceso de identificación de aquellas jurisdicciones que no han desarrollado las medidas preventivas necesarias para proteger al país frente a estos delitos',
            'medicion' => '0 a 2'
        ]);
        //4
        DB::table('mapas')->insert([
            'fuente' => 'World Economic Forum',
            'informacion' => 'http://www3.weforum.org/docs/WEF_TheGlobalCompetitivenessReport2019.pdf',
            'riesgo' => 'Fundación sin fines de lucro con sede en Ginebra, que se reúne anualmente en el Monte de Davos (Suiza), y que sobre todo es conocida por su asamblea anual en Davos, Suiza. Allí se reúnen los principales líderes empresariales, los líderes políticos internacionales, así como periodistas e intelectuales selectos, a efectos de analizar los problemas más apremiantes que afronta el mundo.',
            'medicion' => '0,0 a 100,0'
        ]);
        //5
        DB::table('mapas')->insert([
            'fuente' => 'FSI Financial Secrecy Index',
            'informacion' => 'https://www.financialsecrecyindex.com/PDF/FSI-Rankings-2018.xlsx',
            'riesgo' => 'Comprende el secreto financiero global, los paraísos fiscales o las jurisdicciones secretas, y los flujos financieros ilícitos o la fuga de capitales.',
            'medicion' => '0,0 a 100,0'
        ]);
        //6
        DB::table('mapas')->insert([
            'fuente' => 'UNION EUROPEA',
            'informacion' => 'https://www.compliance.com.co/la-ue-publica-una-lista-negra-de-lavado-de-dinero/',
            'riesgo' => 'La UE publica una lista negra de lavado de dinero, insta a los bancos a aplicar la diligencia debida con el cliente (CDD)',
            'medicion' => '0 a 1'
        ]);
        //7
        DB::table('mapas')->insert([
            'fuente' => 'CORPORATE TAX HAVEN INDEX 2019',
            'informacion' => 'https://corporatetaxhavenindex.org/introduction/cthi-2019-results',
            'riesgo' => 'El Corporate Tax Haven Index clasifica los paraísos fiscales más importantes del mundo para las corporaciones multinacionales, de acuerdo con cuán agresiva y extensamente cada jurisdicción contribuye a ayudar a las empresas multinacionales del mundo a escapar del pago de impuestos, y erosiona los ingresos fiscales de otros países del mundo. También indica cuánto contribuye cada lugar a una "carrera hacia el fondo" global sobre los impuestos corporativos.',
            'medicion' => '0,0 a 100,0'
        ]);
        //8
        DB::table('mapas')->insert([
            'fuente' => 'SISTEMA ÚNICO DE INFORMACIÓN NORMATIVA',
            'informacion' => 'http://www.suin-juriscol.gov.co/viewDocument.asp?ruta=Decretos/1378468',
            'riesgo' => 'De conformidad con los criterios señalados en el artículo 260-7 del Estatuto Tributario, a continuación se determinan los países, jurisdicciones, dominios, estados asociados o territorios que se consideran como paraísos fiscales: Modificado por el art. 1, Decreto Nacional 2095 de 2014.',
            'medicion' => '0,0 a 10,0'
        ]);
        //JUANITA
        DB::table('mapas')->insert([
            'fuente' => 'DATALAFT',
            'informacion' => 'https://datalaft.com/',
            'riesgo' => 'XXXXXX',
            'medicion' => '0,0 a 5,0'
        ]);
    }
}
