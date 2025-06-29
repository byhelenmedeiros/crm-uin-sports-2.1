<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponsaveisToCrmModalidades extends Migration
{
    public function up(): void
    {
        Schema::table('crm_modalidades', function (Blueprint $table) {
            for ($i = 1; $i <= 2; $i++) {
                $table->string("responsavel{$i}_nome")->nullable();
                $table->string("responsavel{$i}_cargo")->nullable();
                $table->string("responsavel{$i}_email")->nullable();
                $table->string("responsavel{$i}_telemovel")->nullable();
                $table->string("responsavel{$i}_email_orcamentos")->nullable();
                $table->string("responsavel{$i}_email_encomendas")->nullable();
                $table->string("responsavel{$i}_email_faturas")->nullable();
                $table->string("responsavel{$i}_email_campanhas")->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('crm_modalidades', function (Blueprint $table) {
            for ($i = 1; $i <= 2; $i++) {
                $table->dropColumn([
                    "responsavel{$i}_nome",
                    "responsavel{$i}_cargo",
                    "responsavel{$i}_email",
                    "responsavel{$i}_telemovel",
                    "responsavel{$i}_email_orcamentos",
                    "responsavel{$i}_email_encomendas",
                    "responsavel{$i}_email_faturas",
                    "responsavel{$i}_email_campanhas",
                ]);
            }
        });
    }
}
