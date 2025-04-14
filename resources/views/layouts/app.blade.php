<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Vite CSS --}}
    @vite([
        'resources/css/app.css',
        'resources/css/sidebar.css',
        'resources/js/app.js',
        'resources/js/sidebar.js',
    ])
    
    {{-- FontAwesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    
    {{-- Livewire --}}
    @livewireStyles
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

    {{-- Livewire Scripts --}}
    @livewireScripts
    @stack('scripts')
    @yield('scripts')
</body>
</html>
