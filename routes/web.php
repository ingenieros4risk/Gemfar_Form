<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/', function () {           return view('dashboard.homepage'); });

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {     return view('dashboard.colors'); });
        Route::get('/typography', function () { return view('dashboard.typography'); });
        Route::get('/charts', function () {     return view('dashboard.charts'); });
        Route::get('/widgets', function () {    return view('dashboard.widgets'); });
        Route::get('/404', function () {        return view('dashboard.404'); });
        Route::get('/500', function () {        return view('dashboard.500'); });
        Route::prefix('base')->group(function () {  
            Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
            Route::get('/cards', function(){        return view('dashboard.base.cards'); });
            Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
            Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

            Route::get('/forms', function(){        return view('dashboard.base.forms'); });
            Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
            Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
            Route::get('/navs', function(){         return view('dashboard.base.navs'); });

            Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
            Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
            Route::get('/progress', function(){     return view('dashboard.base.progress'); });
            Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });

            Route::get('/switches', function(){     return view('dashboard.base.switches'); });
            Route::get('/tables', function () {     return view('dashboard.base.tables'); });
            Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
            Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
        });
        Route::prefix('buttons')->group(function () {  
            Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
            Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
            Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
            Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
            Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
            Route::get('/brands',function(){               return view('dashboard.icons.brands'); });
        });
        Route::prefix('notifications')->group(function () {  
            Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
            Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
            Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
        });
        Route::resource('notes', 'NotesController');

        Route::resource('festives','FestiveController');

        Route::resource('inspektor/list/periodicity', 'InspektorPeriodicityListController');
        Route::resource('inspektor/list/parameterizations', 'InspektorParameterizationController');
        Route::resource('inspektor/list/group', 'InspektorGroupListController');
        Route::resource('inspektor/list/priority', 'InspektorPriorityController');
        Route::resource('inspektor/list/type', 'InspektorParameterizationTypeController');
        Route::resource('inspektor/list', 'InspektorListController');
        Route::prefix('inspektor/list')->group(function () { 
            Route::get('/',         'InspektorListController@index')->name('inspektor_lists.index');
            Route::get('/create',   'InspektorListController@create')->name('inspektor_lists.create');
            Route::post('/store',   'InspektorListController@store')->name('inspektor_lists.store');
            Route::get('/edit',     'InspektorListController@edit')->name('inspektor_lists.edit');
            Route::post('/update',  'InspektorListController@update')->name('inspektor_lists.update');
            Route::get('/delete',   'InspektorListController@delete')->name('inspektor_lists.delete');
            Route::get('/export',   'InspektorListController@export')->name('inspektor_lists.export');

        });

    });

    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    /*Routes publics*/


    Route::redirect('/genfar/create',        '/es/genfar/create');

    Route::redirect('/loginAsgenfar',        '/login');

    Route::group(['prefix' => '{language}'], function(){
        Route::get('genfar/create/{form}', 'SanofiRequestFormController@create');
        Route::get('/download_consentimiento/{diligencia}','SanofiRequestFormController@consentimiento')->name('genfar.consentimiento');
        Route::get('/download_manifestacion/{diligencia}','SanofiRequestFormController@manifestacion')->name('genfar.manifestacion');
    });

    //Ruta de Formulario de Clientes
    Route::group(['prefix' => '{language}'], function(){
        Route::get('genfar/clients/{form}', 'ClientsController@create');
   });

    //Route::get('genfar/create/{form}', 'SanofiRequestFormController@create');

    Route::group(['prefix' => '{language}'], function(){
        Route::get('genfar-update/create',        'SanofiRequestFormController@genfarUpdate');
    });

    Route::group(['prefix' => '{language}'], function(){
        Route::get('beneficial-ownership/create',        'BeneficialOwnershipFormController@create');
    });

    Route::get('genfarAsSherlock',        'SanofiRequestFormController@sherlock');
    
    Auth::routes();


    Route::group(['middleware' => ['role:genfar']], function () 
    {
        Route::resource('genfar-homologation-country',        'SanofiHomologationCountryController');
        Route::resource('genfar-homologation-type',        'SanofiHomologationTypeController');
        Route::resource('genfar-medical-especiality',        'SanofiMedicalSpecialityController');
        Route::resource('genfar-academic-degree',        'SanofiAcademicDegreeController');
        Route::resource('genfar-academic-position',        'SanofiAcademicPositionController');
        Route::resource('genfar-memeber-society',        'SanofiMemberSocietyController');
        Route::resource('genfar-memeber-investigator',        'SanofiMemberInvestigatorController');
        Route::resource('genfar-has-publication',        'SanofiHasPublicationController');
        Route::resource('genfar-has-book',        'SanofiHasBookController');
        Route::resource('genfar-has-conference',        'SanofiHasConferenceController');
        Route::resource('genfar-has-poster',        'SanofiHasPosterController');
        Route::resource('genfar-has-award',        'SanofiHasAwardController');
        Route::resource('genfar-society',        'SanofiSocietyController');
        Route::resource('hacats',        'SanofiHacatController');

        
        /* Rutas de la Solicitud de Clientes*/
        Route::resource('genfar-request-clients', 'ClientsController');



        /* Rutas de la Solicitud*/
        Route::resource('genfar-request-risk', 'SanofiRequestRiskController');
        Route::post('/genfar-request-risk-ethics', 'SanofiRequestRiskController@ethics')->name('genfar.ethics');
        Route::post('/genfar-request-risk-csy', 'SanofiRequestRiskController@csy')->name('genfar.csy');
        Route::post('/genfar-request-risk-csr', 'SanofiRequestRiskController@csr')->name('genfar.csr');
        Route::post('/genfar-request-risk-hys', 'SanofiRequestRiskController@hys')->name('genfar.hys');
        Route::post('/genfar-request-risk-env', 'SanofiRequestRiskController@env')->name('genfar.env');
        Route::post('/genfar-request-risk-sarlaft', 'SanofiRequestRiskController@sarlaft')->name('genfar.sarlaft');
        Route::post('/genfar-request-risk-perfilamiento', 'SanofiRequestRiskController@perfilamiento')->name('genfar.perfilamiento');

        Route::post('/genfar-request-risk-cancel', 'SanofiRequestRiskController@cancel')->name('genfar.cancel');
        Route::post('/genfar-request-risk-manage', 'SanofiRequestRiskController@manage')->name('genfar.manage');
        Route::post('/genfar-request-risk-migo', 'SanofiRequestRiskController@migo')->name('genfar.migo');
        Route::post('/genfar-request-risk-interno', 'SanofiRequestRiskController@buyer')->name('genfar.buyer');
        Route::post('/genfar-update-dds', 'SanofiRequestRiskController@updateDds')->name('genfar.updatedds');
        Route::post('/genfar-update-dda', 'SanofiRequestRiskController@updateDda')->name('genfar.updatedda');
        Route::post('/genfar-aprobacion-compra', 'SanofiRequestRiskController@updateAprobacionCompras')->name('genfar.updateaprobacioncompras');
        Route::post('/genfar-manifestacion-suscrita', 'SanofiRequestRiskController@updateManifestacionSuscrita')->name('genfar.updatemanifestacionsuscrita');
        Route::get('/getHacat/{id}','SanofiRequestRiskController@getHacat');
        Route::get('/download_purchase/{diligencia}' , 'SanofiRequestRiskController@downloadPurchaseOrder')->name('genfar.purchaseorder');
        Route::get('/download_dda/{diligence}', 'SanofiRequestRiskController@downloadDDA')->name('genfar.downloadDDA');
        Route::get('/download_dds/{diligence}', 'SanofiRequestRiskController@downloadDDS')->name('genfar.downloadDDS');
        Route::get('/download_aprobacion_compra/{diligencia}','SanofiRequestRiskController@downloadAprobacionCompra')->name('genfar.aprobacion_compra');
        Route::get('/download_manifestacion_suscrita/{diligencia}','SanofiRequestRiskController@downloadManifestacion')->name('genfar.manifestacion_suscrita');

        /*Route Genfar Supliers Creation*/
        
        Route::resource('genfar-supliers', 'GenfarSupliersCreationController');
        Route::get('genfar-supliers-pending', 'GenfarSupliersCreationController@pending')->name('genfar-pending-view');
        Route::get('/genfar-pending-notification', 'GenfarSupliersCreationController@pending_notification')->name('genfar.pending_notification');
        Route::get('/getIndustryKey/{id}','GenfarSupliersCreationController@getIndustryKey');
        Route::post('genfar-supliers/{solicitud}','GenfarSupliersCreationController@update');
        Route::get('genfar-supliers/create/{solicitud}', 'GenfarSupliersCreationController@createAsGenfar')->name('genfar.createasgenfar');
        Route::post('/genfar-supliers-aprobar', 'GenfarSupliersCreationController@aprobar')->name('genfar.aprobar');
        Route::get('/download_attach_suplier/{diligence}', 'GenfarSupliersCreationController@downloadattach')->name('genfar.downloadattach');
        // Route::get('/download_attach_confirmation/{diligence}', 'GenfarSupliersCreationController@downloadattachConfirmation')->name('genfar.downloadattach_confirmation');
        Route::get('/download_attach_aprobation/{diligence}', 'GenfarSupliersCreationController@downloadattachAprobation')->name('genfar.downloadattach_aprobation');
        Route::get('export_tasks_suplier', 'GenfarSupliersCreationController@export')->name('genfar.tasks');

        /* Rutas de Busqueda*/

        Route::get('/genfar-search', 'SanofiRequestRiskController@findByURLView')->name('genfar.find');
        Route::get('/genfar-search-url','SanofiRequestRiskController@findByURL');
        
        /*Route Beneficial Ownership*/
        Route::resource('beneficial-ownership','BeneficialOwnershipController');

        /*Route Users genfar*/
        Route::get('genfar-users', 'UsersController@indexgenfar');
        Route::resource('genfar-update','SanofiRequestUpdateController');
        Route::resource('genfar','SanofiRequestFormController');
        Route::post('/genfar-request-form-categorizacion', 'SanofiRequestFormController@categorizacion')->name('genfar.categorizacion');


        /*Sanofi Anterior */
        Route::resource('sanofi-old','SanofiRequestRiskOldController');
        Route::get('/export_sanofi_old', 'SanofiRequestRiskOldController@export')->name('sanofi-old.export');


        /*genfar anterior proveedor*/
        Route::resource('genfar-old','SanofiRequestOldController');
        Route::get('/download_report_provider/{request}', 'SanofiRequestOldController@downloadReportProvider')->name('genfar-old.downloadReportProvider');
        Route::get('/download_report_homologation/{request}', 'SanofiRequestOldController@downloadReportHomologation')->name('genfar-old.downloadReportHomologation');
        Route::get('/risk_international_export', 'SanofiRequestOldController@export')->name('sanofi-old-export');

        /*Export genfar*/
        Route::get('users_export_genfar', 'UsersController@exportgenfar')->name('genfarusers.export');
        Route::get('/genfar/providers/pdf','SanofiRequestFormController@createAllPDF')->name('genfar.exportpdf');
        Route::get('/download_curriculum_vitae/{diligencia}','SanofiRequestFormController@downloadCurriculumVitae')->name('genfar.curriculum_vitae');
        Route::get('genfar_risk_export', 'SanofiRequestRiskController@export')->name('genfar.export');
        Route::get('genfar_forms_export', 'SanofiRequestRiskController@exportForms')->name('genfar.forms');
        Route::get('/genfar-notification-aditional', 'SanofiRequestRiskController@pending_notification')->name('genfar.notification_aditional');


        
        Route::get('/download_coincidences_bfs/{diligencia}','SanofiRequestFormController@downloadBeneficial')->name('genfar.beneficial_ownership');
        Route::get('/download_no_coincidences_bfs/{diligencia}','SanofiRequestFormController@downloadNoBeneficial')->name('genfar.no_beneficial_ownership');
        Route::get('/download_certificado_existencia/{diligencia}','SanofiRequestFormController@downloadCertificadoExistencia')->name('genfar.certificado_existencia');
        Route::get('/download_rut/{diligencia}','SanofiRequestFormController@downloadRUT')->name('genfar.rut');
        Route::get('/download_cedula_rep/{diligencia}','SanofiRequestFormController@downloadCedulaRepresentante')->name('genfar.cedula_rep');
        Route::get('/download_licencia_medica/{diligencia}','SanofiRequestFormController@downloadLicenciaMedica')->name('genfar.licencia_medica');
        Route::get('/download_certificado_bancaria/{diligencia}','SanofiRequestFormController@downloadCertificadoBancario')->name('genfar.certificado_bancaria');
        Route::get('/download_certificado_oea/{diligencia}','SanofiRequestFormController@downloadCertificadoOEA')->name('genfar.certificado_oea');
        Route::get('/download_certificado_laft/{diligencia}','SanofiRequestFormController@downloadCertificadoLAFT')->name('genfar.certificado_laft');
        Route::get('/download_certificado_iso/{diligencia}','SanofiRequestFormController@downloadCertificadoISO')->name('genfar.certificado_iso');
        Route::get('/download_certificado_politicas/{diligencia}','SanofiRequestFormController@downloadCertificadoPoliticas')->name('genfar.certificado_politicas');
        Route::get('/download_certificado_financiero/{diligencia}','SanofiRequestFormController@downloadCertificadoFinanciero')->name('genfar.certificado_financiero');
        Route::get('/download_certificado_comercial/{diligencia}','SanofiRequestFormController@downloadCertificadoComercial')->name('genfar.certificado_comercial');
        

    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users',        'UsersController')->except( ['create', 'store'] );
        Route::resource('roles',        'RolesController');
        Route::resource('login-log',        'CheckLoginController');
        
        Route::get('users_export', 'UsersController@export')->name('users.export');

        Route::resource('mail',        'MailController');
        Route::resource('countries',     'CountryController');
        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () { 
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });

    });
});