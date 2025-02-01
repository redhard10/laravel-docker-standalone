<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <!-- Filament CSS -->
    <link rel="stylesheet" href="{{ mix('css/filament.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- App JS -->
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Filament JS -->
    <script src="{{ mix('js/filament.js') }}"></script>
</body>
</html>
