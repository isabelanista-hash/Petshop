<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Animais</title>
</head>
<body>
    <h1>Animais Cadastrados</h1>
    <a href="{{ route('animal.create') }}">Adicionar Novo Animal</a>
    |
    <a href="{{ route('cliente.index') }}">Ver Clientes</a>
    <hr>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Raça</th>
                <th>Dono (Cliente)</th> <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animais as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->nome }}</td>
                    <td>{{ $animal->especie }}</td>
                    <td>{{ $animal->raca }}</td>
                    <td>{{ $animal->cliente->nome ?? 'Cliente Não Encontrado' }}</td>
                    <td>
                        <a href="#">Ver</a> | 
                        <a href="#">Editar</a>
                    </td>
                    <td>
    <a href="{{ route('animal.edit', $animal->id) }}"></a> 
    
    |
    
    <form action="{{ route('animal.destroy', $animal->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza? Isso excluirá todos os serviços deste animal.')" style="border: none; background: none; color: blue; cursor: pointer; padding: 0;">Excluir</button>
    </form>
</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>