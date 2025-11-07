<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;
use App\Models\Animal;

class ServicoController extends Controller
{
    
    public function index()
    {
        $servico = Servico::with('animal.cliente')->get();
        return view('servico.index', compact('servico'));
    }

   
    public function create()
    {
       $animais = Animal::all();
       return view('servico.create', compact('animais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|max:255',
            'descricao' => 'nullable',
            'data' => 'required|date',
            'valor' => 'required|numeric',
            'animal_id' => 'required|exists:animals,id', // Verifica se o ID do animal existe
        ]);
        Servico::create($request->all());
        return redirect()->route('servico.index')
                         ->with('success', 'Serviço cadastrado com sucesso!');
    }

    
    public function show(Servico $servico)
    {
        //
    }

   
    public function edit(Servico $servico)
    {
       $animais = Animal::all();
       return view('servico.edit', compact('servico', 'animais'));
    }

    
    public function update(Request $request, Servico $servico)
    {
       $request->validate([
            'tipo' => 'required|max:255',
            'descricao' => 'nullable',
            'data' => 'required|date',
            'valor' => 'required|numeric',
            'animal_id' => 'required|exists:animals,id', 
        ]);
        $servico->update($request->all());
        
        return redirect()->route('servico.index')
                         ->with('success', 'Serviço atualizado com sucesso!');
    }

   
    public function destroy(Servico $servico)
    {
        $servico->delete();
        
        return redirect()->route('servico.index')
                         ->with('success', 'Serviço excluído com sucesso!');
    }
}
