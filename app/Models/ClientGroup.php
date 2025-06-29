<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Um grupo pode ter várias subdivisões
     */
    public function subdivisions()
    {
        return $this->hasMany(GroupSubdivision::class, 'client_group_id');
    }

    /**
     * Um grupo pode ter vários clientes
     */
    public function clients()
    {
        return $this->hasMany(Client::class, 'client_group_id');
    }
}
