@extends('layouts.app')

@section('title', 'Detalhes do Animal')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Animal: {{ $animal->nome }}</h1>
        <a href="{{ route('animal.index') }}" class="btn btn-secondary">
            Voltar para a Lista
        </a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    Informações do Animal
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $animal->id }}</li>
                    <li class="list-group-item"><strong>Espécie:</strong> {{ $animal->especie }}</li>
                    <li class="list-group-item"><strong>Raça:</strong> {{ $animal->raca }}</li>
                </ul>
                <div class="card-footer text-end">
                    <a href="{{ route('animal.edit', $animal->id) }}" class="btn btn-sm btn-outline-warning">Editar Animal</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    Informações do Dono (Cliente)
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nome:</strong> {{ $animal->cliente->nome }}</li>
                    <li class="list-group-item"><strong>Telefone:</strong> {{ $animal->cliente->telefone }}</li>
                    <li class="list-group-item">
                        <a href="{{ route('cliente.show', $animal->cliente->id) }}" class="btn btn-sm btn-outline-light text-primary">Ver Detalhes do Cliente</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <h2 class="mt-4 mb-3">Histórico de Serviços ({{ $animal->servicos->count() }})</h2>
    
    @if($animal->servicos->isEmpty())
        <div class="alert alert-warning">Este animal não possui serviços registrados.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Tipo de Serviço</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animal->servicos as $servico)
                <tr>
                    <td>{{ $servico->tipo }}</td>
                    <td>{{ \Carbon\Carbon::parse($servico->data)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($servico->valor, 2, ',', '.') }}</td>
                    <td>{{ $servico->descricao }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    <div class="text-end mt-4">
        <a href="{{ route('servico.create') }}?animal_id={{ $animal->id }}" class="btn btn-success">
            Registrar Novo Serviço para {{ $animal->nome }}
        </a>
    </div>
@endsection