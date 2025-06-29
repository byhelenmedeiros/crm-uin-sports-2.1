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
    Schema::create('aux_escaloes', function (Blueprint $table) {
        $table->id();
        $table->string('external_id')->nullable();
        $table->string('name');
        $table->boolean('active')->default(true);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('aux_escaloes');
}
};