<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css']) 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    <style>
        /* Oculta el texto del sidebar cuando está contraído */
        .w-16 .sidebar-text {
            display: none;
        }

        /* Oculta el logo grande cuando el sidebar está contraído */
        .w-16 .down-text {
            display: none;
        }
        
        /* Oculta el icono de usuario y la versión cuando el sidebar está contraído */
        .w-16 .sidebar-user-icon {
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

        /* Ajusta el icono cuando el sidebar está colapsado */
        .w-16 .bg-white\/10 {
            padding-left: 0.5rem !important;  /* Ajusta el padding izquierdo */
            padding-right: 0.5rem !important; /* Ajusta el padding derecho */
            justify-content: center !important; /* Centra el icono */
        }

        /* Oculta el texto del usuario al colapsar */
        .w-16 .sidebar-user-info {
            display: none;
        }

        /* Opcional: Reduce el tamaño del icono si es necesario */
        .w-16 .fa-user-circle {
            font-size: 1.25rem !important;
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

            // Alternar clases para el sidebar y el contenido principal
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('w-64');
            main.classList.toggle('ml-16');
            main.classList.toggle('ml-64');
            icon.classList.toggle('rotate-180');

            // Ocultar/mostrar textos al colapsar
            document.querySelectorAll('.sidebar-text').forEach(el => {
                el.classList.toggle('hidden');
            });
            }
                        </script>


    @yield('scripts')
    @stack('scripts')        
        
</body>
</html>
