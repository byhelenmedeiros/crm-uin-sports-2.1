<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CrmModalidade extends Model
{
    use HasFactory;

    protected $table = 'crm_modalidades';

    protected $fillable = array_merge([
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
        'notas_modalidade',
        'documentos', // ← novo
    ], collect(range(1, 2))->flatMap(fn($i) => [
        "responsavel{$i}_nome",
        "responsavel{$i}_cargo",
        "responsavel{$i}_email",
        "responsavel{$i}_telemovel",
        "responsavel{$i}_email_orcamentos",
        "responsavel{$i}_email_encomendas",
        "responsavel{$i}_email_faturas",
        "responsavel{$i}_email_campanhas",
    ])->toArray());
    

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
        'documentos'              => 'array',   // ← novo
    ];

    protected static function booted()
    {
        static::creating(function (CrmModalidade $m) {
            $m->external_id = (string) Str::uuid();
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'crm_client_id');
    }
}
