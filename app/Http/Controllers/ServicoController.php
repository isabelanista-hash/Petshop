<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        return view('servico.index', compact('servicos'));
    }

    public function create()
    {
        return view('servico.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|max:500',
            'preco' => 'required|numeric|min:0',
        ]);

        Servico::create($dados);

        return redirect()->route('servico.index')
                         ->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servico.edit', compact('servico'));
    }

    public function update(Request $request, $id)
    {
        $servico = Servico::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|max:500',
            'preco' => 'required|numeric|min:0',
        ]);

        $servico->update($dados);

        return redirect()->route('servico.index')
                         ->with('success', 'Serviço atualizado!');
    }

    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return redirect()->route('servico.index')
                         ->with('success', 'Serviço removido!');
    }
}