<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        $servicos = [
            // --- ESTÉTICA E HIGIENE ---
            [
                'nome' => 'Banho Simples (Pequeno Porte)',
                'preco' => 50.00,
                'descricao' => 'Banho com shampoo neutro, corte de unhas e limpeza de ouvidos para cães até 10kg.'
            ],
            [
                'nome' => 'Banho Simples (Médio Porte)',
                'preco' => 70.00,
                'descricao' => 'Banho completo para cães de 10kg a 25kg. Inclui secagem e perfume.'
            ],
            [
                'nome' => 'Banho Simples (Grande Porte)',
                'preco' => 90.00,
                'descricao' => 'Banho reforçado para cães acima de 25kg (Golden, Labrador, etc).'
            ],
            [
                'nome' => 'Tosa Higiênica',
                'preco' => 40.00,
                'descricao' => 'Corte de pelos nas patas, barriga e região íntima para higiene.'
            ],
            [
                'nome' => 'Tosa Completa (Máquina)',
                'preco' => 100.00,
                'descricao' => 'Tosa geral na máquina (altura a combinar) + Banho completo.'
            ],
            [
                'nome' => 'Tosa na Tesoura (Styling)',
                'preco' => 150.00,
                'descricao' => 'Acabamento refinado feito manualmente na tesoura para raças específicas.'
            ],
            [
                'nome' => 'Hidratação Profunda',
                'preco' => 35.00,
                'descricao' => 'Tratamento com máscara de argan para pelos ressecados (Adicional ao banho).'
            ],
            [
                'nome' => 'Corte de Unhas (Avulso)',
                'preco' => 20.00,
                'descricao' => 'Serviço rápido de corte e lixamento de unhas.'
            ],

            // --- SAÚDE ---
            [
                'nome' => 'Consulta Veterinária',
                'preco' => 120.00,
                'descricao' => 'Avaliação clínica geral do animal em horário comercial.'
            ],
            [
                'nome' => 'Vacina V10/V8 (Importada)',
                'preco' => 110.00,
                'descricao' => 'Proteção anual contra cinomose, parvovirose e outras doenças.'
            ],
            [
                'nome' => 'Vacina Antirrábica',
                'preco' => 80.00,
                'descricao' => 'Vacina obrigatória anual contra a raiva.'
            ],
            [
                'nome' => 'Aplicação de Medicamento',
                'preco' => 30.00,
                'descricao' => 'Aplicação de injeção ou remédio oral (não inclui o custo do remédio).'
            ],

            // --- HOTEL E CRECHE ---
            [
                'nome' => 'Diária de Hotelzinho',
                'preco' => 100.00,
                'descricao' => 'Hospedagem por 24h com alimentação e recreação inclusas.'
            ],
            [
                'nome' => 'DayCare (Creche)',
                'preco' => 70.00,
                'descricao' => 'Período integral de brincadeiras e socialização (sem pernoite).'
            ],
            [
                'nome' => 'Táxi Dog (Bairro)',
                'preco' => 20.00,
                'descricao' => 'Busca e entrega do animal dentro do bairro (valor por trecho).'
            ]
        ];

        // Loop para criar todos de uma vez
        foreach ($servicos as $servico) {
            Servico::create($servico);
        }
    }
}