<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Isabela Nista',
            'telefone' => '21987654321',
            'endereco' => 'Barão de Petrópolis, 501 - Rio de Janeiro',
        ]);

        Cliente::create([
            'nome' => 'Luciene Mota',
            'telefone' => '21912345678',
            'endereco' => 'Gloria, 345 - Rio de Janeiro',
        ]);
        
        Cliente::create([
            'nome' => 'Marcela Paulino',
            'telefone' => '21957551566',
            'endereco' => 'Rua do Catete, 20 -  Rio de Janeiro',
        ]);
        
    
        Cliente::create([
            'nome' => 'Camile Sampaio ',
            'telefone' => '21985197364',
            'endereco' => 'Iraja, 65 -  Rio de Janeiro',
        ]);

        Cliente::create([
            'nome' => 'Leandro Vasconselos ',
            'telefone' => '21982867546',
            'endereco' => 'Santa Cruz, 40 -  Rio de Janeiro',
        ]);

        Cliente::create([
            'nome' => 'Liliam fabricio ',
            'telefone' => '21982867546',
            'endereco' => 'Parque União, 600 -  Rio de Janeiro',
        ]);
    }
}
