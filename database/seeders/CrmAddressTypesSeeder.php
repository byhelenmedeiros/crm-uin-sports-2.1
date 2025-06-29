<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrmAddressTypesSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Residencial', 'description' => 'Morada habitual de uma pessoa física'],
            ['name' => 'Comercial', 'description' => 'Endereço da sede ou estabelecimento comercial'],
            ['name' => 'Fiscal', 'description' => 'Endereço para fins fiscais, declarações e impostos'],
            ['name' => 'Correspondência', 'description' => 'Endereço para receber correspondências e comunicações'],
            ['name' => 'Entrega', 'description' => 'Endereço onde se realizam entregas e recepções'],
            ['name' => 'Sucursal', 'description' => 'Endereço de filial ou sucursal de uma empresa'],
            ['name' => 'Temporária', 'description' => 'Endereço temporário, por exemplo para eventos ou obras'],
            ['name' => 'De Trabalho', 'description' => 'Endereço profissional, escritório ou local de trabalho'],
            ['name' => 'Apartado Postal', 'description' => 'Caixa postal para recebimento de correspondências'],
            ['name' => 'Residência Secundária', 'description' => 'Segunda morada, casa de férias ou outro imóvel'],
            ['name' => 'Escritório Virtual', 'description' => 'Endereço para registro e correspondência, sem local físico'],
        ];

        foreach ($types as $type) {
            DB::table('crm_address_types')->updateOrInsert(['name' => $type['name']], $type);
        }
    }
}
