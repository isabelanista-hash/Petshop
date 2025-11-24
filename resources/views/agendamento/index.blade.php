@extends('layouts.app')

@section('title', 'Agenda de Serviços')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark m-0">Agenda de Serviços</h2>
                <p class="text-muted m-0">Consulte os horários marcados</p>
            </div>
            <a href="{{ route('agendamento.create') }}" class="btn btn-pet shadow">
                <i class="bi bi-calendar-plus me-2"></i> Novo Agendamento
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
                @if($agendamentos->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted">Nenhum serviço agendado.</p>
                        <a href="{{ route('agendamento.create') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">Agendar</a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 text-secondary">Data / Hora</th>
                                    <th class="text-secondary">Pet</th>
                                    <th class="text-secondary">Serviço</th>
                                    <th class="text-secondary">Status</th>
                                    <th class="pe-4 text-end text-secondary">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendamentos as $animal)
                                    @foreach($animal->servicos as $servico)
                                    <tr>
                                        <td class="ps-4">
                                            <span class="fw-bold text-dark">{{ date('d/m/Y', strtotime($servico->pivot->data_agendamento)) }}</span><br>
                                            <small class="text-muted">{{ date('H:i', strtotime($servico->pivot->data_agendamento)) }}h</small>
                                        </td>

                                        <td>
                                            <span class="fs-5 me-1">
                                                @if($animal->especie == 'Cachorro') 🐶
                                                @elseif($animal->especie == 'Gato') 🐱
                                                @elseif($animal->especie == 'Roedor') 🐹
                                                @elseif($animal->especie == 'Ave') 🦜
                                                @else 🐾 @endif
                                            </span>
                                            <span class="fw-bold text-primary">{{ $animal->nome }}</span><br>
                                            <small class="text-muted">{{ $animal->cliente->nome }}</small>
                                        </td>

                                        <td>
                                            <span class="badge bg-light text-dark border">{{ $servico->nome }}</span>
                                            <div class="small text-success mt-1 fw-bold">R$ {{ number_format($servico->preco, 2, ',', '.') }}</div>
                                        </td>

                                        <td>
                                            @if($servico->pivot->status == 'agendado')
                                                <span class="badge bg-warning text-dark">Agendado</span>
                                            @else
                                                <span class="badge bg-success">Concluído</span>
                                            @endif
                                        </td>

                                        <td class="pe-4 text-end">
                                            @if($servico->pivot->status == 'agendado')
                                                <form action="{{ route('agendamento.concluir', $servico->pivot->id) }}" method="POST" class="d-inline">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Finalizar Serviço">
                                                        <i class="bi bi-check-lg"></i> Concluir
                                                    </button>
                                                </form>
                                            @else
                                                <button class="btn btn-sm btn-light text-muted" disabled><i class="bi bi-check2-all"></i> Baixado</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
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