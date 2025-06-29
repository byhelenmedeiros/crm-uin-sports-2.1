<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
    ];

    /**
     * Um Vendor pode ter muitos clientes.
     */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
