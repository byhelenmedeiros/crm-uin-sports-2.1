<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZoneSeeder extends Seeder
{
    public function run()
    {
        // Array com external_id => nome_da_zona (em caixa alta, conforme imagem)
        $zones = [
            1000 => 'LISBOA',
            2000 => 'SANTAREM',
            2400 => 'LEIRIA',
            2900 => 'SETUBAL',
            3000 => 'COIMBRA',
            3500 => 'VISEU',
            3800 => 'AVEIRO',
            4000 => 'PORTO',
            4700 => 'BRAGA',
            4900 => 'VIANA DO CASTELO',
            5000 => 'VILA REAL',
            5300 => 'BRAGANCA',
            6000 => 'CASTELO BRANCO',
            6300 => 'GUARDA',
            7000 => 'EVORA',
            7300 => 'PORTALEGRE',
            7800 => 'BEJA',
            8000 => 'FARO',
            9000 => 'MADEIRA',
            9500 => 'ACORES',
        ];

        foreach ($zones as $externalId => $name) {
            Zone::updateOrCreate(
                ['external_id' => $externalId],
                ['name' => $name]
            );
        }
    }
}
