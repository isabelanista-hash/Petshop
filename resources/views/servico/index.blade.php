<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Serviços</title>
</head>
<body>
    <h1>Serviços Registrados</h1>
    <a href="{{ route('servico.create') }}">Adicionar Novo Serviço</a>
    |
    <a href="{{ route('animal.index') }}">Ver Animais</a>
    <hr>
    
    <table border="1">
        <thead>
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
            @foreach ($servico as $servico)
                <tr>
                    <td>{{ $servico->id }}</td>
                    <td>{{ $servico->tipo }}</td>
                    <td>{{ $servico->animal->nome ?? 'N/D' }} ({{ $servico->animal->raca ?? 'N/D' }})</td>
                    <td>{{ $servico->animal->cliente->nome ?? 'N/D' }}</td>
                    <td>R$ {{ number_format($servico->valor, 2, ',', '.') }}</td>
                    <td><a href="#">Ver</a> | <a href="#">Editar</a></td>
                <td>
    <a href="{{ route('servico.edit', $servico->id) }}"></a> 
    
    |
    
    <form action="{{ route('servico.destroy', $servico->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este serviço?')" style="border: none; background: none; color: blue; cursor: pointer; padding: 0;">Excluir</button>
    </form>
</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>