<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente: {{ $cliente->nome }}</h1>
    <a href="{{ route('cliente.index') }}">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
        @csrf
        @method('PUT') <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $cliente->nome }}" required>
        </div>
        
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $cliente->telefone }}">
        </div>

        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="{{ $cliente->endereco }}" required>
        </div>
        
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>