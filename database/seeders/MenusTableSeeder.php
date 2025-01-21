<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    private $menuId = null;
    private $dropdownId = array();
    private $dropdown = false;
    private $sequence = 1;
    private $joinData = array();

    private $adminRole = null;
    private $masterdataRole = null;
    private $genfarRole = null;
    private $userRole = null;
    private $ethicsRole = null;
    private $eprovedoresRole = null;
    private $subFolder = '';

    public function join($roles,$menusId){
        $roles = explode(',',$roles);
        foreach($roles as $role){
            array_push($this->joinData,array('role_name' => $role,'menus_id' => $menusId));
        }
    }

    /*
        Function assigns menu elements to roles
        Must by use on end of this seeder
    */
    public function joinAllByTransaction(){
        DB::beginTransaction();
        foreach($this->joinData as $data){
            DB::table('menu_role')->insert([
                'role_name' => $data['role_name'],
                'menus_id' => $data['menus_id'],
            ]);
        }
        DB::commit();
    }

    public function insertLink($roles,$name,$href,$icon = null){
        $href = $this->subFolder . $href;
        if($this->dropdown === false){
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'sequence' => $this->sequence
            ]);
        }else{
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'parent_id' => $this->dropdownId[count($this->dropdownId) - 1],
                'sequence' => $this->sequence
            ]);
        }

        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles,$lastId);
        $permission = Permission::where('name','=',$name)->get();
       
        if(empty($permission)){
            $permission = Permission::create(['name' => 'visit ' . $name]);
        }
        $roles = explode(',',$roles);
        
        if(in_array('masterdata',$roles)){
            $this->masterdataRole->givePermissionTo($permission);
        }
        if(in_array('eprovedores',$roles)){
            $this->eprovedoresRole->givePermissionTo($permission);
        }
        if(in_array('admin',$roles)){
            $this->adminRole->givePermissionTo($permission);
        }
        if(in_array('genfar',$roles)){
            $this->genfarRole->givePermissionTo($permission);
        }
        if(in_array('ethics',$roles)){
            $this->ethicsRole->givePermissionTo($permission);
        }
        return $lastId;
    }

    public function insertTitle($roles,$name){
        DB::table('menus')->insert([
            'slug' => 'title',
            'name' => $name,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence
        ]);
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles,$lastId);
        return $lastId;
    }

    public function beginDropdown($roles,$name,$icon = ''){
        if(count($this->dropdownId)){
            $parentId = $this->dropdownId[count($this->dropdownId) - 1];
        }else{
            $parentId = null;
        }
        DB::table('menus')->insert([
            'slug' => 'dropdown',
            'name' => $name,
            'icon' => $icon,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence,
            'parent_id' => $parentId
        ]);
        $lastId = DB::getPdo()->lastInsertId();
        array_push($this->dropdownId,$lastId);
        $this->dropdown = true;
        $this->sequence++;
        $this->join($roles,$lastId);
        return $lastId;
    }

    public function endDropdown(){
        $this->dropdown = false;
        array_pop( $this->dropdownId );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        /* Get roles */
        $this->adminRole = Role::where('name' ,'=' ,'admin' )->first();
        $this->masterdataRole = Role::where('name','=','masterdata' )->first();
        $this->genfarRole = Role::where('name','=','genfar' )->first();
        $this->ethicsRole = Role::where('name','=','ethics' )->first();
        $this->eprovedoresRole = Role::where('name','=','eprovedores' )->first();

        /* Create Sidebar menu */
        DB::table('menulist')->insert([
            'name' => 'sidebar menu'
        ]);

        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $this->insertLink('admin','Inicio','/','cil-life-ring');
        $this->beginDropdown('admin','Settings','cil-calculator');
            $this->insertLink('admin','-- Usuarios','#');
            $this->insertLink('admin','Lista de Usuarios','/users');
            $this->insertLink('admin','Log de Ingreso Usuarios','/login-log');
            $this->insertLink('admin','Registrar Usuario','/register','cil-account-logout');
            $this->insertLink('admin','Editar Rol',             '/roles');
            $this->insertLink('admin','Festivos','/festives');
            $this->insertLink('admin','-- Otros','#');
            $this->insertLink('admin,genfar','Notes','/notes');
            $this->insertLink('admin','Edit menu',              '/menu/menu');
            $this->insertLink('admin','Edit menu elements',     '/menu/element');
            $this->insertLink('admin','Media','/media');
            $this->insertLink('admin','BREAD','/bread');
            $this->insertLink('admin','Email','/mail');
        $this->endDropdown();
        $this->beginDropdown('admin','Paises','cil-globe-alt');
            $this->insertLink('admin','Lista de Paises','/countries');
        $this->endDropdown();
        $this->insertLink('guest','Login','/login','cil-account-logout');

        $this->beginDropdown('genfar,admin','Genfar','cil-graph');
            $this->insertLink('genfar,admin','Solicitud de Homologación','/genfar-request-risk');
            $this->insertLink('sanofi,user,admin', 'Lista de Beneficiarios Finales', '/beneficial-ownership');
            $this->insertLink('genfar,admin','Homologaciones Sanofi(2021-2023)','/sanofi-old/');
            $this->insertLink('genfar,admin','Homologaciones Risk International (2018-2021)','/genfar-old/');
            $this->insertLink('genfar,admin','Buscador de Solicitudes','/genfar-search/');
            $this->insertLink('genfar,admin','Lista de Usuarios','/users');
            $this->insertLink('genfar,admin','Ir a Sherlock','https://sherlockapp.datalaft.com:2245/Formularios/Sitio/NuevoLogin.aspx');
        $this->endDropdown();
        $this->beginDropdown('genfar,admin','E PROVEEDORES','cil-settings');
            $this->insertLink('genfar,admin','Lista tareas E PROVEEDORES','/genfar-supliers');
            $this->insertLink('admin,eprovedores,masterdata','Tareas Pendientes','/genfar-supliers-pending');
        $this->endDropdown();
        
        $this->beginDropdown('genfar,admin','Clientes','cil-settings');
            $this->insertLink('genfar,admin','Lista Clientes','/genfar-request-clients');
        $this->endDropdown();
        
        $this->beginDropdown('genfar,admin','Formulario Genfar','cil-settings');
            $this->insertLink('genfar,admin','Lista HACATS','/hacats');
            $this->insertLink('genfar,admin','Lista Formulario Proveedores','/genfar/index');
            $this->insertLink('genfar,admin','Sociedades','/genfar-society');
            $this->insertLink('genfar,admin','Países De Homologación','/genfar-homologation-country');
            $this->insertLink('genfar,admin','Tipos De Homologación','/genfar-homologation-type');
            $this->insertLink('genfar,admin','Especialidades Médicas','/genfar-medical-especiality');
            $this->insertLink('genfar,admin','Grados Académicos','/genfar-academic-degree');
            $this->insertLink('genfar,admin','Posiciones Académicas','/genfar-academic-position');
            $this->insertLink('genfar,admin','Miembro de Sociedades','/genfar-memeber-society');
            $this->insertLink('genfar,admin','Miembro de Investigaciones','/genfar-memeber-investigator');
            $this->insertLink('genfar,admin','Pregunta Publicaciones','/genfar-has-publication');
            $this->insertLink('genfar,admin','Pregunta Libros','/genfar-has-book');
            $this->insertLink('genfar,admin','Pregunta Conferencias','/genfar-has-conference');
            $this->insertLink('genfar,admin','Pregunta Posters','/genfar-has-poster');
            $this->insertLink('genfar,admin','Pregunta Premios','/genfar-has-award');
        $this->endDropdown();
        
        /* Create top menu */
        DB::table('menulist')->insert([
            'name' => 'top menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        /*
            $this->beginDropdown('guest,admin','Pages');
            $id = $this->insertLink('guest,admin','Dashboard',   '/');
            $id = $this->insertLink('admin','Users','/users');
            $this->endDropdown();
            $id = $this->beginDropdown('admin','Settings');
            $id = $this->insertLink('admin','Edit menu',              '/menu/menu');
            $id = $this->insertLink('admin','Edit menu elements',     '/menu/element');
            $id = $this->insertLink('admin','Edit roles',             '/roles');
            $id = $this->insertLink('admin','Media','/media');
            $id = $this->insertLink('admin','BREAD','/bread');
            $this->endDropdown();
        */

        $this->joinAllByTransaction(); ///   <===== Must by use on end of this seeder
    }
}
