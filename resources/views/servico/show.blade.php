@extends('layouts.app')

@section('title', 'Detalhes do Serviço')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Serviço: {{ $servico->tipo }}</h1>
        <a href="{{ route('servico.index') }}" class="btn btn-secondary">
            Voltar para a Lista
        </a>
    </div>

    <div class="card mb-5">
        <div class="card-header bg-success text-white">
            Detalhes do Serviço
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Tipo:</strong> {{ $servico->tipo }}</li>
            <li class="list-group-item"><strong>Valor:</strong> R$ {{ number_format($servico->valor, 2, ',', '.') }}</li>
            <li class="list-group-item"><strong>Data:</strong> {{ \Carbon\Carbon::parse($servico->data)->format('d/m/Y') }}</li>
            <li class="list-group-item"><strong>Descrição:</strong> {{ $servico->descricao }}</li>
        </ul>
    </div>
    
    <h2 class="mt-4 mb-3">Animal e Dono Associados</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    Detalhes do Animal
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nome:</strong> {{ $servico->animal->nome ?? 'N/D' }}</li>
                    <li class="list-group-item"><strong>Espécie:</strong> {{ $servico->animal->especie ?? 'N/D' }}</li>
                    <li class="list-group-item"><strong>Raça:</strong> {{ $servico->animal->raca ?? 'N/D' }}</li>
                    <li class="list-group-item">
                        <a href="{{ route('animal.show', $servico->animal->id) }}" class="btn btn-sm btn-outline-light text-primary">Ver Detalhes do Animal</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    Detalhes do Cliente
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nome:</strong> {{ $servico->animal->cliente->nome ?? 'N/D' }}</li>
                    <li class="list-group-item"><strong>Telefone:</strong> {{ $servico->animal->cliente->telefone ?? 'N/D' }}</li>
                    <li class="list-group-item">
                        <a href="{{ route('cliente.show', $servico->animal->cliente->id) }}" class="btn btn-sm btn-outline-light text-primary">Ver Detalhes do Cliente</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="text-end mt-4">
        <a href="{{ route('servico.edit', $servico->id) }}" class="btn btn-warning">Editar Serviço</a>
    </div>

@endsection
