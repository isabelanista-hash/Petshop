<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servico extends Model
{
   use HasFactory;
    
    
    protected $fillable = [
        'tipo', 
        'descricao',
        'data',
        'valor',
        'animal_id', // Chave estrangeira
    ];

    
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
