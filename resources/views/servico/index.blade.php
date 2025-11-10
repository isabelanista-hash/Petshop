<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Serviços</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Lista de Serviços')

    @section('content')

    <h1 class="mb-4">Serviços Registrados</h1>
    <a href="{{ route('servico.create') }}" class="btn btn-primary">Adicionar Novo Serviço</a>
        <a href="{{ route('animal.index') }}" class="btn btn-secondary">Ver Animais</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Animal</th>
                <th>Dono</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicos as $servico)
            <tr>
                <td>{{ $servico->id }}</td>
                <td>{{ $servico->tipo }}</td>
                <td>{{ $servico->animal->nome ?? 'N/D' }} ({{ $servico->animal->raca ?? 'N/D' }})</td>
                <td>{{ $servico->animal->cliente->nome ?? 'N/D' }}</td>
                <td>R$ {{ number_format($servico->valor, 2, ',', '.') }}</td>
                
                {{-- 🚨 COLUNA DE AÇÕES CORRIGIDA (Próximo passo) --}}
                <td>
                    <a href="{{ route('servico.show', $servico->id) }}" class="btn btn-sm btn-info">
                        Ver Detalhes
                    </a>
                    <a href="{{ route('servico.edit', $servico->id) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>
                    <form action="{{ route('servico.destroy', $servico->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
    </table>
</body>
</html>