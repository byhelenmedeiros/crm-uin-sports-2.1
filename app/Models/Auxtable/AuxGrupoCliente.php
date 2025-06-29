<?php

namespace App\Models\Auxtable;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxGrupoCliente extends Model
{
    use HasFactory;

    protected $fillable = ['name','external_id','parent_id'];

    /**
     * Um grupo pode ter várias subdivisões
     */

       public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    /**
     * Um grupo pode ter vários clientes
     */
    public function clients()
    {
        return $this->hasMany(Client::class, 'client_group_id');
    }
    
}
