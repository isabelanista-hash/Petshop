<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servico;
use App\Models\Animal;

class ServicoSeeder extends Seeder
{
    
    public function run(): void
    {
        $tata= Animal::where('nome', 'Tata')->first();
        $lili = Animal::where('nome', 'Lili')->first();
        
        if ($tata) {
            Servico::create([
                'tipo' => 'Banho e Tosa',
                'descricao' => 'Banho completo e tosa higiênica.',
                'data' => now()->toDateString(),
                'valor' => 50.00,
                'animal_id' => $tata->id, 
            ]);
        }

        if ($lili) {
            Servico::create([
                'tipo' => 'Consulta Veterinária',
                'descricao' => 'Exame de rotina anual.',
                'data' => now()->addDays(2)->toDateString(),
                'valor' => 120.50,
                'animal_id' => $lili->id,
            ]);
    }
}
}