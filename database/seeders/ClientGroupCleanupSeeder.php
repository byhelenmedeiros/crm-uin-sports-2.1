<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientGroupCleanupSeeder extends Seeder
{
    /**
     * Executa o seeder para remover todos os dados da tabela client_groups.
     *
     * @return void
     */
    public function run()
    {
        // Desativa temporariamente as checagens de chaves estrangeiras (MySQL)
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Trunca (remove) todos os registros da tabela client_groups
        DB::table('client_groups')->truncate();

        // Reativa as checagens de chaves estrangeiras
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
