<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
   @extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <h1 class="mb-4">Clientes Cadastrados</h1>


    <a href="{{ route('cliente.create') }}" class="btn btn-primary mb-3">
        Adicionar Novo Cliente
    </a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    
    @if(empty($cliente) || $cliente->isEmpty())
        <div class="alert alert-info">Nenhum cliente cadastrado.</div>
    @else
        <table class="table table-striped table-bordered"> 
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                
                {{-- 🚨 CORREÇÃO 2: Adicionar o loop FOREACH para iterar sobre a coleção ($cliente) --}}
                @foreach ($cliente as $cliente)
                <tr>
                    {{-- Aqui usamos o singular ($cliente) --}}
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                   
                <td>
                    <a href="{{ route('cliente.show', $cliente->id) }}" class="btn btn-sm btn-info">
                        Ver Detalhes
                    </a>
                    
                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>
                    
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                            Excluir
                        </button>
                    </form>
                </td>
                </tr>
                @endforeach
        </table>
        @endif
    @endsection
</body>
</html>