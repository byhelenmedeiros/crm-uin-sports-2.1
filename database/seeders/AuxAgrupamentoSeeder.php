<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxAgrupamento;

class AuxAgrupamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxAgrupamento::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Agrupamento',
            'active'      => true,
        ]);
    }
}
