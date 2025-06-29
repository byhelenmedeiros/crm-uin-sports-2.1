<?php

namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Model;

class AuxPadrao extends Model
{

    protected $table = 'aux_padroes';
    protected $fillable = ['external_id', 'name', 'active'];
    protected $casts = ['active' => 'boolean'];
}
