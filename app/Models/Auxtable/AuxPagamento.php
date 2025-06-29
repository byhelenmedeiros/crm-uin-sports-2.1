<?php

namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Model;

class AuxPagamento extends Model

{
    protected $table = 'aux_pagamentos';
    protected $fillable = ['external_id', 'name', 'active'];
    protected $casts = ['active' => 'boolean'];
}
