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
    Schema::table('crm_teams', function (Blueprint $table) {
        $table->dropColumn('team_id');
    });
}

public function down()
{
    Schema::table('crm_teams', function (Blueprint $table) {
        $table->unsignedBigInteger('team_id')->nullable();
    });
}

};
