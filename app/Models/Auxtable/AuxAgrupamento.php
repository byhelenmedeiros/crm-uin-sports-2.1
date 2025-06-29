<?php

namespace App\Models\Auxtable;


use Illuminate\Database\Eloquent\Model;

class AuxAgrupamento extends Model
{
    protected $table = 'aux_agrupamentos';

    protected $fillable = [
        'aux_grupo_cliente_id',
        'name',
        'active',
    ];

    /**
     * Cada Agrupamento pertence a 1 Grupo
     */
    public function grupo()
    {
        return $this->belongsTo(AuxGrupoCliente::class, 'aux_grupo_cliente_id');
    }
}
