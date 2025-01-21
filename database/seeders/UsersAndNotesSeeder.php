<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\RoleHierarchy;
use App\Models\Status;

class UsersAndNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfUsers = 100;
        $numberOfNotes = 20;
        $usersIds = array();
        $statusIds = array();
        $statusUserIds = array();
        $faker = Faker::create();
        /* Create roles */

        $userRole = Role::create(['name' => 'admin']); 
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 1,
        ]);
        $userRole = Role::create(['name' => 'masterdata']);
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 2,
        ]);
        $userRole = Role::create(['name' => 'genfar']);
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 3,
        ]);
        $userRole = Role::create(['name' => 'eprovedores']);
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 4,
        ]);
        $userRole = Role::create(['name' => 'ethics']);
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 5,
        ]);
        $userRole = Role::create(['name' => 'risk']);
        RoleHierarchy::create([
            'role_id' => $userRole->id,
            'hierarchy' => 6,
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
/*------------------------  insert Users INIT   -------------------------------------------------------------------------*/

        $user = User::create(['name' => 'Eidy Natalia Orjuela Gonzalez', 'email' => 'analistanoticias16@riskconsultingcolombia.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 0,            'menuroles' => 'risk'        ]);
        
        $user->assignRole('risk');
        $user = User::create(['name' => 'Sara Sofia Cristancho', 'email' => 's.cristancho@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'risk,genfar'        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');

        $user = User::create(['name' => 'Katherine Lizeth Cardenas ', 'email' => 'analista.dda3@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'risk,genfar'        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');
                
        $user = User::create(['name' => 'Luis Antonio González ', 'email' => 'analista.investigacion@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'risk,genfar'        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');
        
        $user = User::create(['name' => 'Julie Carolina Albornoz', 'email' => 'analista.dda2@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 0,            'menuroles' => 'risk,genfar'        ]);
        $user->assignRole('genfar');
        $user->assignRole('risk');
        
        $user = User::create(['name' => 'Diego Alejandro Villalba ', 'email' => 'analista.dda1@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'risk,genfar'        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');

        $user = User::create(['name' => 'Michael A. Peñaloza', 'email' => 'analista.innovacion@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3STs'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'admin,genfar,ethics,masterdata,eprovedores,risk']);
        $user->assignRole('admin');
        $user->assignRole('risk');
        $user->assignRole('genfar');
        $user->assignRole('eprovedores');
        $user->assignRole('ethics');
        $user->assignRole('masterdata');
        
        
        $user = User::create(['name' => 'Daniela Bermudez', 'email' => 'analista.kyc2@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 2,            'is_sanofi' => 0,            'menuroles' => 'admin,risk,genfar'        ]);
        $user->assignRole('admin');
        $user->assignRole('risk');
        $user->assignRole('genfar');
        
        $user = User::create(['name' => 'Manuel Ortiz ', 'email' => 'm.ortiz@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'risk,genfar'        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');
            
        $user = User::create(['name' => 'María Camila Arredondo', 'email' => 'analista.kyc4@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'user'        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');
                               
        $user = User::create(['name' => 'Luisa Fernanda Sua Ramirez', 'email' => 'analista.kyc1@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'admin,risk,genfar'        ]);
        $user->assignRole('admin');
        $user->assignRole('risk');
        $user->assignRole('genfar');
        
        $user = User::create(['name' => 'Yuli Tatiana Pinto', 'email' => 'analista.kyc3@riskgc.com',            'email_verified_at' => now(),            'password' => Hash::make('R1$KC0NSULT1NGGT3ST'),            'remember_token' => Str::random(10),            'status_id' => 1,            'is_sanofi' => 1,            'menuroles' => 'admin,risk,genfar'        ]);
        $user->assignRole('admin');
        $user->assignRole('risk');
        $user->assignRole('genfar');
        
        /*User
        $user = User::create([ 
            'name' => 'user',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status_id' => 1,
            'is_sanofi' => 2,
            'menuroles' => 'user' 
        ]);
        
        
        //Semilla Usuarios Sanofi */

        $user = User::create(['name' => 'Maria Idalides Chavarriaga Gonzalez','email'=>'Idalides.Chavarriaga@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Miriam Judith Crespo Galvan','email'=>'Miriam.Crespo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juli Johana Alegria Paz','email'=>'July.Alegria@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gisel Beatriz Baron Valois','email'=>'Gisel.Baron@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ximena Rey Linares','email'=>'Ximena.Rey@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Eider Marino Fory Mina','email'=>'ForyMina.EiderMarino@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Hernan Dario Zambrano Delgado','email'=>'Hernan.Zambrano@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Alejandro Osorio Zuleta','email'=>'Alejandro.Osorio@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Mario Gutierrez Tuiran','email'=>'carlos-mario.gutierrez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paola Andrea Carmona Surmay','email'=>'Paola.Carmona@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'James Parra Jimenez','email'=>'James.Parra@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Daniel Patino Millan','email'=>'Daniel.Patino@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Humberto Bedoya Paez','email'=>'Carlos.Bedoya@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Alfredo Martinez Betancourt','email'=>'JoseAlfredo.Martinez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ricardo Ruiz Guapacha','email'=>'Ricardo.RuizGuapacha-ext@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sandra Liliana Gonzalez Moreno','email'=>'SandraLiliana.GonzalezMoreno@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sara Milena Posada Rojas','email'=>'SaraMilena.Posada@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Daniela Cobo Bolaños','email'=>'Daniela.Cobo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Daniela Jurado Martinez','email'=>'Daniela.Jurado@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Aztrid Achipiz Lopez','email'=>'Aztrid.AchipizAchipiz@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Diego Echeverri Ulloa','email'=>'JuanDiego.Echeverri@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Jose Alhajj Agualimpia','email'=>'Maria.AlhajjAgualimpia@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Nicolle Montero Gil','email'=>'Nicolle.MonteroGil@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paola Stephanie Aguilera Valencia','email'=>'Paola.Aguilera@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Eliana Cristina Benavides Lopez','email'=>'Eliana.BenavidesLopez-ext@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Roberto Carlos Hernandez Alvarez','email'=>'Roberto.HernandezAlvarez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Pablo Chaves Yela','email'=>'JUAN.CHAVES@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Deyver Garcia Pena','email'=>'JHON.GARCIA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Dennys Lisetd Suarez Diaz','email'=>'Dennys.Suarez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Arturo Betancourt Galindo','email'=>'Arturo.Betancourt@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Arturo Parra Buritica','email'=>'CARLOS.PARRA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julian Andres Garces Lucumi','email'=>'JULIAN.GARCES@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Oscar Eduardo Trujillo Guzman','email'=>'OSCAR.TRUJILLO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Orlando Carlo Villanueva Henao','email'=>'Orlando.Villanueva@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Anderson Torres Londono','email'=>'JHON.TORRES@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Fausto Andres Rodriguez Salazar','email'=>'FAUSTO.RODRIGUEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Aldemar Vega Ramirez','email'=>'ALDEMAR.VEGA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Mauricio Varona Pizo','email'=>'Mauricio.Varona@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Quintero Moncada','email'=>'Diego.Quintero@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Fernando Hoyos Samboni','email'=>'Luis.Hoyos2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julian Yahir Collazos Meneses','email'=>'Julian.Collazos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jordan Alexis Mina Uzuriaga','email'=>'Jordan.Mina@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Arturo Reina Mendoza','email'=>'Carlos.REINAMENDOZA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Camilo Diaz Giron','email'=>'JuanCamilo.DIAZGIRON@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhonn Jair Cardenas Ramirez','email'=>'JHON-JAIR.CARDENAS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paulo Cesar Ramirez Arango','email'=>'Paulo.RamirezArango@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Alberto Sánchez Manrique','email'=>'Carlos.Sanchez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Viviana Patricia Vergara Solano','email'=>'VIVIANA.VERGARA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Katherine Arcila Restrepo','email'=>'KATHERINE.ARCILA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diana Patricia Agudelo','email'=>'DIANA.AGUDELO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Liliana Lopez Silva','email'=>'LILIANA.LOPEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Monica Arboleda Gonzalez','email'=>'Monica.Arboleda@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Roberto Junior Perez Sandoval','email'=>'Roberto.PEREZSANDOVAL@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Kevin Tenorio Gomez','email'=>'Kevin.TenorioGomez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Andres Astaiza Saldarriaga','email'=>'Carlos.ASTAIZASALDARRIAGA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Karen Liceth Corrales Carmona','email'=>'KAREN.CORRALES@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Kelly Delgado Galvez','email'=>'Kelly.Delgado@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jorge Andres Jojoa Botina','email'=>'Jorge.Jojoa@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jaime Andres Oviedo Ordonez','email'=>'Jaime.Oviedo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alexander Pelaez Montoya','email'=>'ALEXANDER.PELAEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jairo Alonso Romero Mendoza','email'=>'JAIRO.ROMERO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jheynner Uzuriaga','email'=>'JHEYNNER.UZURIAGA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gabriel Mauricio Rodriguez Infante','email'=>'GabrielMauricio.Rodriguez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Giovanny Augusto Baquero Perea','email'=>'Giovanny.Baquero@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Victor Alfonso Aricapa Soto','email'=>'VICTOR.ARICAPA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Clara Suleimer Vargas Duran','email'=>'CLARA.VARGAS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Fernando Balcazar Valencia (On Leave)','email'=>'Luis.Balcazar2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Benjamin Cardona Rogdriguez','email'=>'BENJAMIN.CARDONA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Andres Cuellar Aviles','email'=>'DIEGO.CUELLAR@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Aldo Cesar Delgado Rodriguez','email'=>'ALDO.DELGADO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alex Mauricio Echeverry','email'=>'ALEX.ECHEVERRY@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Victor Hugo Zambrano Morales','email'=>'Victor.Zambrano@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andrey Anibal Alvarez Rivas','email'=>'Andrey.Alvarez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Alberto Angulo Estupiñan','email'=>'Diego.Angulo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Dayana Alexandra Posada Ocampo','email'=>'DAYANA.POSADA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Michael David Sanchez Patino','email'=>'MichaelDavid.Sanchez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julian Andres Florez Alvarez','email'=>'JULIAN.FLOREZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Mauricio Castano','email'=>'MAURICIO.CASTANO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jesus Alberto Becerra Marin','email'=>'JESUS.BECERRA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paul Cristian Varon Salazar','email'=>'Paul.Varon@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jorge Enrique Ferreroza Delgado (On Leave)','email'=>'JORGE.FERREROZA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Deiner Vidal Cobo (On Leave)','email'=>'DEINER.VIDAL@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Eduardo Leyton David','email'=>'DAVID.LEYTON@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Herman Danilo Henao Cardona','email'=>'Hernan.Henao@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Luis Gonzalez Dionisio','email'=>'JUANLUIS.GONZALEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Eduardo Lozano Cardozo','email'=>'LUIS.LOZANO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alvaro Gomez Nieto','email'=>'ALVARO.GOMEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Alberto Ledesma Chaves','email'=>'CARLOS.LEDESMA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Einer Orlando Zamora Hernandez','email'=>'EINER.ZAMORA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Wilson Aricapa Mapura','email'=>'WILSON.ARICAPA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jesus Antonio Burbano Fernandez','email'=>'JESUS.BURBANO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Fernando Campo Gomez','email'=>'Luis.Campo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Carlos Sandoval Damian','email'=>'JUAN.SANDOVAL@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Fanor Antonio Santana Becerra','email'=>'Fanor.Santana@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Rosmira Mercedes Chi Robles','email'=>'ROSMIRA.CHI@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Del Carmen Rodriguez Rodriguez','email'=>'Maria.Rodriguez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jairo Barco Mosquera (On Leave)','email'=>'JAIRO.BARCO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Antonio Rodriguez Barrera','email'=>'LUISANTONIO.RODRIGUEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Alberto Martinez Ortiz','email'=>'LUIS.MARTINEZ2@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Eloy Alfaro Ulchur','email'=>'JOSE.ALFARO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Fernando Robles Certuche','email'=>'ANDRES.ROBLES@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Armando Calvo Ladino','email'=>'ARMANDO.CALVO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Daniel Osorio Garzon','email'=>'JOSE.OSORIO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Harold Onofre Daza Galeano','email'=>'HAROLD.DAZA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Emis Guerrero Parra','email'=>'EMIS.GUERRERO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Martha Mosquera Macias','email'=>'MARTHA.MOSQUERA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Ingrid Parra Casanova','email'=>'Ingrid.Parra@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Blanca Dolly Nova Rivera','email'=>'Dolly.Nova@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Janeth Leon Montaño','email'=>'Janeth.Leon@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diana Gisela Nunez Delgado','email'=>'DIANA.NUNEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Damaris Castaño Barragan','email'=>'DAMARIS.CASTANO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Elizabeth Soto Perez','email'=>'ELIZABETH.SOTO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carolina Tavera Jaramillo','email'=>'CAROLINA.TAVERA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luz Amparo Lopez Mazo','email'=>'AMPARO.LOPEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Zulma Otilia Rodriguez Sanchez','email'=>'ZULMA.RODRIGUEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sandra Rocio Garcia Leyva','email'=>'SANDRA.GARCIA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Harold Wilson Collazos Ramirez','email'=>'HAROLD.COLLAZOS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Emilio Manuel Banquez Lores','email'=>'EMILIO.BLANQUEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ludwin Arbey Cortes Burgos','email'=>'Ludwin.Cortes2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Pablo Andres Valencia Jaramillo','email'=>'Pablo.Valencia@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Miller Dusley Cambindo Rivas','email'=>'MILLER.CAMBINDO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gerardo Tascon Alvarez','email'=>'GERARDO.TASCON@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julio Cesar Ninco Guapacha','email'=>'JULIO.NINCO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Rocio Aguirre Cuero','email'=>'Rocio.Aguirre@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Edinson Valencia Gallego','email'=>'DIEGO.VALENCIA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julian Andres Morales Montana','email'=>'JULIAN.MORALES@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'German Eulises Castaneda Rios','email'=>'GERMAN.CASTANEDA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Francisco Javier Baldovino Diaz','email'=>'FRANCISCO.BALDOVINO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jersson Jair Fajardo Cubillos','email'=>'Jerson.Fajardo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Giovanni Rodriguez Albear','email'=>'GIOVANNI.RODRIGUEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Cesar Mejia','email'=>'CARLOS.MEJIA3@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Eduardo Garcia Pineda','email'=>'LUIS.GARCIA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Hector Pablo Barajas Velandia','email'=>'HECTOR.BARAJAS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Nilo Ademir Coral Escobar','email'=>'NILO.CORAL@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alfredo Cuenca Saldana','email'=>'ALFREDO.CUENCA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Mario Alberto Vasquez Ayala','email'=>'MarioAlberto.Vasquez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Oscar Eduardo Noguera Gonzalez','email'=>'OSCAR.NOGUERA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Manuel Alejandro Betancourth Cortez','email'=>'MANUEL.BETANCOURTH@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jair Carvajal Apolindar (On Leave)','email'=>'JAIR.CARVAJAL@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Oscar Julian Ballesteros Rivas','email'=>'OSCAR.BALLESTEROS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Fernando Lopez Trujillo (On Leave)','email'=>'JOSEFERNANDO.LOPEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Javier Andres Capote Medina','email'=>'Javier.Capote@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jaime Hernan Salas Pamo (On Leave)','email'=>'JAIME.SALAS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Daniel Leonardo Uribe Martinez','email'=>'Daniel.Uribe@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Angela Mercedes Quiñones Bautista','email'=>'Angela.Quinones2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yenny Angelica Saavedra Barrero','email'=>'Yenny.Saavedra@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'German Londono','email'=>'GERMAN.LONDONO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Fabian Salazar Llanos','email'=>'DIEGO.SALAZAR@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Hector Fabio Amezquita Quiceno','email'=>'Hector.Amezquita@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Hernan Alberto Bedoya Estrada','email'=>'Hernan.Bedoya@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Viviana Mosquera Gallego','email'=>'Viviana.Mosquera@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ivan Marino Gaviria Chavez','email'=>'IVANMARINO.GAVIRIA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jovanni Correa Lozano (On Leave)','email'=>'JOVANNI.CORREA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Sanchez Millan','email'=>'Jhon.Sanchez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'John Michael Trivino Viera','email'=>'JHON.TRIVINO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luz Adriana Arango Medina','email'=>'Adriana.Arango@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Edinson Alberto Yacue','email'=>'EDINSON.YACUE@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julian Enrique Chate Ausecha','email'=>'JULIAN.CHATE@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Fabio Nelson Romero Paredes','email'=>'FABIO.ROMERO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carolina Orozco Naranjo','email'=>'CAROLINA.OROZCONARANJO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Fernando Quintero Castro','email'=>'Luis.Quintero@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Efrain Rojas Cardona','email'=>'Jose.Rojas@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Rodrigo Rodriguez','email'=>'Rodrigo.Rodriguez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Oliver Salazar Vidal','email'=>'Oliver.Salazar@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Henry Jose Serrano Orozco','email'=>'Henry.Serrano@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luz Mary Rodriguez','email'=>'LuzMary.Rodriguez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Mendes Casasbuenas','email'=>'Luis.Mendes@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alexander Valencia','email'=>'Alexander.Valencia2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jonathan Daniel Campo Mondragón','email'=>'Jonathan.Campo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Fernando Burbano Camayo','email'=>'Andres.Burbano@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Leonardo Henao Muñoz','email'=>'Leonardo.Henao2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Jairo Valencia Arroyo','email'=>'Jhon.VALENCIAARROYO@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ivan Ricardo Rosas Caicedo','email'=>'Ivan.ROSASCAICEDO@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Fernando Figueroa Giron','email'=>'Diego.FigueroaGiron@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Harold Aner Loaiza Perlaza','email'=>'Harold.LOAIZAPERLAZA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Hugo Ferney Trujullo Calderon','email'=>'Hugo.Trujillo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Robert Stick Salcedo Ortiz','email'=>'Robert.SalcedoOrtiz@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Walter Enrique Bayona','email'=>'Walter.Bayona@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhonatan Alexander Serna Botello','email'=>'Jhonatan.Serna@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Manuel Felipe Salinas Narvaez','email'=>'Manuel.SalinasNarvaez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sandra Milena Osorio Franco','email'=>'Sandra.Osorio@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhan Carlos Goez Quintana','email'=>'Jhan.Goez-ext@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Javier Alexander Rubio Beltran','email'=>'Alexander.RubioB@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Victor Alfonso Caracas Moreno','email'=>'VICTORALFONSO.Caracas@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Felipe Castillo Casalla','email'=>'AndresFelipe.Castillo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Johnatan Andres Rojas Galvis','email'=>'Johnatan.ROJASGALVIS@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paola Andrea Martinez Galvis','email'=>'PaolaAndrea.Martinez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Martha Patricia Prieto Rodriguez','email'=>'Martha.Prieto@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sara Yusely Uruena Torres','email'=>'SARA.URUENA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jaime Enrique Caicedo Landazabal','email'=>'JAIME.CAICEDO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jorge Luis Nieto Solipa','email'=>'JORGE-LUIS.NIETO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Edgar Wilder Murillo Ramirez','email'=>'WILDER.MURILLO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Francy Soraya Luengas Olave','email'=>'FRANCY.LUENGAS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Fanny De La Cruz Garcia','email'=>'FANNY.DELACRUZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jairo Olaya Conde','email'=>'JAIRO.OLAYA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paola Andrea Achipiz Jimenez','email'=>'Paola.Achipiz@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ana Celina Angel Estepa','email'=>'ANACELINA.ANGEL@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Leonardo Cordoba','email'=>'Leonardo.Cordoba@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alfonso Vega Jimenez','email'=>'Alfonso.Vega@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Angelica Paola Tovar Jimenez','email'=>'Angelica.Tovar@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jenny Andrea Lopez Montoya','email'=>'Jenny.LopezMontoya@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Cindy Paola Tarra Batista','email'=>'Cindy.Tarra@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Deicy  Katherine Bohórquez  Graterón','email'=>'Deicy.Bohorquez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Laura Delgado Mancilla','email'=>'LauraMarcela.Delgado@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Laura Victoria Franco Walker','email'=>'LauraVictoria.Franco@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carolina Sánchez Ararat (On Leave)','email'=>'Carolina.Sanchez2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Camila Cardona Restrepo','email'=>'Camila.Cardona@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Cindy Marcela Rivera Bazan','email'=>'Cindy.Rivera@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Alejandra Velasco Chacon (On Leave)','email'=>'MariaAlejandra.Velasco@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Alberto Fragozo Muegues','email'=>'Carlos.Fragozo2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Felipe Mendez Villaquiran','email'=>'Andres.Mendez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Carlos Santa Culma','email'=>'Juan.Santa@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Daniela Mejia Henao','email'=>'Daniela.Mejia@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Estefania Troches Mafla','email'=>'Estefania.TrochesMafla@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Lorena Quevedo Guzman','email'=>'Lorena.Quevedo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luisa Fernanda Santa Franco','email'=>'Luisa.Santa@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Nicolas Larrahondo Tengano','email'=>'Nicolas.LARRAHONDOTENGANO@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yulian Arley Montaño Solis','email'=>'Yulian.MONTANOSOLIS@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Dayan Burbano Tabares','email'=>'Dayan.BURBANOTABARES@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yuber Andres Castano Lopez','email'=>'Yuber.CASTANOLOPEZ@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sigrid Esperanza Borja Paez','email'=>'SigridEsperanza.BorjaPaez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julieth Andrea Marulanda Durango','email'=>'Julieth.MarulandaDurango@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Marilin Sandoval Larrahondo','email'=>'Marilin.SandovalLarrahondo2-ext@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Blakk Roberts Ortiz Silva','email'=>'BlakkRoberts.Ortiz@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Edison Ortiz Torres','email'=>'Jhon.ORTIZTORRES@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Alberto Rivera Nene','email'=>'CARLOS.RIVERA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'John Jair Rodriguez Arce','email'=>'JHON.RODRIGUEZ@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Felipe Abello Guevara','email'=>'ANDRES-FELIPE.ABELLO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Jairo Rengifo Noguera','email'=>'JHON-JAIRO.RENGIFO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jhon Fernando Valencia Ibarra','email'=>'jhon-fernando.valencia@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Fernando Zapata Grajales','email'=>'FERNANDO.ZAPATA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Gonzalo Sinisterra Rosero','email'=>'GONZALO.SINISTERRA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alberto Rios Ramirez','email'=>'ALBERTO.RIOS@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Felipe Diaz Pena','email'=>'Andres.Diaz2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Julian Riascos Enriquez','email'=>'Julian.Riascos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Raul Alberto Bermudez Mejia','email'=>'Raul.Bermudez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jonathan Stevens Gonzalez Medina','email'=>'Jonathan.Gonzalez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Antonio Gamboa Bonilla','email'=>'Antonio.GAMBOABONILLA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Joan Sebastian Garcia Perea','email'=>'Joan.GarciaPerea@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Sebastian Cardona Castillo','email'=>'JuanSebastian.CARDONACASTILLO@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Cesar Augusto Orozco Guevara','email'=>'Cesar.Orozco@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Roger Vanegas Casierra','email'=>'Roger.VANEGASCASIERRA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Isabel Jaramillo Muñoz','email'=>'MariaIsabel.JARAMILLOMUNOZ@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Hoffman Olaya Espinosa','email'=>'Hoffman.Olaya@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alex Fernando Andrade Jimenez','email'=>'alex-fernando.andrade@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alexandra Maria Vega Luengas','email'=>'alexandra.vega@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Alirio Vega Martinez','email'=>'ALIRIO.VEGA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ana Maria Fernandez Palomino','email'=>'AnaMaria.Fernandez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ana Milena Torres Villalobos','email'=>'ana.torresvillalobos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carolina Angarita Mendoza','email'=>'Carolina.ANGARITAMENDOZA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Christian Camilo Vasquez Rodriguez','email'=>'Cristian.Vasquez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jorge Alonso Cortés Ruiz','email'=>'Jorge.Cortes@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Daniel Contreras Moratto','email'=>'Daniel.Contreras@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'David Julian Medina Pulido','email'=>'DAVID.MEDINA@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Deifan Ramirez Lopez','email'=>'deifan.ramirez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Didier Alarcon Jaramillo','email'=>'didier.alarcon@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Diego Javier Barrios Torrejano','email'=>'Diego.Barrios-ext@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Edgard Armando Rivera Vera','email'=>'Edgard.RIVERAVERA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gina Cristina Moreno Cruz','email'=>'Gina.Moreno@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Felipe Concha Zuluaga','email'=>'JafetFelipe.CONCHAZULUAGA@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jedaia Lizzeth Roa Mendez','email'=>'Jedaia.Roa@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Johan Sebastian Ortiz Hermida','email'=>'JohanSebastian.Ortiz@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'John Rosenberg Donenfeld','email'=>'John.Rosenberg@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Felipe Quintero Camacho','email'=>'Juan.Quintero@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Carlos Ferro Bolaños (On Leave)','email'=>'Juan.Ferro@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Manuel Pena Abondano','email'=>'juanmanuel.pena@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Liliana Andrea Suarez Correa','email'=>'liliana.suarez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Loren Nieto Trujillo','email'=>'Loren.Nieto@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Eduardo Arellano Sanchez','email'=>'luis.arellano@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Luis Gabriel Borda Angel','email'=>'luis.borda@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Fernanda Leon Vargas','email'=>'MariaFernanda.LeonVargas@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Isabel Hio Santacruz','email'=>'MARIAISABEL.HIO@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Maria Marleny Rodriguez Mendoza','email'=>'MariaMarleny.Rodriguez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Milena Rocio Perez Guzman','email'=>'Milena.Perez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Monica Tatiana Galan Delgado','email'=>'Monica.Galan@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Nancy Eliana Pinzon Sabogal','email'=>'Nancy.Pinzon@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Nidia Mercedes Forero Aldana','email'=>'Nidia.Forero@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Oscar Javier Sanabria Cortes','email'=>'Oscar.SanabriaCortes@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sergio Andres Rodriguez Melo','email'=>'sergio.rodriguezmelo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Stefanny Rojas Quiroz','email'=>'stefanny.rojas@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Willian Fernando Cabrera Jimenez','email'=>'William.Cabrera@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yadi Carolina Escobar Alzate','email'=>'CAROLINA.ESCOBAR@SANOFI.COM','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yessika Tatiana Varon Villamil','email'=>'Tatiana.Varon@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Erick Araujo','email'=>'Erik.Araujo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Narcisa Campos Rivadeneira','email'=>'Narcisa.Campos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Cesar Baldeon','email'=>'Cesar.Baldeon@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sandra Freire Moran','email'=>'Sandra.Freire@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Giselle Ivette Vera Burgos','email'=>'Giselle.Vera@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Santiago Pogo','email'=>'Santiago.Pogo@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar,ethics' ]); $user->assignRole('genfar');$user->assignRole('ethics');
        $user = User::create(['name' => 'Daniela Martinez Silva','email'=>'daniela.martinezsilva@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar,ethics' ]); $user->assignRole('genfar');$user->assignRole('ethics');
        $user = User::create(['name' => 'Johana Mendoza Guarderas','email'=>'Johana.Mendoza@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'admin,masterdata,genfar' ]); 
        $user->assignRole('admin');
        $user->assignRole('genfar');
        $user->assignRole('masterdata');
        $user = User::create(['name' => 'Catherine Ramirez','email'=>'catherine.ramirez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar,eprovedores' ]); $user->assignRole('genfar');$user->assignRole('eprovedores');
        $user = User::create(['name' => 'Catalina Noemi Moran Campuzano','email'=>'Catalina.Moran@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andrés Vallecilla','email'=>'Andres.Vallecilla@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gerson Yagual Bravo','email'=>'Gerson.Yagual@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gilberth Eduardo Alvarez Andrade','email'=>'Gilberth.Alvarez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Ingry Bustos Gonzalez','email'=>'Ingry.Bustos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Patricio Rojas Gonzalez','email'=>'Jose.Rojas2@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Pedro Andres Cantos Padilla','email'=>'Pedro.Cantos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Reinaldo Enrique Salazar Perez','email'=>'Reinaldo.Salazar@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Zaira Cano Bedor','email'=>'Zaira.Cano@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Geovanna Espinoza Ramirez','email'=>'Geovanna.Espinoza@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Esther Maria Juarez Tinta','email'=>'Esther.Juarez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Favio Escalante Paredes','email'=>'Favio.Escalante@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Jose Alfredo Oporto Mendivil','email'=>'Jose.Oporto@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Lourdes Giuliana Colina Huaman','email'=>'Lourdes.Colina@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yuri Garcia','email'=>'Yuri.GarciaV@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Moises Luis Romero Vera','email'=>'Moises.Romero@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Sandra Irey Salgado','email'=>'Sandra.Irey@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Francisco Reyes','email'=>'Francisco.Reyes@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Arturo Lopez Ramirez','email'=>'Arturo.LOPEZRAMIREZ@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yovanna Velasquez','email'=>'yovanna.Velasquez@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paola Luciana Obando Casas (On Leave)','email'=>'Paola.Obando@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Amparito Lizarzaburu','email'=>'Amparito.Lizarzaburu@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Eduardo Guzmán Galvez','email'=>'Eduardo.GUZMANGALVEZ@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Lucy Yessenia Garamende Zeballos','email'=>'Lucy.GARAMENDEZEBALLOS@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Paola Vanessa Carrera Cisneros','email'=>'Paola.Carrera@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Andres Schwarz','email'=>'Andres.Schwarz@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Christian Armando Celis Valdivia','email'=>'Christian.Celis@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Yanina Palomino','email'=>'Yanina.Palomino@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Francisco Toralva Hernandez','email'=>'Juan.Toralva@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Renato Campos','email'=>'Renato.Campos@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Estela Del Socorro Ontaneda Neyra','email'=>'Estela.Ontaneda@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Patricia Amancio','email'=>'Carmen.Amancio@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Carlos Guidotti','email'=>'Carlos.Guidotti@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Manuel Garcia','email'=>'Manuel.Garcia@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Marco Antonio Sevilla Alfaro','email'=>'Marco.Sevilla@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Miluska Flores','email'=>'Miluska.Flores@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Victor Hugo Rivas Paico','email'=>'VictorHugo.Rivas@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Gladys Moscoso','email'=>'Gladis.Moscoso@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');
        $user = User::create(['name' => 'Juan Carlos Tafur','email'=>'juancarlos.tafur@sanofi.com','email_verified_at' => now(), 'password' => Hash::make('G3NF4R2023R1SK'), 'remember_token' => Str::random(10), 'status_id' => 1, 'is_sanofi' => 1, 'menuroles' => 'genfar' ]); $user->assignRole('genfar');


        


    
    /*
        $user = User::create([
           'name' => 'Adenir Cardozo',
            'email' => 'Adenir.Cardozo@sanofi.com',
            'email_verified_at' => now(),
            'password' => Hash::make('G3NF4R2023R1SK'),
            'remember_token' => Str::random(10),
            'status_id' => 1,
            'is_sanofi' => 1,
            'menuroles' => 'genfar' 
        ]); 
        //
        $user->assignRole('genfar');

        $user = User::create([
            'name' => 'Médico General',
            'email' => 'medicogeneral@sanofi.com',
            'email_verified_at' => now(),
            'password' => Hash::make('G3NF4R2023R1SK'),
            'remember_token' => Str::random(10),
            'status_id' => 1,
            'is_sanofi' => 1,
            'menuroles' => 'risk,genfar' 
        ]);
        $user->assignRole('risk');
        $user->assignRole('genfar');

        $user = User::create([
            'name' => 'Usuario Sanofi',
            'email' => 'usuario@sanofi.com',
            'email_verified_at' => now(),
            'password' => Hash::make('G3NF4R2023R1SK'),
            'remember_token' => Str::random(10),
            'status_id' => 1,
            'is_sanofi' => 1,
            'menuroles' => 'genfar' 
        ]);
        $user->assignRole('genfar');

        
        
        for($i = 0; $i<$numberOfUsers; $i++){
            $user = User::create([ 
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'status_id' => 2,
                'is_sanofi' => 1,
                'menuroles' => 'user'
            ]);
            $user->assignRole('genfar');
            array_push($usersIds, $user->id);
        }*/
        /*  insert notes  
        for($i = 0; $i<$numberOfNotes; $i++){
            $noteType = $faker->word();
            if(random_int(0,1)){
                $noteType .= ' ' . $faker->word();
            }
            DB::table('notes')->insert([
                'title'         => $faker->sentence(4,true),
                'content'       => $faker->paragraph(3,true),
                'status_id'     => $statusIds[random_int(0,count($statusIds) - 1)],
                'note_type'     => $noteType,
                'applies_to_date' => $faker->date(),
                'users_id'      => $usersIds[random_int(0,$numberOfUsers-1)]
            ]);
        }

        */
    }
}