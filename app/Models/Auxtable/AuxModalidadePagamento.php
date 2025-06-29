<?php

namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxModalidadePagamento extends Model
{
    use HasFactory;

    protected $table = 'aux_modalidade_pagamento';

    protected $fillable = [
        'external_id',
        'name',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
