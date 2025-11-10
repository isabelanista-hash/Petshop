<?php


 namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function index()
    {
        
       $cliente = \App\Models\Cliente::all();
        
        
        return view('cliente.index', compact('cliente')); 
    } 
    
    
    public function create()
    {
        
        return view('cliente.create'); 
    }

    
    public function store(Request $request)
    {
        //  Validar  dado
        $request->validate([
            'nome' => 'required|max:100',
            'telefone' => 'nullable|max:20',
            'endereco' => 'required|max:255',
        ]);
        
        //  Criação  no banco de dados
        \App\Models\Cliente::create($request->all());
        
        //  Redireciona de volta para a lista
        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show(\App\Models\Cliente $cliente)
    {
        // E o carregamento dos animais e dos serviços de cada um
       $cliente->load('animals.servicos');
       return view('cliente.show', compact('cliente'));
    }

    
    public function edit(Cliente $cliente)
    {
      return view('cliente.edit', compact('cliente'));
    }

    
    public function update(Request $request, Cliente $cliente)
    {
       $request->validate([
            'nome' => 'required|max:100',
            'telefone' => 'nullable|max:20',
            ]);

            $cliente->update($request->all());
            return redirect()->route('cliente.index')
                         ->with('success', 'Cliente atualizado com sucesso!');
    
    }

    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente excluído com sucesso!');
    }
} 