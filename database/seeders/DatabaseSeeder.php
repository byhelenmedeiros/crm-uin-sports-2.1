<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
    AuxEscalaoSeeder::class,
    AuxCidadeSeeder::class,
    AuxPaisSeeder::class,
    AuxDistritoSeeder::class,
    AuxModalidadeSeeder::class,
    AuxTransporteSeeder::class,
    AuxPagamentoSeeder::class,
    AuxZonaComercialSeeder::class,
    AuxZonaSeeder::class,
    AuxVendedorSeeder::class,
    AuxAgrupamentoSeeder::class,
    AuxGrupoClienteSeeder::class,
    AuxCorClube1Seeder::class,
    AuxCorClube2Seeder::class,
    AuxCorClube3Seeder::class,
    AuxPadraoSeeder::class,
]);

    }
}
