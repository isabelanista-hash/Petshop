<nav style="margin-bottom: 20px; padding: 10px; background-color: #f0f0f0;">
    <span style="font-weight: bold;">Menu Principal:</span>
    <a href="{{ route('cliente.index') }}" style="margin-left: 15px;">Clientes</a> |
    <a href="{{ route('animal.index') }}" style="margin-left: 15px;">Animais</a> |
    <a href="{{ route('servico.index') }}" style="margin-left: 15px;">Serviços</a>
</nav>
<nav class="nav nav-tabs mb-4">
    <span class="nav-link disabled" style="font-weight: bold;">Menu Principal:</span>
    <a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a> 
    <a class="nav-link" href="{{ route('animal.index') }}">Animais</a> 
    <a class="nav-link" href="{{ route('servico.index') }}">Serviços</a>
</nav>