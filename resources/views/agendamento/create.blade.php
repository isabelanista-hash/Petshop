@extends('layouts.app')

@section('title', 'Novo Agendamento')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom shadow-lg">
            <div class="card-header card-header-pet py-4 bg-white border-bottom-0">
                <h4 class="mb-0 fw-bold text-dark"><i class="bi bi-calendar-check-fill me-2"></i> Agendar Serviço</h4>
            </div>

            <div class="card-body p-4 pt-0">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $erro) <li>{{ $erro }}</li> @endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('agendamento.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Qual é o Pet?</label>
                        <select name="animal_id" class="form-select form-select-lg" required>
                            <option value="">Selecione o animal...</option>
                            @foreach($animais as $animal)
                                <option value="{{ $animal->id }}">
                                    {{ $animal->nome }} ({{ $animal->raca }}) - Dono: {{ $animal->cliente->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Qual Serviço?</label>
                        <select name="servico_id" class="form-select" required>
                            <option value="">Selecione o serviço...</option>
                            @foreach($servicos as $servico)
                                <option value="{{ $servico->id }}">
                                    {{ $servico->nome }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Data</label>
                            <input type="date" name="data" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Hora</label>
                            <input type="time" name="hora" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Observação <small class="text-muted fw-normal">(Opcional)</small></label>
                        <textarea name="observacao" class="form-control" rows="2" placeholder="Ex: Cuidado, ele morde..."></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-pet btn-lg shadow-sm">Confirmar Agendamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection