<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalZoneMapping extends Model
{
    protected $table = 'postal_zone_mappings';

    protected $fillable = [
        'external_id',
        'prefix',
        'zone_id',
        'comercial_zone_id',
        'vendor_id',
    ];

    /**
     * Zona padrão
     */
    public function zone()
    {
        return $this->belongsTo(\App\Models\Zone::class);
    }

    /**
     * Zona Comercial
     */
    public function comercialZone()
    {
        return $this->belongsTo(\App\Models\ComercialZone::class, 'comercial_zone_id');
    }

    /**
     * Vendedor
     */
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class);
    }
}
