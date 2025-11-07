<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimalController extends Controller
{
    
    public function index()
    {
       $animais = Animal::with('cliente')->get();
       return view('animal.index', compact('animais'));
    }

    
    public function create()
    {
      $cliente = Cliente::all();
       return view('animal.create', compact('cliente'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'especie' => 'nullable|max:255',
            'raca' => 'nullable|max:255',
            'cliente_id' => 'required|exists:clientes,id', 
        ]);
        Animal::create($request->all());
        
        return redirect()->route('animal.index')
                         ->with('success', 'Animal cadastrado com sucesso!');
    }

    
    public function show(Animal $animal)
    {
        //
    }

    
    public function edit(Animal $animal)
    {
        $clientes = \App\Models\Cliente::all();
        return view('animal.edit', compact('animal', 'clientes'));

    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'especie' => 'nullable|max:255',
            'raca' => 'nullable|max:255',
            'cliente_id' => 'required|exists:cliente,id', 
        ]);
        $animal->update($request->all());
        return redirect()->route('animal.index')
                         ->with('success', 'Animal atualizado com sucesso!');
        }

    
    public function destroy(Animal $animal)
    {
        $animal->delete();
        
        return redirect()->route('animal.index')
                         ->with('success', 'Animal excluído com sucesso!');
    }
}
