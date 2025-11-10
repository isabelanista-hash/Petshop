<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Serviço</title>
</head>
<body>
   @extends('layouts.app')

@section('title', 'Cadastrar Novo Serviço')

@section('content')
    <h1 class="mb-4">Adicionar Novo Serviço</h1>
    <a href="{{ route('servico.index') }}" class="btn btn-secondary mb-3">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('servico.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Serviço:</label>
            <input type="text" id="tipo" name="tipo" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$):</label>
            <input type="number" step="0.01" id="valor" name="valor" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" id="data" name="data" class="form-control" required>
        </div>
        
        {{-- CORREÇÃO: Usar TEXTAREA para descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="animal_id" class="form-label">Animal:</label>
            <select id="animal_id" name="animal_id" class="form-select" required>
                <option value="">Selecione o Animal</option>
                {{-- A variável $animais é enviada pelo ServicoController@create --}}
                @foreach($animais as $animal)
                    <option value="{{ $animal->id }}">{{ $animal->nome }} (Dono: {{ $animal->cliente->nome ?? 'N/D' }})</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">Cadastrar Serviço</button>
    </form>
@endsection
</body>
</html>