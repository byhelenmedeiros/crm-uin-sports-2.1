<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aux\AuxPagamento;

class AuxPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AuxPagamento::create([
            'external_id' => Str::uuid(),
            'name'        => 'Teste Pagamento',
            'active'      => true,
        ]);
    }
}
