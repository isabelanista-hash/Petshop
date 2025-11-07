<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Animal</title>
</head>
<body>
    <h1>Adicionar Novo Animal</h1>
    <a href="{{ route('animal.index') }}">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('animal.store') }}">
        @csrf
        
        <div>
            <label for="nome">Nome do Animal:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        
        <div>
            <label for="especie">Espécie:</label>
            <input type="text" id="especie" name="especie">
        </div>

        <div>
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca">
        </div>
        
        <div>
            <label for="cliente_id">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" required>
                <option value="">Selecione o Cliente</option>
                @foreach($cliente as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Cadastrar Animal</button>
    </form>
</body>
</html>