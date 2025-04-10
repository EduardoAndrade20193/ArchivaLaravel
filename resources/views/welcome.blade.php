<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido - Archiva</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-fondo text-white">

    <!-- Contenedor Principal -->
    <div class="min-h-screen flex flex-col items-center justify-center">

        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/logo_set.png') }}" alt="Secretaría de Educación de Tamaulipas" class="h-32">
        </div>

        <!-- Mensaje de Bienvenida -->
        <h1 class="text-4xl font-bold text-dorado mb-4">Bienvenido al Portal de Gestion "Archiva"</h1>
        <p class="text-lg text-gris mb-8 text-center px-4">
            En la Secretaría de Educación de Tamaulipas, nos comprometemos con brindar una educación de calidad para todos. Explora nuestros recursos y servicios.
        </p>

        <!-- Botón de Ingreso -->
        <a href="{{ route('dashboard') }}" class="bg-verde hover:bg-verdeOscuro text-white font-semibold px-6 py-3 rounded-lg transition">
            Ingresar al Sistema
        </a>

    </div>

</body>
</html>
