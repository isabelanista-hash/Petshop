<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Petshop" style="height: 100px; margin-right: 55px; vertical-align: middle;">
            <h2 class="h3 mb-0 text-primary">Sistema Petshop</h2>
        </div>
        
        @include('_menu')

        @yield('content')
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>