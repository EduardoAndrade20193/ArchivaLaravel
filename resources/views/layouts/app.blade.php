<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Styles --}}
    @vite(['resources/css/app.css'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    @livewireStyles

    {{-- Custom Styles --}}
    <style>
        /* Sidebar styles */
        .w-16 .sidebar-text, .w-16 .down-text, .w-16 .sidebar-user-icon, .w-16 .sidebar-user-info {
            display: none;
        }
        .w-64 .sidebar-logo-mini {
            display: none;
        }
        .rotate-180 {
            transform: rotate(180deg);
        }
        .w-16 .bg-white\/10 {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
            justify-content: center !important;
        }
        .w-16 .fa-user-circle {
            font-size: 1.25rem !important;
        }
    </style>
</head>

<body class="bg-white min-h-screen">
    <div class="flex">
        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content --}}
        <div id="main-content" class="flex-1 flex flex-col min-h-screen transition-all duration-300 ml-64">
            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Main Section --}}
            <main class="bg-beige text-fondo flex-1 p-6 rounded-lg shadow">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('components.footer')
        </div>
    </div>

    {{-- Scripts --}}
    <script>
        let sidebarExpanded = true;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('main-content');
            const icon = document.getElementById('toggleIcon');

            // Toggle sidebar and main content classes
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('w-64');
            main.classList.toggle('ml-16');
            main.classList.toggle('ml-64');
            icon.classList.toggle('rotate-180');

            // Toggle visibility of sidebar text
            document.querySelectorAll('.sidebar-text').forEach(el => {
                el.classList.toggle('hidden');
            });
        }
    </script>

    @livewireScripts
    @stack('scripts')
    @yield('scripts')
</body>
</html>