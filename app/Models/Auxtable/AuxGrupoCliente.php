<?php

namespace App\Models\Auxtable;


use Illuminate\Database\Eloquent\Model;
 class AuxGrupoCliente extends Model
{
    protected $table = 'aux_grupo_clientes';

    protected $fillable = [
        'external_id',
        'name',
        'active',
    ];

    /**
     * 1 Grupo → N Agrupamentos
     */
    public function agrupamentos()
    {
        return $this->hasMany(AuxAgrupamento::class, 'aux_grupo_cliente_id');
    }
}
