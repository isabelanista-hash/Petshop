@extends('layouts.app')

@section('title', 'Painel de Controle')

@section('content')
<div class="row align-items-center mb-5">
    <div class="col-md-6">
        <h2 class="fw-bold text-dark">Painel de Controle</h2>
        <p class="text-muted">Bem-vindo ao sistema de gestão do PetShop.</p>
    </div>
    <div class="col-md-6 text-end">
        <span class="badge bg-light text-dark border p-2">📅 Hoje: {{ date('d/m/Y') }}</span>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card card-custom h-100 border-start border-5 border-info">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-people fs-2 text-info"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase mb-1">Clientes</h6>
                    <h3 class="fw-bold mb-0">{{ \App\Models\Cliente::count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom h-100 border-start border-5 border-warning">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-tencent-qq fs-2 text-warning"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase mb-1">Pets</h6>
                    <h3 class="fw-bold mb-0">{{ \App\Models\Animal::count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom h-100 border-start border-5 border-success">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-cash-coin fs-2 text-success"></i>
                </div>
                <div>
                    <h6 class="text-muted text-uppercase mb-1">Faturamento</h6>
                    <h3 class="fw-bold mb-0">R$ {{ number_format($faturamento, 2, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10 text-center">
        <div class="card card-custom p-5">
            <h4 class="mb-4 fw-bold">Acesso Rápido</h4>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                
                <a href="{{ route('cliente.create') }}" class="btn btn-outline-primary btn-lg rounded-pill px-4">
                    <i class="bi bi-person-plus"></i> Novo Cliente
                </a>
                
                <a href="{{ route('animal.create') }}" class="btn btn-outline-warning btn-lg rounded-pill px-4">
                    <i class="bi bi-tencent-qq"></i> Novo Pet
                </a>

                <a href="{{ route('agendamento.create') }}" class="btn btn-pet btn-lg rounded-pill px-5 shadow">
                    <i class="bi bi-calendar-plus"></i> Agendar Serviço
                </a>

            </div>
        </div>
    </div>
</div>
@endsection