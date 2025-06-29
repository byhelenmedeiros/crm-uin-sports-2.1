<?php

namespace App\Models\Auxtable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuxZona extends Model
{
    protected $fillable = ['external_id', 'name', 'active', 'parent_id'];
    protected $casts = ['active' => 'boolean'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(AuxZonaComercial::class, 'parent_id');
    }
}
