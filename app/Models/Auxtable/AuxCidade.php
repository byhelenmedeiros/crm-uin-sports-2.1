<?php

 

namespace App\Models\Auxtable;

use Illuminate\Database\Eloquent\Model;

class AuxCidade extends Model
{
    protected $table = 'aux_cidades';
    protected $fillable = ['external_id', 'name', 'active'];
    protected $casts = ['active' => 'boolean'];
}
