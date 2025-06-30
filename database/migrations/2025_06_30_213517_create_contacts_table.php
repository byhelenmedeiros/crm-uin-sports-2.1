<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('crm_contacts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')
              ->constrained('crm_clients')
              ->onDelete('cascade');
        $table->string('responsavel_nome')->nullable();
        $table->date('data_aniversario')->nullable();
        $table->string('telefone1',20)->nullable();
        $table->string('telefone2',20)->nullable();
        $table->string('telefone3',20)->nullable();
        $table->string('movel1',20)->nullable();
        $table->string('movel2',20)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
