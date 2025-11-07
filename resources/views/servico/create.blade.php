<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Serviço</title>
</head>
<body>
    <h1>Adicionar Novo Serviço</h1>
    <a href="{{ route('servico.index') }}">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('servico.store') }}">
        @csrf
        
        <div>
            <label for="tipo">Tipo de Serviço:</label>
            <input type="text" id="tipo" name="tipo" required>
        </div>
        
        <div>
            <label for="valor">Valor (R$):</label>
            <input type="number" step="0.01" id="valor" name="valor" required>
        </div>
        
        <div>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
        </div>
        
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"></textarea>
        </div>

        <div>
            <label for="animal_id">Animal:</label>
            <select id="animal_id" name="animal_id" required>
                <option value="">Selecione o Animal</option>
                @foreach($animais as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->nome }} (Dono: {{ $animal->cliente->nome ?? 'N/D' }})</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Cadastrar Serviço</button>
    </form>
</body>
</html>