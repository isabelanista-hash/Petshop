<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // 1. Listar Clientes
    public function index()
    {
        // Buscamos todos os clientes do banco
        // Usamos o nome $clientes (plural) para ficar organizado na View
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    // 2. Mostrar Formulário de Cadastro
    public function create()
    {
        return view('cliente.create');
    }

    // 3. Salvar no Banco (Com os novos campos de endereço)
    public function store(Request $request)
    {
        // Validação completa para garantir que o endereço venha certo
        $dados = $request->validate([
            'nome'       => 'required|max:100',
            'email'      => 'nullable|email|max:100',
            'telefone'   => 'required|max:20',
            
            // Novos campos do endereço (vindos do ViaCEP + Número)
            'cep'        => 'required|min:8|max:9',
            'logradouro' => 'required|max:255',
            'numero'     => 'required|max:10',
            'bairro'     => 'required|max:100',
            'cidade'     => 'required|max:100',
            'estado'     => 'required|size:2', // Ex: RJ, SP
            'complemento'=> 'nullable|max:100',
        ]);

        // Cria o cliente no banco
        Cliente::create($dados);

        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente cadastrado com sucesso!');
    }

    // 4. Mostrar Formulário de Edição
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    // 5. Atualizar no Banco
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        // Mesma validação do cadastro
        $dados = $request->validate([
            'nome'       => 'required|max:100',
            'email'      => 'nullable|email|max:100',
            'telefone'   => 'required|max:20',
            
            'cep'        => 'required|min:8|max:9',
            'logradouro' => 'required|max:255',
            'numero'     => 'required|max:10',
            'bairro'     => 'required|max:100',
            'cidade'     => 'required|max:100',
            'estado'     => 'required|size:2',
            'complemento'=> 'nullable|max:100',
        ]);

        $cliente->update($dados);

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente atualizado com sucesso!');
    }

    // 6. Excluir Cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente excluído com sucesso!');
    }

    // 7. Ver Detalhes (Opcional, mas útil manter)
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        // Se tiver animais cadastrados, carrega junto
        // Verifique se no seu Model Cliente a função se chama 'animais' ou 'animals'
        //$cliente->load('animais'); 
        return view('cliente.show', compact('cliente'));
    }
}