<?php

namespace App\Models\Auxtable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuxZona extends Model
{
    protected $table = 'aux_zona';

    protected $fillable = [
        'external_id',
        'name',
        'parent_id',
        'type',
        'active',
    ];

    /**
     * Nível acima (zone ← comercial ← vendor)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Níveis abaixo (children)
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Escopo para só ‘zones’
     */
    public function scopeZones($query)
    {
        return $query->where('type', 'zone');
    }

    /**
     * Escopo para só ‘comercials’
     */
    public function scopeCommercials($query)
    {
        return $query->where('type', 'comercial');
    }

    /**
     * Escopo para só ‘vendors’
     */
    public function scopeVendors($query)
    {
        return $query->where('type', 'vendor');
    }
}
