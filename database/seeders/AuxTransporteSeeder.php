<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxTransporte;

class AuxTransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxTransporte::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Transporte',
            'active'      => true,
        ]);
    }
}
