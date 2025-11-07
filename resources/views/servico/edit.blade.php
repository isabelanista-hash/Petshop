<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Serviço</title>
</head>
<body>
    <h1>Editar Serviço: {{ $servico->tipo }}</h1>
    <a href="{{ route('servico.index') }}">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('servico.update', $servico->id) }}">
        @csrf
        @method('PUT') 
        
        <div>
            <label for="tipo">Tipo de Serviço:</label>
            <input type="text" id="tipo" name="tipo" value="{{ $servico->tipo }}" required>
        </div>
        
        <div>
            <label for="valor">Valor (R$):</label>
            <input type="number" step="0.01" id="valor" name="valor" value="{{ $servico->valor }}" required>
        </div>
        
        <div>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" value="{{ $servico->data }}" required>
        </div>
        
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ $servico->descricao }}</textarea>
        </div>

        <div>
            <label for="animal_id">Animal:</label>
            <select id="animal_id" name="animal_id" required>
                @foreach($animais as $animal)
                    <option value="{{ $animal->id }}" 
                        {{ $animal->id == $servico->animal_id ? 'selected' : '' }}> {{ $animal->nome }} (Dono: {{ $animal->cliente->nome ?? 'N/D' }})
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>