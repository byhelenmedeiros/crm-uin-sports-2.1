<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class CrmTeamsSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            'Vendas',
            'Marketing',
            'Design',
            'Administração',
            'Logística',
        ];

        foreach ($teams as $teamName) {
            Team::updateOrCreate(['name' => $teamName]);
        }
    }
}
