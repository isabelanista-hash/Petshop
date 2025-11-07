<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Animal</title>
</head>
<body>
    <h1>Editar Animal: {{ $animal->nome }}</h1>
    <a href="{{ route('animal.index') }}">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('animal.update', $animal->id) }}">
        @csrf
        @method('PUT')
        
        <div>
            <label for="nome">Nome do Animal:</label>
            <input type="text" id="nome" name="nome" value="{{ $animal->nome }}" required>
        </div>
        
        <div>
            <label for="cliente_id">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $animal->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>