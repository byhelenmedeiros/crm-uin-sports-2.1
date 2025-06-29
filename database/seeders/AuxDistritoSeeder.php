<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxDistrito;

class AuxDistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxDistrito::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Distrito',
            'active'      => true,
        ]);
    }
}
