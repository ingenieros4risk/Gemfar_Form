<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\RoleHierarchy;
use App\Models\User;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersIds = array();
        $statusIds = array();
        $statusUserIds = array();
        /* Create roles */
        $adminRole = Role::create(['name' => 'admin']); 
        RoleHierarchy::create([
            'role_id' => $adminRole->id,
            'hierarchy' => 1,
        ]);
        $masterdataRole = Role::create(['name' => 'masterdata']);
        RoleHierarchy::create([
            'role_id' => $masterdataRole->id,
            'hierarchy' => 2,
        ]);
        $genfarRole = Role::create(['name' => 'genfar']);
        RoleHierarchy::create([
            'role_id' => $genfarRole->id,
            'hierarchy' => 3,
        ]);
        $eproveedoresRole = Role::create(['name' => 'eprovedores']);
        RoleHierarchy::create([
            'role_id' => $eproveedoresRole->id,
            'hierarchy' => 4,
        ]);
        $ethicsRole = Role::create(['name' => 'ethics']);
        RoleHierarchy::create([
            'role_id' => $ethicsRole ->id,
            'hierarchy' => 5,
        ]);

        $sarlaftRole = Role::create(['name' => 'sarlaft']);
        RoleHierarchy::create([
            'role_id' => $sarlaftRole ->id,
            'hierarchy' => 6,
        ]);

        $hysRole = Role::create(['name' => 'hys']);
        RoleHierarchy::create([
            'role_id' => $hysRole ->id,
            'hierarchy' => 7,
        ]);

        $envRole = Role::create(['name' => 'env']);
        RoleHierarchy::create([
            'role_id' => $envRole ->id,
            'hierarchy' => 8,
        ]);

        $csrRole = Role::create(['name' => 'csr']);
        RoleHierarchy::create([
            'role_id' => $csrRole ->id,
            'hierarchy' => 9,
        ]);

        $csyRole = Role::create(['name' => 'csy']);
        RoleHierarchy::create([
            'role_id' => $csyRole ->id,
            'hierarchy' => 10,
        ]);

        $userRole = Role::create(['name' => 'risk']);
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 11,
        ]);


        /*------------------------  insert Status -------------------------------------------------------------------------*/        

        DB::table('status')->insert([
            'name' => 'ongoing',
            'class' => 'badge badge-pill badge-primary',
        ]);
        array_push($statusIds, DB::getPdo()->lastInsertId());
        DB::table('status')->insert([
            'name' => 'stopped',
            'class' => 'badge badge-pill badge-secondary',
        ]);
        array_push($statusIds, DB::getPdo()->lastInsertId());
        DB::table('status')->insert([
            'name' => 'completed',
            'class' => 'badge badge-pill badge-success',
        ]);
        array_push($statusIds, DB::getPdo()->lastInsertId());
        DB::table('status')->insert([
            'name' => 'expired',
            'class' => 'badge badge-pill badge-warning',
        ]);
        array_push($statusIds, DB::getPdo()->lastInsertId());

        /*  inser user statuses*/
        DB::table('user_statuses')->insert([
            'name' => 'activo',
            'class' => 'badge badge-pill badge-success',
        ]);
        array_push($statusUserIds, DB::getPdo()->lastInsertId());

        DB::table('user_statuses')->insert([
            'name' => 'inactivo',
            'class' => 'badge badge-pill badge-error',
        ]);
        array_push($statusUserIds, DB::getPdo()->lastInsertId());

        
        $users = User::all();

        foreach ($users as $user) {

            $roles = explode(',', $user->menuroles);
            if(in_array('admin', $roles)){  $user->assignRole('admin');}
            if(in_array('masterdata', $roles)){  $user->assignRole('masterdata');}
            if(in_array('genfar', $roles)){  $user->assignRole('genfar');}
            if(in_array('eprovedores', $roles)){  $user->assignRole('eprovedores');}
            if(in_array('ethics', $roles)){  $user->assignRole('ethics');}
            if(in_array('sarlaft', $roles)){  $user->assignRole('sarlaft');}
            if(in_array('hys', $roles)){  $user->assignRole('hys');}
            if(in_array('env', $roles)){  $user->assignRole('env');}
            if(in_array('csr', $roles)){  $user->assignRole('csr');}
            if(in_array('csy', $roles)){  $user->assignRole('csy');}    
            if(in_array('risk', $roles)){  $user->assignRole('risk');}

        }

    }
}