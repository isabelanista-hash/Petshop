<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::with('cliente')->get();
        return view('animal.index', compact('animais'));
    }

    public function create()
    {
        // Apenas buscamos os donos para o select
        $clientes = Cliente::all();
        return view('animal.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome'       => 'required|max:255',
            'especie'    => 'required|in:Cachorro,Gato', // Validação segura
            'raca'       => 'nullable|max:255',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        Animal::create($dados);
        
        return redirect()->route('animal.index')
                         ->with('success', 'Pet cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $clientes = Cliente::all(); 
        return view('animal.edit', compact('animal', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $dados = $request->validate([
            'nome'       => 'required|max:255',
            'especie'    => 'required|in:Cachorro,Gato',
            'raca'       => 'nullable|max:255',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $animal->update($dados);

        return redirect()->route('animal.index')
                         ->with('success', 'Pet atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        
        return redirect()->route('animal.index')
                         ->with('success', 'Pet excluído com sucesso!');
    }
}