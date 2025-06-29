<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxZonaComercial;

class AuxZonaComercialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxZonaComercial::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Zona Comercial',
            'active'      => true,
        ]);
    }
}
