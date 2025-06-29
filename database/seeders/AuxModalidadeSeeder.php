<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxModalidade;

class AuxModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxModalidade::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Modalidade',
            'active'      => true,
        ]);
    }
}
