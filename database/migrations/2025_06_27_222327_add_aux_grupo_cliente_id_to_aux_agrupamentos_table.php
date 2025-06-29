<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('aux_agrupamentos', function (Blueprint $table) {
        // 1) adiciona a coluna FK
        $table->unsignedBigInteger('aux_grupo_cliente_id')
              ->after('name')
              ->nullable();
        // 2) cria o índice e a FK
        $table->index('aux_grupo_cliente_id');
        $table->foreign('aux_grupo_cliente_id')
              ->references('id')
              ->on('aux_grupo_clientes')
              ->cascadeOnDelete()
              ->cascadeOnUpdate();
    });
}

public function down(): void
{
    Schema::table('aux_agrupamentos', function (Blueprint $table) {
        $table->dropForeign(['aux_grupo_cliente_id']);
        $table->dropIndex(['aux_grupo_cliente_id']);
        $table->dropColumn('aux_grupo_cliente_id');
    });
}

};
