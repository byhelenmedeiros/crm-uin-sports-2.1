<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmAddressType extends Model
{
    protected $table = 'crm_address_types';

    protected $fillable = ['name', 'description'];
}
