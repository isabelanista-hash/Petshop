<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Animal</title>
</head>
<body>
   @extends('layouts.app')

@section('title', 'Editar Animal')

@section('content')
    <h1 class="mb-4">Editar Animal: {{ $animal->nome }}</h1>
    <a href="{{ route('animal.index') }}" class="btn btn-secondary mb-3">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('animal.update', $animal->id) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Animal:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $animal->nome }}" required>
        </div>
        
        <div class="mb-3">
            <label for="especie" class="form-label">Espécie:</label>
            <input type="text" id="especie" name="especie" class="form-control" value="{{ $animal->especie }}">
        </div>

        <div class="mb-3">
            <label for="raca" class="form-label">Raça:</label>
            <input type="text" id="raca" name="raca" class="form-control" value="{{ $animal->raca }}">
        </div>
        
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" class="form-select" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $animal->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-warning">Salvar Alterações</button>
    </form>
@endsection
</body>
</html>