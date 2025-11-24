<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Isabela
        Cliente::create([
            'nome' => 'Isabela Nista',
            'telefone' => '	21 98519-7364',
            'email' => 'isabela.messias@edu.santoinacio-rio.com.br', // Criei um email fictício
            'cep' => '20251-063',
            'logradouro' => 'Rua Barão de Petrópolis',
            'numero' => '501',
            'bairro' => 'Rio Comprido',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
        ]);

        // 2. Luciene
        Cliente::create([
            'nome' => 'Luciene Motta',
            'telefone' => '21 93184-6200',
            'email' => 'luciene.motta@santoinacio-rio.com.br',
            'cep' => '20021-000',
            'logradouro' => 'Rua da Glória',
            'numero' => '345',
            'bairro' => 'Glória',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
        ]);
        
        // 3. Marcela
        Cliente::create([
            'nome' => 'Marcela Paulino',
            'telefone' => '21 98352-9812',
            'email' => 'marcela.paulino@edu.santoinacio-rio.com.br',
            'cep' => '22220-000',
            'logradouro' => 'Avenida Pasteur',
            'numero' => '404',
            'bairro' => 'Botafogo',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
        ]);
        
        // 4. Camille
        Cliente::create([
            'nome' => 'Camille Sampaio',
            'telefone' => '21 97620-5066',
            'email' => 'camille.chapeta@edu.santoinacio-rio.com.br',
            'cep' => '21235-070',
            'logradouro' => 'Rua Cisplatina',
            'numero' => '135',
            'bairro' => 'Irajá',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
        ]);

        // 5. Leandro
        Cliente::create([
            'nome' => 'Leandro Vasconcelos',
            'telefone' => '21982867546',
            'email' => 'leandro.vasconcelos@edu.santoinacio-rio.com.br',
            'cep' => '23515-000',
            'logradouro' => 'Rua Bernardo Vasconcelos',
            'numero' => '158',
            'bairro' => 'Parque Santa Lúcia',
            'cidade' => 'Duque de Caxias',
            'estado' => 'RJ',
        ]);

        // 6. Liliam
        Cliente::create([
            'nome' => 'Liliam Fabrício',
            'telefone' => '21 96408-3053',
            'email' => 'liliam.silva@edu.santoinacio-rio.com.br',
            'cep' => '21040-000',
            'logradouro' => 'Parque União',
            'numero' => '600',
            'bairro' => 'Maré',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
        ]);
    }
}