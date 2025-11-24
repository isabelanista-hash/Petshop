@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        
        <div class="card card-custom shadow-lg">
            <div class="card-header card-header-pet py-4 bg-white border-bottom-0">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3">
                        <i class="bi bi-pencil-square fs-3"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold text-dark">Editar Cliente</h4>
                        <p class="text-muted mb-0 small">Atualize os dados do tutor</p>
                    </div>
                </div>
            </div>

            <div class="card-body p-4 pt-0">
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4">
                        <div class="d-flex">
                            <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                            <div>
                                <strong>Atenção!</strong>
                                <ul class="mb-0 mt-1 ps-3">
                                    @foreach($errors->all() as $erro)
                                        <li>{{ $erro }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h6 class="text-muted text-uppercase fw-bold mb-3">Dados Pessoais</h6>
                    <div class="row mb-4">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Telefone</label>
                            <input type="text" name="telefone" class="form-control" 
                                   value="{{ old('telefone', $cliente->telefone) }}" 
                                   oninput="mascaraTelefone(this)" 
                                   maxlength="13" 
                                   required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}">
                        </div>
                    </div>

                    <hr>

                    <h6 class="text-muted text-uppercase fw-bold mb-3">Endereço</h6>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">CEP</label>
                            <div class="input-group">
                                <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep', $cliente->cep) }}" maxlength="9" required>
                                <button type="button" class="btn btn-secondary" onclick="buscarCep()">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-7 mb-3">
                            <label class="form-label fw-bold">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control bg-light" value="{{ old('cidade', $cliente->cidade) }}" readonly required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label fw-bold">UF</label>
                            <input type="text" name="estado" id="estado" class="form-control bg-light" value="{{ old('estado', $cliente->estado) }}" readonly required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label class="form-label fw-bold">Rua / Logradouro</label>
                            <input type="text" name="logradouro" id="logradouro" class="form-control bg-light" value="{{ old('logradouro', $cliente->logradouro) }}" readonly required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label fw-bold">Número</label>
                            <input type="text" name="numero" id="numero" class="form-control border-primary" value="{{ old('numero', $cliente->numero) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label fw-bold">Bairro</label>
                            <input type="text" name="bairro" id="bairro" class="form-control bg-light" value="{{ old('bairro', $cliente->bairro) }}" readonly required>
                        </div>
                        <div class="col-md-7 mb-3">
                            <label class="form-label fw-bold">Complemento <small class="text-muted fw-normal">(Opcional)</small></label>
                            <input type="text" name="complemento" class="form-control" value="{{ old('complemento', $cliente->complemento) }}">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('cliente.index') }}" class="btn btn-light text-secondary px-4 fw-bold">Cancelar</a>
                        <button type="submit" class="btn btn-pet px-5 shadow-sm">Atualizar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function buscarCep() {
        let cep = document.getElementById('cep').value.replace(/\D/g, '');
        
        if (cep.length !== 8) {
            alert('CEP inválido!');
            return;
        }

        document.getElementById('logradouro').value = "...";
        document.getElementById('bairro').value = "...";
        document.getElementById('cidade').value = "...";
        document.getElementById('estado').value = "...";

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(res => res.json())
            .then(data => {
                if(data.erro) {
                    alert('CEP não encontrado!');
                    document.getElementById('logradouro').readOnly = false;
                    document.getElementById('bairro').readOnly = false;
                    document.getElementById('cidade').readOnly = false;
                    document.getElementById('estado').readOnly = false;
                    document.getElementById('logradouro').value = "";
                } else {
                    document.getElementById('logradouro').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                    document.getElementById('numero').focus();
                }
            })
            .catch(() => alert('Erro ao buscar CEP.'));
    }
    
    document.getElementById('cep').addEventListener('blur', buscarCep);
</script>
@endsection