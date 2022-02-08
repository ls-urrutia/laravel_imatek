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
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Tecnico']);

        //crear permisos
        Permission::create(['name'=>'Ver dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'Ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name'=>'Ver roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Asignar roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Crear roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Eliminar roles'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'Ver lista de equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Ver equipo'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Crear equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Eliminar equipos'])->syncRoles([$role1]);

        Permission::create(['name'=>'Ver lista de mantenciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Ver mantención'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Crear mantención'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar mantención'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Eliminar mantención'])->syncRoles([$role1]);

        Permission::create(['name'=>'Ver lista de centros'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Ver centro'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Crear centros'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar centros'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Eliminar centros'])->syncRoles([$role1]);
        
        Permission::create(['name'=>'Ver lista de clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Ver cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Crear cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Eliminar cliente'])->syncRoles([$role1]);

        Permission::create(['name'=>'Ver usuario propio'])->syncRoles([$role1, $role2]);
        


        Permission::create(['name'=>'Crear articulos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Editar articulos'])->syncRoles([$role1]);
        
        
       
        

    }
}
