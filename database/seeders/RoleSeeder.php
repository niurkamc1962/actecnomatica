<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperAdmin']);                        //Permiso para administrar el Proyecto completo
        $role2 = Role::create(['name' => 'Admin']);                             //Permiso para administrar
        $role3 = Role::create(['name' => 'Usuarios']);                          //Role que identifica usuarios registrados
        $role4 = Role::create(['name' => 'Clientes']);                          //role que identifica que ya es cliente

        //Creando los permisos
        Permission::create(['name' => 'admin.home','description' => 'Administrar Proyecto PKI'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles','description' => 'Administrar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categoriaspki','description' => 'Administrar Categorias PKI'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.datospki','description' => 'Administrar datos PKI'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users','description' => 'Administrar Informacion, usuarios, clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'solicitud.servicio','description' => 'Usuario pendiente aprobacion solicitud'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'contratacion.servicio','description' => 'Cliente PKI aprobada solicitud'])->syncRoles([$role1, $role2, $role3, $role4]);

        //Permission::create(['name' => 'admin.home','description' => 'Administrar Proyecto Completo'])->syncRoles([$role1]);
        /*Permission::create(['name' => 'admin.users.index','description' => 'Crear Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Editar Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.update','description' => 'Actualizar Usuarios'])->syncRoles([$role1, $role2]);*/

    }
}
