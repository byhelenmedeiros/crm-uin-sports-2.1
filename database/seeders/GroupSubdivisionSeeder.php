<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GroupSubdivisionSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('group_subdivisions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $subdivisions = [
            2  => ['nome cliente'],
            3  => ['loja', 'clubes', 'patrocinadores', 'revendedores', 'empresa', 'federações / associações'],
            11 => ['colegio', 'universidade', 'escola', 'ass estudantes'],
            13 => ['decathlon', 'worten', 'sprinter', 'bulevip', 'loja uin'],
            16 => ['loja ortopedica', 'revendedor', 'farmacia / para farmacia', 'clínica medica', 'fisioterapeuta'],
            17 => ['pt'],
        ];
        foreach ($subdivisions as $groupId => $names) {
            foreach ($names as $nameValue) {
                DB::table('group_subdivisions')->insert([
                    'client_group_id' => $groupId,    
                    'name'            => $nameValue,  
                    'created_at'      => Carbon::now(),
                    'updated_at'      => Carbon::now(),
                ]);
            }
        }
    }
}
