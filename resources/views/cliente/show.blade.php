@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-custom h-100">
            <div class="card-body text-center p-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex justify-content-center align-items-center mb-3" style="width: 100px; height: 100px;">
                    <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                </div>
                
                <h4 class="fw-bold mb-1">{{ $cliente->nome }}</h4>
                <p class="text-muted small mb-4">Cliente #{{ $cliente->id }}</p>

                <div class="d-grid gap-2 mb-4">
                    <a href="https://wa.me/55{{ preg_replace('/\D/', '', $cliente->telefone) }}" target="_blank" class="btn btn-success text-white fw-bold">
                        <i class="bi bi-whatsapp me-2"></i> Chamar no WhatsApp
                    </a>
                    <a href="mailto:{{ $cliente->email }}" class="btn btn-outline-secondary fw-bold">
                        <i class="bi bi-envelope me-2"></i> Enviar Email
                    </a>
                </div>

                <hr>

                <div class="text-start mt-4">
                    <p class="mb-2">
                        <strong class="text-secondary"><i class="bi bi-telephone me-2"></i>Telefone:</strong><br>
                        <span class="ms-4">{{ $cliente->telefone }}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="text-secondary"><i class="bi bi-envelope me-2"></i>Email:</strong><br>
                        <span class="ms-4">{{ $cliente->email ?? 'Não informado' }}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="text-secondary"><i class="bi bi-geo-alt me-2"></i>Endereço:</strong><br>
                        <span class="ms-4">
                            {{ $cliente->logradouro }}, {{ $cliente->numero }} <br>
                            <span class="ms-4 text-muted small">
                                {{ $cliente->bairro }} - {{ $cliente->cidade }}/{{ $cliente->estado }}
                            </span>
                            @if($cliente->complemento)
                                <br><span class="ms-4 text-muted small">({{ $cliente->complemento }})</span>
                            @endif
                        </span>
                    </p>
                </div>
            </div>
            <div class="card-footer bg-white border-0 p-4 pt-0">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-sm btn-outline-warning w-100 me-2">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <a href="{{ route('cliente.index') }}" class="btn btn-sm btn-light text-secondary w-100">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card card-custom p-3 border-start border-4 border-warning">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 p-3 rounded me-3 text-warning">
                            <i class="bi bi-tencent-qq fs-4"></i>
                        </div>
                        <div>
                            <small class="text-muted text-uppercase fw-bold">Total de Pets</small>
                            {{-- ATENÇÃO: Verifique se no model é 'animals' ou 'animais' --}}
                            <h4 class="mb-0 fw-bold">{{ $cliente->animals ? $cliente->animals->count() : 0 }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom p-3 border-start border-4 border-success">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded me-3 text-success">
                            <i class="bi bi-cash-stack fs-4"></i>
                        </div>
                        <div>
                            <small class="text-muted text-uppercase fw-bold">Total Gasto</small>
                            <h4 class="mb-0 fw-bold">R$ 0,00</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-header card-header-pet bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="bi bi-heart-fill text-danger me-2"></i> Meus Pets</h5>
                <a href="{{ route('animal.create') }}" class="btn btn-sm btn-pet">
                    <i class="bi bi-plus-lg"></i> Adicionar Pet
                </a>
            </div>
            <div class="card-body">
                
                @if($cliente->animals && $cliente->animals->count() > 0)
                    <div class="row g-3">
                        @foreach($cliente->animals as $pet)
                        <div class="col-md-6">
                            <div class="border rounded p-3 d-flex align-items-center bg-light hover-shadow transition">
                                
                                <div class="bg-white p-2 rounded-circle shadow-sm me-3">
                                    @if($pet->especie == 'Gato')
                                        <i class="bi bi-github fs-2 text-secondary"></i> @elseif($pet->especie == 'Roedor')
                                        <i class="bi bi-circle-fill fs-2 text-warning"></i> @else
                                        <i class="bi bi-tencent-qq fs-2 text-primary"></i> @endif
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0">{{ $pet->nome }}</h6>
                                    <small class="text-muted">{{ $pet->raca }} ({{ $pet->especie }})</small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('animal.edit', $pet->id) }}">Editar</a></li>
                                        <li>
                                            <form action="{{ route('animal.destroy', $pet->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger" onclick="return confirm('Remover este pet?')">Remover</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-emoji-frown fs-1 mb-3 d-block"></i>
                        <p>Este cliente ainda não tem pets cadastrados.</p>
                        <a href="{{ route('animal.create') }}" class="btn btn-outline-primary btn-sm">
                            Cadastrar o primeiro pet
                        </a>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection