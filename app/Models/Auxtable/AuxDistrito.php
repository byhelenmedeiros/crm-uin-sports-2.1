<?php

namespace App\Models\Auxtable;

use Illuminate\Database\Eloquent\Model;

class AuxDistrito extends Model
{
    
    protected $fillable = [
        'external_id',
        'name',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
