<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Cliente</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Adicionar Novo Cliente')

@section('content')
    <h1 class="mb-4">Adicionar Novo Cliente</h1>
    <a href="{{ route('cliente.index') }}" class="btn btn-secondary mb-3">Voltar para a Lista</a>
    <hr>

    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control">
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Cadastrar Cliente</button>
    </form>
@endsection
</body>
</html>