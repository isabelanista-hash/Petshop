<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // Importante para somar o dinheiro
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;

// 1. Rota do Dashboard (AGORA COM CÁLCULO DE FATURAMENTO)
Route::get('/', function () {
    // Soma o preço dos serviços que estão com status 'concluido'
    $faturamento = DB::table('animal_servico')
        ->join('servicos', 'animal_servico.servico_id', '=', 'servicos.id')
        ->where('animal_servico.status', 'concluido')
        ->sum('servicos.preco');

    return view('dashboard', compact('faturamento'));
})->name('dashboard');

// 2. Rotas do Sistema
Route::resource('cliente', ClienteController::class);
Route::resource('animal', AnimalController::class);
Route::resource('servico', ServicoController::class);
Route::resource('agendamento', AgendamentoController::class);

// 3. Rota para CONCLUIR um agendamento (Dar baixa)
Route::patch('/agendamento/{id}/concluir', [AgendamentoController::class, 'concluir'])->name('agendamento.concluir');