<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSubdivisionCleanupSeeder extends Seeder
{
    /**
     * Executa o seeder para remover todos os dados da tabela group_subdivisions.
     *
     * @return void
     */
    public function run()
    {
        // Desativa temporariamente as checagens de chaves estrangeiras (MySQL)
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Trunca (remove) todos os registros da tabela group_subdivisions
        DB::table('group_subdivisions')->truncate();

        // Reabilita as checagens de chaves estrangeiras
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
