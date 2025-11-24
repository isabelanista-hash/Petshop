@extends('layouts.app')

@section('title', 'Lista de Pets')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">Gerenciar Pets</h2>
                <p class="text-muted m-0">Lista de animais cadastrados</p>
            </div>
            <a href="{{ route('animal.create') }}" class="btn btn-pet shadow">
                <i class="bi bi-plus-lg"></i> Novo Pet
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom">
            <div class="card-body p-0">
                @if($animais->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted">Nenhum pet cadastrado.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-secondary">ID</th>
                                    <th class="py-3 text-secondary">Nome do Pet</th>
                                    <th class="py-3 text-secondary">Espécie/Raça</th>
                                    <th class="py-3 text-secondary">Tutor (Dono)</th>
                                    <th class="pe-4 py-3 text-end text-secondary">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animais as $pet)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">#{{ $pet->id }}</td>
                                    <td class="fw-bold text-dark">
                                        <span class="fs-5 me-2">
                                            @if($pet->especie == 'Cachorro') 🐶
                                            @elseif($pet->especie == 'Gato') 🐱
                                            @else 🐾
                                            @endif
                                        </span>
                                        {{ $pet->nome }}
                                    </td>
                                    <td>{{ $pet->especie }} <span class="text-muted small">({{ $pet->raca ?? 'SRD' }})</span></td>
                                    <td>
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                                            <i class="bi bi-person-fill"></i> {{ $pet->cliente->nome }}
                                        </span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group">
                                            <a href="{{ route('animal.edit', $pet->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('animal.destroy', $pet->id) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir pet?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection