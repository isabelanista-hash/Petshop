<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Servico;
use App\Models\Cliente;

class AgendamentoController extends Controller
{
    // 1. Listar os Agendamentos
    public function index()
    {
        // Pega animais que têm serviços agendados
        $agendamentos = Animal::whereHas('servicos')->with('servicos', 'cliente')->get();
        
        // Retorna para a view (certifique-se que a pasta chama 'agendamento')
        return view('agendamento.index', compact('agendamentos'));
    }

    // 2. Mostrar o Formulário
    public function create()
    {
        $animais = Animal::with('cliente')->get(); 
        $servicos = Servico::all();

        return view('agendamento.create', compact('animais', 'servicos'));
    }

    // 3. Salvar o Agendamento
    public function store(Request $request)
    {
        $dados = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'servico_id' => 'required|exists:servicos,id',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $animal = Animal::findOrFail($request->animal_id);
        $dataHora = $request->data . ' ' . $request->hora;

        // Salva na tabela pivô
        $animal->servicos()->attach($request->servico_id, [
            'data_agendamento' => $dataHora,
            'status' => 'agendado',
            'observacao' => $request->observacao
        ]);

        // CORREÇÃO AQUI: Rota no SINGULAR
        return redirect()->route('agendamento.index')
                         ->with('success', 'Agendamento realizado com sucesso!');
    }
    // Adicione este método no final da classe AgendamentoController
    public function concluir($id)
    {
        // Atualiza o status na tabela pivô diretamente pelo ID do agendamento
        \Illuminate\Support\Facades\DB::table('animal_servico')
            ->where('id', $id)
            ->update(['status' => 'concluido']);

        return redirect()->route('agendamento.index')
                         ->with('success', 'Serviço concluído! Valor adicionado ao caixa.');
    }
}
