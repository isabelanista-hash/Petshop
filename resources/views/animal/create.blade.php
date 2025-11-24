@extends('layouts.app')

@section('title', 'Novo Pet')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-header card-header-pet py-3 bg-white">
                <h4 class="mb-0 fw-bold text-dark"><i class="bi bi-tencent-qq me-2"></i> Cadastrar Pet</h4>
            </div>
            <div class="card-body p-4">
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('animal.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Quem é o Dono?</label>
                        <select name="cliente_id" class="form-select" required>
                            <option value="">Selecione um cliente...</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nome }} ({{ $cliente->telefone }})
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Não achou? <a href="{{ route('cliente.create') }}">Cadastre o cliente primeiro.</a></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome do Pet</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" placeholder="Ex: Rex" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Espécie</label>
                            <select name="especie" class="form-select" required>
                                <option value="">Selecione...</option>
                                <option value="Cachorro" {{ old('especie') == 'Cachorro' ? 'selected' : '' }}>Cachorro</option>
                                <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Raça</label>
                            <input type="text" name="raca" class="form-control" value="{{ old('raca') }}" placeholder="Ex: Poodle, SRD...">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('animal.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-pet px-4">Salvar Pet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection