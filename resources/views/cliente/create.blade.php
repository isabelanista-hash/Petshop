<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Cliente</title>
</head>
<body>
    <h1>Adicionar Novo Cliente</h1>
    <a href="{{ route('cliente.index') }}">Voltar para a Lista</a>
    <hr>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">
        </div>

        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        
        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>