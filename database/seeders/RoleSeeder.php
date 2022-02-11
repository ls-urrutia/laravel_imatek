<?php

namespace Database\Seeders;

use App\Models\Centro;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        User::create([
            'name' => 'Super Administrador',
            'email' => 'admin@admin.cl',
            'password' => bcrypt('administrador')

        ])->assignRole('Administrador');


        Cliente::create([
            'id_cliente' => '1',
            'nombre_empresa' => 'Imatek',
            'rut_empresa' => '7777777-7',
            'descripcion' => 'Imatek'
        ]);


        Centro::create([
            'id_centro' => '1',
            'nombre_centro' => 'Oficina',
            'telefono_empresa' => '+3234232',
            'descripcion' => 'centro oficina de Imatek',
            'id_cliente' => 1
        ]);





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
        Permission::create(['name'=>'Editar mantenciones'])->syncRoles([$role1, $role2]);
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
