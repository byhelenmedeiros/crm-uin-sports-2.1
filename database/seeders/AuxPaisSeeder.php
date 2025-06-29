<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxPais;

class AuxPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxPais::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste País',
            'active'      => true,
        ]);
    }
}
