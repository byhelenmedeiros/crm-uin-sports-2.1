<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run()
    {
        // Definindo os dados dos teams
        DB::table('crm_teams')->insert([
            ['name' => 'Vendas', 'user_id' => 1],  // Supondo que o 'user_id' 1 é o responsável
            ['name' => 'Marketing', 'user_id' => 1],
            ['name' => 'Design', 'user_id' => 1],
            ['name' => 'Administração', 'user_id' => 1],
            ['name' => 'Logística', 'user_id' => 1],
        ]);
    }
}
