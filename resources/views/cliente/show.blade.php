@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Cliente: {{ $cliente->nome }}</h1>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">
            Voltar para a Lista
        </a>
    </div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Informações Pessoais
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID:</strong> {{ $cliente->id }}</li>
            <li class="list-group-item"><strong>Telefone:</strong> {{ $cliente->telefone }}</li>
            <li class="list-group-item"><strong>Endereço:</strong> {{ $cliente->endereco }}</li>
            <li class="list-group-item"><strong>Membro Desde:</strong> {{ $cliente->created_at->format('d/m/Y') }}</li>
        </ul>
        <div class="card-footer text-end">
            <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-sm btn-outline-warning">Editar Informações</a>
        </div>
    </div>

    <h2 class="mb-3">Animais Registrados ({{ $cliente->animals->count() }})</h2>
    
    @if($cliente->animals->isEmpty())
        <div class="alert alert-warning">Este cliente não possui animais cadastrados.</div>
    @else
        <div class="row">
            @foreach($cliente->animals as $animal)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        {{ $animal->nome }} ({{ $animal->raca }})
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Espécie:</strong> {{ $animal->especie }}</li>
                        
                        <li class="list-group-item bg-light">
                            <h6 class="mb-2">Serviços:</h6>
                            <ul class="list-unstyled">
                                @forelse($animal->servicos as $servico)
                                    <li>- {{ $servico->tipo }} (R$ {{ number_format($servico->valor, 2, ',', '.') }}) em {{ \Carbon\Carbon::parse($servico->data)->format('d/m/Y') }}</li>
                                @empty
                                    <li>Nenhum serviço registrado.</li>
                                @endforelse
                            </ul>
                        </li>
                    </ul>
                    <div class="card-footer text-end">
                        <a href="{{ route('animal.edit', $animal->id) }}" class="btn btn-sm btn-outline-warning">Editar Animal</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
@endsection