<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxGrupoCliente;
use App\Models\Aux\AuxAgrupamento;

class AuxGrupoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Garante existência de um Agrupamento
    $parent = AuxAgrupamento::first()
            ?? AuxAgrupamento::create([
                'external_id' => Str::uuid(),
                'name'        => 'Teste Agrupamento (pai)',
                'active'      => true,
            ]);

        AuxGrupoCliente::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Grupo Cliente',
            'active'      => true,
            'parent_id'   => $parent->id,
        ]);
    }
}
