<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxVendedor;
use App\Models\Aux\AuxZona;

class AuxVendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Garante existência de uma Zona
        $parent = AuxZona::first()
            ?? AuxZona::create([
                'external_id' => Str::uuid(),
                'name'        => 'Teste Zona (pai)',
                'active'      => true,
            ]);

        AuxVendedor::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Vendedor',
            'active'      => true,
            'parent_id'   => $parent->id,
        ]);
    }
}
