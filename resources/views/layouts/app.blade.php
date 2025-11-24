<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop - @yield('title', 'Gestão')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- Identidade Visual --- */
        :root {
            --pet-purple: #6f42c1;
            --pet-orange: #fd7e14;
        }
        body { 
            background-color: #f3f4f6; 
            font-family: 'Nunito', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* MENU SUPERIOR */
        .navbar-pet { 
            background: linear-gradient(135deg, var(--pet-purple) 0%, #5a32a3 100%);
            box-shadow: 0 4px 10px rgba(111, 66, 193, 0.2);
            padding: 10px 0;
        }
        .navbar-brand { font-weight: 800; letter-spacing: 0.5px; font-size: 1.4rem; }
        .nav-link { color: rgba(255,255,255,0.9) !important; font-weight: 600; margin-left: 15px; }
        .nav-link:hover { color: var(--pet-orange) !important; transform: translateY(-2px); transition: all 0.3s; }

        /* LOGO (Correção do Tamanho) */
        .logo-pet {
            height: 50px; /* Altura fixa obrigatória */
            width: auto;
            background-color: white;
            border-radius: 50%;
            padding: 3px;
        }

        /* BOTÕES E CARDS */
        .btn-pet { 
            background-color: var(--pet-orange); 
            color: white; 
            font-weight: bold; 
            border-radius: 50px; 
            border: none;
            padding: 8px 24px;
        }
        .btn-pet:hover { 
            background-color: #e36d0d; 
            color: white; 
            transform: scale(1.05); 
            transition: 0.3s; 
        }
        .card-custom { 
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            background: white; 
        }
        .card-header-pet {
            background-color: white;
            border-bottom: 2px solid #f0f0f0;
            color: var(--pet-purple);
            font-weight: bold;
            border-radius: 15px 15px 0 0 !important;
        }
        
        /* RODAPÉ */
        footer { margin-top: auto; background: white; border-top: 1px solid #e9ecef; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-pet navbar-dark mb-5">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-pet me-2">
                PetShop
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente.index') }}">
                            <i class="bi bi-people-fill"></i> Clientes
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animal.index') }}">
                            <i class="bi bi-tencent-qq"></i> Pets
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servico.index') }}">
                            <i class="bi bi-scissors"></i> Serviços
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agendamento.index') }}">
                            <i class="bi bi-calendar-check-fill"></i> Agenda
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <footer class="text-center text-muted py-4 mt-auto bg-white border-top">
        <div class="container">
            <p class="mb-1 fw-bold text-dark">🐾 PetShop &copy; 2025</p>
            <small style="font-size: 0.85rem; line-height: 1.5;">
                Sistema com o intuito acadêmico desenvolvido pelos alunos 
                <span class="fw-bold text-dark">Isabela Nista</span> e <span class="fw-bold text-dark">Ítalo Martins</span><br>
                para a disciplina de <strong class="text-primary">Desenvolvimento Back-End</strong> do curso de T.I. do Colégio Santo Inácio.
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>