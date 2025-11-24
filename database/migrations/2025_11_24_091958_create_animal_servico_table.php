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
    Schema::create('animal_servico', function (Blueprint $table) {
        $table->id();
        
        // Chaves estrangeiras (Relacionamento N:N)
        $table->foreignId('animal_id')->constrained('animals')->cascadeOnDelete();
        $table->foreignId('servico_id')->constrained('servicos')->cascadeOnDelete();
        
        // Campos extras do agendamento
        $table->dateTime('data_agendamento');
        $table->enum('status', ['agendado', 'concluido', 'cancelado'])->default('agendado');
        $table->text('observacao')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_servico');
    }
};
