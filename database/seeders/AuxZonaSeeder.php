<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxZona;
use App\Models\Aux\AuxZonaComercial;

class AuxZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Garante existência de uma Zona Comercial
        $parent = AuxZonaComercial::first()
            ?? AuxZonaComercial::create([
                'external_id' => Str::uuid(),
                'name'        => 'Teste Zona Comercial (pai)',
                'active'      => true,
            ]);

        AuxZona::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Zona',
            'active'      => true,
            'parent_id'   => $parent->id,
        ]);
    }
}
