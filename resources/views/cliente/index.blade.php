@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">Gerenciar Clientes</h2>
                <p class="text-muted m-0">Lista completa de tutores cadastrados</p>
            </div>
            <a href="{{ route('cliente.create') }}" class="btn btn-pet shadow">
                <i class="bi bi-person-plus-fill"></i> Novo Cliente
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom">
            <div class="card-body p-0">
                
                @if($clientes->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-3">Nenhum cliente cadastrado ainda.</p>
                        <a href="{{ route('cliente.create') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">
                            Cadastrar o Primeiro
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-secondary">ID</th>
                                    <th class="py-3 text-secondary">Nome</th>
                                    <th class="py-3 text-secondary">Contato</th>
                                    <th class="py-3 text-secondary">Localização</th> <th class="pe-4 py-3 text-end text-secondary">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $c)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">#{{ $c->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                            <span class="fw-bold text-dark">{{ $c->nome }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $c->telefone }}</td>
                                    
                                    <td class="text-muted small">
                                        <i class="bi bi-geo-alt text-danger"></i> 
                                        {{ $c->cidade }}/{{ $c->estado }} - {{ $c->bairro }}
                                    </td>

                                    <td class="pe-4 text-end">
                                        <div class="btn-group">
                                            <a href="{{ route('cliente.show', $c->id) }}" class="btn btn-sm btn-outline-primary" title="Ver Detalhes">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            
                                            <a href="{{ route('cliente.edit', $c->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            
                                            <form action="{{ route('cliente.destroy', $c->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="if(confirm('Tem certeza que deseja excluir {{ $c->nome }}?')) { this.closest('form').submit(); }">
                                                    <i class="bi bi-trash"></i>
                                                </button>
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