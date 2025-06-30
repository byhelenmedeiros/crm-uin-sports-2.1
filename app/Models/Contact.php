<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'crm_contacts';

    protected $fillable = [
        'client_id',
        'responsavel_nome',
        'data_aniversario',
        'telefone1','telefone2','telefone3',
        'movel1','movel2',
    ];

    protected $casts = [
        'data_aniversario' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
