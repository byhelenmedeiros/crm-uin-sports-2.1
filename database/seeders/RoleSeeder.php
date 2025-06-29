<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'SuperAdmin',
                'guard_name' => 'web', 
                'description' => 'Acesso total ao sistema',
                'crm_role' => 1  // Você pode atribuir um valor para 'crm_role' se necessário
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web',
                'description' => 'Admin do departamento',
                'crm_role' => 2
            ],
            [
                'name' => 'User',
                'guard_name' => 'web',
                'description' => 'Usuário comum do departamento',
                'crm_role' => 3
            ]
        ]);
    }
}
