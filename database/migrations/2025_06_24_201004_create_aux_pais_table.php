﻿<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxPaisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('aux_pais', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->nullable();
            $table->string('name');

            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('aux_pais');
    }
}
