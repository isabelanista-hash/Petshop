@extends('layouts.app')

@section('title', 'Novo Serviço')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-header card-header-pet py-3 bg-white">
                <h4 class="mb-0 fw-bold text-dark"><i class="bi bi-scissors me-2"></i> Cadastrar Serviço</h4>
            </div>
            <div class="card-body p-4">
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $erro) <li>{{ $erro }}</li> @endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('servico.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome do Serviço</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" placeholder="Ex: Banho e Tosa" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Preço (R$)</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number" name="preco" class="form-control" value="{{ old('preco') }}" step="0.01" placeholder="0,00" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3" placeholder="Detalhes do serviço...">{{ old('descricao') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('servico.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-pet px-4">Salvar Serviço</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection