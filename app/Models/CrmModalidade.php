<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class CrmModalidade extends Model
{
    use HasFactory;

    protected $table = 'crm_modalidades';

    /**
     * Campos fixos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'crm_client_id',
        'external_id',
        'name',
        'associacao',
        'numero_atletas',
        'escaloes',
        'marca_inicio',
        'marca_fim',
        'marca_renegociacao',
        'contrato_inicio',
        'contrato_fim',
        'contrato_renegociacao',
        'pack_medio',
        'pack_frequencia_inicio',
        'previsao_ano1',
        'previsao_ano2',
        'recebe_email_orcamentos',
        'recebe_email_encomendas',
        'recebe_email_faturas',
        'recebe_email_campanhas',
        'notas_modalidade',
        'documentos', // ← novo
    ];

    protected $casts = [
        'marca_inicio'            => 'date',
        'marca_fim'               => 'date',
        'marca_renegociacao'      => 'date',
        'contrato_inicio'         => 'date',
        'contrato_fim'            => 'date',
        'contrato_renegociacao'   => 'date',
        'pack_frequencia_inicio'  => 'date',
        'numero_atletas'          => 'integer',
        'previsao_ano1'           => 'integer',
        'previsao_ano2'           => 'integer',
        'pack_medio'              => 'decimal:2',
        'recebe_email_orcamentos' => 'boolean',
        'recebe_email_encomendas' => 'boolean',
        'recebe_email_faturas'    => 'boolean',
        'recebe_email_campanhas'  => 'boolean',
        'documentos'              => 'array',
    ];

    protected static function booted()
    {
        // Geração automática de UUID
        static::creating(function (CrmModalidade $model) {
            $model->external_id = (string) Str::uuid();
        });

        // Adiciona em runtime os campos de responsáveis
        static::retrieved(function (CrmModalidade $model) {
            $dynamicFields = collect(range(1, 2))->flatMap(function ($i) {
                return [
                    "responsavel{$i}_nome",
                    "responsavel{$i}_cargo",
                    "responsavel{$i}_email",
                    "responsavel{$i}_telemovel",
                    "responsavel{$i}_email_orcamentos",
                    "responsavel{$i}_email_encomendas",
                    "responsavel{$i}_email_faturas",
                    "responsavel{$i}_email_campanhas",
                ];
            })->toArray();

            // Mescla apenas uma vez
            $model->mergeFillable($dynamicFields);
        });
    }

    /**
     * Helper para mesclar campos em $fillable sem redeclará-lo diretamente.
     */
    public function mergeFillable(array $fields)
    {
        $this->fillable = array_merge($this->fillable, $fields);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'crm_client_id');
    }
}
