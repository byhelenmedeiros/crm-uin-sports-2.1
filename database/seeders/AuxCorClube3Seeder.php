<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxCorClube3;

class AuxCorClube3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxCorClube3::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Cor Clube 3',
            'active'      => true,
        ]);
    }
}
