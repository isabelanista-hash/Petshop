<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Animal</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Cadastrar Novo Animal')

@section('content')
    <h1 class="mb-4">Adicionar Novo Animal</h1>
    <a href="{{ route('animal.index') }}" class="btn btn-secondary mb-3">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('animal.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Animal:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="especie" class="form-label">Espécie:</label>
            <input type="text" id="especie" name="especie" class="form-control">
        </div>

        <div class="mb-3">
            <label for="raca" class="form-label">Raça:</label>
            <input type="text" id="raca" name="raca" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" class="form-select" required>
                <option value="">Selecione o Cliente</option>
                {{-- A variável $clientes é enviada pelo AnimalController@create --}}
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">Cadastrar Animal</button>
    </form>
@endsection
</body>
</html>