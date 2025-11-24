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
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('email')->nullable();
        $table->string('telefone');
        
        // Novos campos de Endereço Profissional
        $table->string('cep', 9);            // Ex: 20000-000
        $table->string('logradouro');        // Ex: Rua das Flores
        $table->string('numero', 10);        // Ex: 123, S/N
        $table->string('bairro');            // Ex: Centro
        $table->string('cidade');            // Ex: Rio de Janeiro
        $table->string('estado', 2);         // Ex: RJ
        $table->string('complemento')->nullable(); // Ex: Ap 101
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
