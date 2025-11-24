<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Animal;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    
    public function run(): void
    {
        $isabela = Cliente::where('nome', 'Isabela Nista')->first(); 
        $luciene = Cliente::where('nome', 'Luciene Motta')->first(); 
        $liliam = Cliente::where('nome', 'Liliam Fabrício')->first(); 


        if ($isabela) {
            Animal::create([
                'nome' => 'Tata',
                'especie' => 'Cachorro',
                'raca' => 'Poodle',
                'cliente_id' => $isabela->id, 
            ]);
            
            Animal::create([
                'nome' => 'Sheldon',
                'especie' => 'Cachorro',
                'raca' => 'Viralata',
                'cliente_id' => $isabela->id, // Outro animal
            ]);
        }

        if ($luciene) {
             Animal::create([
                'nome' => 'Rex',
                'especie' => 'Cachorro',
                'raca' => 'Pastor Alemão',
                'cliente_id' => $luciene->id, 
            ]);
            
             if ($liliam) {
             Animal::create([
                'nome' => 'Lili',
                'especie' => 'Gato',
                'raca' => 'Angora',
                'cliente_id' => $liliam->id, 
            ]);
    }
}
}
}