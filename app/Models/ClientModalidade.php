<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModalidade extends Model
{
    use HasFactory;

    protected $table = 'client_modalidades';

    protected $fillable = [
        'client_id',
        'modalidade_nome',
        'numero_atletas',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
