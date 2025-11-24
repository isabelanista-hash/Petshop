<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'cliente_id', // Importante para vincular ao dono
    ];

    // Relação: Animal PERTENCE a um Cliente (Dono)
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relação N:N (Futura): Animal tem vários Serviços
    public function servicos()
{
    return $this->belongsToMany(Servico::class)
                ->withPivot('id', 'data_agendamento', 'status', 'observacao')
                ->withTimestamps();
}
}