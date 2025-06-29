<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxCorClube2;

class AuxCorClube2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxCorClube2::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Cor Clube 2',
            'active'      => true,
        ]);
    }
}
