<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrevisaoNegocio extends Model
{
    protected $table = 'previsao_negocios';

    protected $fillable = [
      'crm_client_id',
      'ano',
      'valor',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'crm_client_id');
    }
}
