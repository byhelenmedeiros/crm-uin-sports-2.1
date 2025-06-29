<?php

namespace Database\Seeders;

use App\Models\AuxCidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AuxCidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxCidade::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Cidade',
            'active'      => true,
        ]);
    }
}
