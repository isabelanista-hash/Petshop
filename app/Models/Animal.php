<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
   use HasFactory;
    
    // Define as colunas preenchíveis
    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'cliente_id', // Chave estrangeira
    ];

    //   Um Animal que pertence a um cliente  
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    //  Um Animal que tem vários serviços
    public function servicos(): HasMany
    {
        return $this->hasMany(Servico::class);
    }
}
