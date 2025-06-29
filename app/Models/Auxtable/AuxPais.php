<?php

namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Model;

class AuxPais extends Model
{
    protected $fillable = ['external_id', 'name', 'active'];
    protected $casts = ['active' => 'boolean'];
}
