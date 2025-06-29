<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CrmModalidade extends Model
{
    use HasFactory;

    protected $table = 'crm_modalidades';

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
        'responsavel_nome_1',
        'responsavel_cargo_1',
        'responsavel_email_1',
        'responsavel_telemovel_1',
        'responsavel_nome_2',
        'responsavel_cargo_2',
        'responsavel_email_2',
        'responsavel_telemovel_2',
        'recebe_email_orcamentos',
        'recebe_email_encomendas',
        'recebe_email_faturas',
        'recebe_email_campanhas',
        'pack_medio',
        'pack_frequencia_inicio',
        'previsao_ano1',
        'previsao_ano2',
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
