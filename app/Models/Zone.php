<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
