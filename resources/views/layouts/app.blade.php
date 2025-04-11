<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    <style>
        /* Oculta el texto del sidebar cuando está contraído */
        .w-16 .sidebar-text {
            display: none;
        }

        /* Oculta el logo grande cuando el sidebar está contraído */
        .w-16 .sidebar-logo-full {
            display: none;
        }

        /* Muestra un logo reducido o icono cuando está contraído */
        .w-64 .sidebar-logo-mini {
            display: none;
        }

        /* Anima el icono de la flecha */
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="bg-white min-h-screen">

    <div class="flex">
        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Contenedor principal --}}
        <div id="main-content" class="flex-1 flex flex-col min-h-screen transition-all duration-300 ml-64">

            
            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Contenido principal --}}
            <main class="bg-beige text-fondo flex-1 p-6 rounded-lg shadow">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('components.footer')
        </div>
    </div>

    <script>
        let sidebarExpanded = true;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('main-content');
            const icon = document.getElementById('toggleIcon');

            sidebarExpanded = !sidebarExpanded;

            if (sidebarExpanded) {
                sidebar.classList.remove('w-16');
                sidebar.classList.add('w-64');
                main.classList.remove('ml-16');
                main.classList.add('ml-64');
                icon.classList.remove('rotate-180');
            } else {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-16');
                main.classList.remove('ml-64');
                main.classList.add('ml-16');
                icon.classList.add('rotate-180');
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
