<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Animais</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Lista de Animais')

@section('content')
    <h1 class="mb-4">Animais Cadastrados</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('animal.create') }}" class="btn btn-primary">Adicionar Novo Animal</a>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Ver Clientes</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if($animais->isEmpty())
        <div class="alert alert-info">Nenhum animal cadastrado.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Raça</th>
                    <th>Dono (Cliente)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animais as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->nome }}</td>
                    <td>{{ $animal->especie }}</td>
                    <td>{{ $animal->raca }}</td>
                    <td><a href="{{ route('cliente.show', $animal->cliente->id) }}">{{ $animal->cliente->nome ?? 'N/D' }}</a></td>
                    
                    <td>
                        <a href="{{ route('animal.show', $animal->id) }}" class="btn btn-sm btn-info">
                            Ver Detalhes
                        </a>
                        <a href="{{ route('animal.edit', $animal->id) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('animal.destroy', $animal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
</body>
</html>