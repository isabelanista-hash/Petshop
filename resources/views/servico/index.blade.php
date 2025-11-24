@extends('layouts.app')

@section('title', 'Lista de Serviços')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">Catálogo de Serviços</h2>
                <p class="text-muted m-0">Gerencie os serviços oferecidos e preços</p>
            </div>
            <a href="{{ route('servico.create') }}" class="btn btn-pet shadow">
                <i class="bi bi-plus-lg"></i> Novo Serviço
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
                @if($servicos->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted">Nenhum serviço cadastrado.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-secondary">ID</th>
                                    <th class="py-3 text-secondary">Nome do Serviço</th>
                                    <th class="py-3 text-secondary">Descrição</th>
                                    <th class="py-3 text-secondary">Preço Padrão</th>
                                    <th class="pe-4 py-3 text-end text-secondary">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicos as $servico)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">#{{ $servico->id }}</td>
                                    <td class="fw-bold text-dark">
                                        <i class="bi bi-scissors text-purple me-2"></i> {{ $servico->nome }}
                                    </td>
                                    <td class="text-muted small">{{ Str::limit($servico->descricao, 50) }}</td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 fs-6">
                                            R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="btn-group">
                                            <a href="{{ route('servico.edit', $servico->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('servico.destroy', $servico->id) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remover serviço?')"><i class="bi bi-trash"></i></button>
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