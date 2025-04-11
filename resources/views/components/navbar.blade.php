<nav class="fixed top-0 left-0 w-full z-50 bg-[#691C32] shadow p-2.5 flex justify-between items-center">
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/Logo-gobt.png') }}" alt="Logo" class="h-10 w-auto">
        <h1 class="text-xl font-bold text-white p-3">Archiva System</h1>
    </div>
    <div class="text-white">
        @auth
            <span class="mr-4">Hola, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button class="bg-verde hover:bg-[#10312B] px-4 py-2 rounded transition">Cerrar sesión</button>
            </form>
        @endauth
    </div>
</nav>
