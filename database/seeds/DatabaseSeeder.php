<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('¿Desea actualizar la migración antes de la siembra, seguro de que borrará todos los datos antiguos?')) {
            $this->command->call('migrate:refresh');
            /*$this->command->call('passport:install', [
                                    '--force' => true,
                                ]);*/

            $this->command->warn("Datos borrados, comenzando desde la nueva base de datos.");

            if ($this->command->confirm('¿Desea insertar los datos por default?')) {

            	$this->createPermissionsAndRole();
            }
        }
    }

    private function createPermissionsAndRole() {

        //permission roles
        $data = array(
            'name' => 'Roles'
        );

        $PermissionRole = Permission::create($data);
        $this->command->info('Se agrego el permiso de roles');

        //permission permisos
        $data = array(
            'name' => 'Permisos'
        );
        $PermissionPermission = Permission::create($data)->id;
        $this->command->info('Se agrego el permiso de permisos');

        //permission usuarios
        $data = array(
            'name' => 'Usuarios'
        );
        $PermissionUser = Permission::create($data)->id;
        $this->command->info('Se agrego el permiso de usuarios');


        //roles admin
        $data = array(
            'name' => 'Administración'
        );
        $RoleSuperAdmin = Role::create($data);
        $this->command->info('Se agrego el rol admin');

        //roles admin
        $data = array(
            'name' => 'Control Escolar'
        );
        Role::create($data);

        //roles admin
        $data = array(
            'name' => 'Caja'
        );
        Role::create($data);

        //roles admin
        $data = array(
            'name' => 'Operación'
        );
        Role::create($data);

        //roles admin
        $data = array(
            'name' => 'Alumno'
        );
        Role::create($data);

        //usuario default
        $data = array(
            'name' => 'Gad',
            'email' => 'garenas@sysware.com.mx',
            'password' => bcrypt('Sysware2016')
        );

        $user = User::create($data);
        $this->command->info('Se agrego el usuario');

        $user->assignRole($RoleSuperAdmin->name);
        $this->command->info('Se le asigna el rol super administrador');
     }
}
