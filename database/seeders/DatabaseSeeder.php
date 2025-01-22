<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use database\seeds\UsersAndNotesSeeder;
//use database\seeds\MenusTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(MenusTableSeeder::class);
        //$this->call(UsersAndNotesSeeder::class);
        /*
        $this->call('UsersAndNotesSeeder');
        $this->call('MenusTableSeeder');
        $this->call('FolderTableSeeder');
        $this->call('ExampleSeeder');
        $this->call('BREADSeeder');
        $this->call('EmailSeeder');
        */

        $this->call([
            //UsersAndNotesSeeder::class,
            RolSeeder::class,
            FestiveSeeder::class,
            MenusTableSeeder::class,
            FolderTableSeeder::class,
            ExampleSeeder::class,
            CountrySeeder::class,
            InspektorDocumentTypeSeeder::class,
            CurrentTypeSeeder::class,
            SanofiAcademicDegreeSeeder::class,
            SanofiAcademicPositionSeeder::class,
            SanofiHasAwardSeeder::class,
            SanofiHasBookSeeder::class,
            SanofiHasConferenceSeeder::class,
            SanofiHasPosterSeeder::class,
            SanofiHasPublicationSeeder::class,
            SanofiHomologationCountrySeeder::class,
            SanofiHomologationTypeSeeder::class,
            SanofiMedicalSpecialitySeeder::class,
            SanofiMemberInvestigatorSeeder::class,
            SanofiMemberSocietySeeder::class,
            SanofiInfluenceSeeder::class,
            SanofiSocietySeeder::class,
            SanofiProviderSeeder::class,
            SanofiHacatSeeder::class,
            SanofiRequestTypeSeeder::class,
            //SanofiRequestFormSeeder::class,
            SanofiRequestStatusSeeder::class,
            RequestRiskStatusSeeder::class,
            GenfarIndustryKeySeeder::class,
            SanofiRequestRiskOldSeeder::class,
            ClientTypeSeeder::class,
            LegalEntitiesSeeder::class,
            SalesOrganizationSeeder::class,
            ChannelsSeeder::class,
            SectorsSeeder::class,
            SociedadSolicitanteSeeder::class,
            TiposSolicitudesSeeder::class,
            OficinasVentasSeeder::class,
            GrupoVendedoresSeeder::class,
            TypeSaleSeeder::class,
            GroupClientsSeeder::class,

        ]);
    }
}
