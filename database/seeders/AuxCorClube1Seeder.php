<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxCorClube1;

class AuxCorClube1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxCorClube1::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Cor Clube 1',
            'active'      => true,
        ]);
    }
}
