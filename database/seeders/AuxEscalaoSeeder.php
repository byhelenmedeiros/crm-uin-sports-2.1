<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxEscalao;

class AuxEscalaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxEscalao::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Escalão',
            'active'      => true,
        ]);
    }
}
