<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSubdivision extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'client_group_id'];

    /**
     * Subdivisão pertence a um grupo principal
     */
    public function group()
    {
        return $this->belongsTo(ClientGroup::class, 'client_group_id');
    }

    /**
     * Clientes associados a esta subdivisão
     */
    public function clients()
    {
        return $this->hasMany(Client::class, 'group_subdivision_id');
    }
}
