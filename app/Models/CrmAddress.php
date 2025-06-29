<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CrmAddress extends Model
{
    use HasFactory;

    protected $table = 'crm_addresses';

    protected $fillable = [
        'id',
        'team_id',
        'address_type',
        'address',
        'name',
        'contact',
        'phone',
        'line1',
        'line2',
        'line3',
        'code',
        'city',
        'state',
        'country',
        'addressable_type',
        'addressable_id',
        'user_created_id',
        'user_updated_id',
        'user_deleted_id',
        'user_restored_id',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    /**
     * Relacionamento com a tabela crm_clients
     * Um endereço pode ter vários clientes associados (1:N)
     */
    public function clients()
    {
        return $this->hasMany(Client::class, 'crm_addresses_id'); 
    }
      /**
     * Relacionamento com o usuário que criou o endereço (User)
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    /**
     * Relacionamento com o usuário que atualizou o endereço (User)
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    /**
     * Relacionamento com o usuário que deletou o endereço (User)
     */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'user_deleted_id');
    }

    /**
     * Relacionamento com o usuário que restaurou o endereço (User)
     */
    public function restoredBy()
    {
        return $this->belongsTo(User::class, 'user_restored_id');
    }
   public function addressable()
{
    return $this->morphTo();
}

public function addressType()
{
    return $this->belongsTo(CrmAddressType::class, 'address_type_id');
}
}


