<?php

namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuxVendedor extends Model
{
    protected $fillable = ['external_id', 'name', 'active', 'parent_id'];
    protected $casts = ['active' => 'boolean'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(AuxZona::class, 'parent_id');
    }
}
