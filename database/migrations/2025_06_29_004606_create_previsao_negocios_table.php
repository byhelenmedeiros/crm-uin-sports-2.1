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
    Schema::create('previsao_negocios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('crm_client_id')
              ->constrained('crm_clients')
              ->cascadeOnDelete();
        $table->smallInteger('ano');
        $table->decimal('valor', 15, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previsao_negocios');
    }
};
