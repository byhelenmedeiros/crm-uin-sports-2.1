<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria a permission se ainda não existir
        $permission = Permission::firstOrCreate(['name' => 'editar clientes']);

        // Cria a role "gerente" se ainda não existir e atribui a permission
        $role = Role::firstOrCreate(['name' => 'Admin']);
        $role->givePermissionTo($permission);
    }
}
