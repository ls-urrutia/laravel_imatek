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
        //crear roles
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Tecnico']);

        //crear permisos
        Permission::create(['name'=>'Ver dashboard'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Crear articulos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar articulos'])->syncRoles([$role1]);
        
        
       
        

    }
}
