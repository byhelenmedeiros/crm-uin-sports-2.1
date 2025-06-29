<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('crm_teams', function (Blueprint $table) {
            // Se houver foreign key para user_id, primeiro soltar a constraint
            $table->dropForeign(['user_id']);
            // Agora remove a coluna user_id
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        Schema::table('crm_teams', function (Blueprint $table) {
            // Para reverter, adiciona a coluna user_id de volta (nullable para evitar erros)
            $table->unsignedBigInteger('user_id')->nullable();

            // Se desejar, pode adicionar foreign key novamente
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
