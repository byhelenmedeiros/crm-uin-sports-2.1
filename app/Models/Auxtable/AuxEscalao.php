<?php
namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Model;

class AuxEscalao extends Model
{
    protected $table = 'aux_escaloes';

    protected $fillable = [
        'external_id',
        'name',
        'order',    
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
