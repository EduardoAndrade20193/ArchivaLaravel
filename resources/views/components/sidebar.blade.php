<aside 
    id="sidebar" 
    class="fixed top-0 left-0 h-full w-64 bg-vinoOscuro text-white transition-all duration-300 z-40 overflow-y-auto">

    {{-- Logo + Botón para ocultar --}}
    <div class="flex items-center justify-between px-4 py-4 bg-white border-b border-bosque">
    <img 
        src="{{ asset('images/LOGOS-ESTADO.png') }}" 
        alt="Logo" 
        class="h-10 w-auto cursor-pointer" 
        onclick="toggleSidebar()"
    >
    <button onclick="toggleSidebar()" class="text-bosque focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" id="toggleIcon" class="h-6 w-6 transition-transform duration-300" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>


    {{-- Navegación --}}
    <ul class="space-y-4 py-8 px-4">

        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:text-bosque">
                <i class="fas fa-home"></i>
                <span class="sidebar-text">Inicio</span>
            </a>
        </li>

        <li>
            <a href="#" class="flex items-center space-x-2 hover:text-bosque">
                <i class="fas fa-file-alt"></i>
                <span class="sidebar-text">Reportes</span>
            </a>
        </li>

        <li>
            <a href="#" class="flex items-center space-x-2 hover:text-bosque">
                <i class="fas fa-users"></i>
                <span class="sidebar-text"> Usuarios</span>
            </a>
        </li>

        {{-- Submenú desplegable con Alpine.js --}}
        <li x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center justify-between w-full hover:text-bosque">
                <span class="flex items-center space-x-2">
                    <i class="fas fa-cog"></i>
                    <span class="sidebar-text">Configuración</span>
                </span>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
            </button>

            <ul x-show="open" x-transition class="mt-2 ml-6 space-y-1 text-sm">
                <li><a href="#" class="block hover:text-bosque">Usuarios</a></li>
                <li><a href="#" class="block hover:text-bosque">Permisos</a></li>
            </ul>
        </li>

    </ul>
</aside>
