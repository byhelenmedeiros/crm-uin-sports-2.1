<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCrmAddressesIdToCrmClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adiciona a coluna crm_addresses_id à tabela crm_clients
        Schema::table('crm_clients', function (Blueprint $table) {
            $table->unsignedBigInteger('crm_addresses_id')->nullable(); // A coluna será um BigInteger e permitirá valores nulos
            $table->foreign('crm_addresses_id')->references('id')->on('crm_addresses')->onDelete('cascade'); // Estabelece a chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove a chave estrangeira e a coluna crm_addresses_id
        Schema::table('crm_clients', function (Blueprint $table) {
            $table->dropForeign(['crm_addresses_id']); // Remove a chave estrangeira
            $table->dropColumn('crm_addresses_id'); // Remove a coluna
        });
    }
}
