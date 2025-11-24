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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            
            // MUDANÇAS PARA VIRAR UM CATÁLOGO:
            $table->string('nome'); // Antes era 'tipo'. Ex: "Banho Simples"
            $table->text('descricao')->nullable(); // Mantemos. Ex: "Inclui corte de unhas"
            $table->decimal('preco', 10, 2); // Antes era 'valor'. Preço padrão do serviço.
            
            // REMOVIDOS:
            // $table->date('data'); -> Isso vai para o AGENDAMENTO
            // $table->foreignId('animal_id'); -> Isso vai para o AGENDAMENTO
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};