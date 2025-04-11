<aside 
    id="sidebar" 
    class="fixed top-20 left-0 h-[calc(100vh-5rem)] w-64 bg-dorado text-white transition-all duration-300 z-40 flex flex-col">

    {{-- Logo + Botón para ocultar --}}
    <div class="flex items-center justify-between px-4 py-4 bg-white border-b border-bosque">
        <img 
            src="{{ asset('images/LOGOS-ESTADO.png') }}" 
            alt="Logo" 
            class="h-10 w-auto cursor-pointer" 
            onclick="toggleSidebar()"
        >
        <button onclick="toggleSidebar()" class="text-bosque focus:outline-none">
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                id="toggleIcon" 
                class="h-6 w-6 transition-transform duration-300 transform" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor"
            >
                <!-- Flecha hacia la izquierda (sidebar expandido) -->
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    stroke-width="2" 
                    d="M15 19l-7-7 7-7" 
                />
            </svg>
        </button>
    </div>

    {{-- Navegación (contenido scrollable) --}}
    <div class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-4 px-4">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-2 hover:text-bosque rounded-lg hover:bg-white/10 hover:shadow-md px-3 py-2 transition">
                    <i class="fas fa-home"></i>
                    <span class="sidebar-text">Inicio</span>
                </a>
            </li>

            <li x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full hover:text-bosque rounded-lg hover:bg-white/10 hover:shadow-md px-3 py-2 transition">
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-file-alt"></i>
                        <span class="sidebar-text">Licencias Médicas</span>
                    </span>
                </button>

                <ul x-show="open" x-transition class="sidebar-text mt-2 ml-6 space-y-1 text-sm">
                    <li><a href="#" class="block hover:text-bosque px-2 py-1 hover:bg-white/10 hover:shadow rounded transition">Capturar</a></li>
                    <li><a href="{{ route('licencias.index') }}" class="block hover:text-bosque px-2 py-1 hover:bg-white/10 hover:shadow rounded transition">Registros</a></li>
                </ul>
            </li>

            <li>
                <a href="#" 
                   class="flex items-center space-x-2 hover:text-bosque rounded-lg hover:bg-white/10 hover:shadow-md px-3 py-2 transition">
                    <i class="fas fa-users"></i>
                    <span class="sidebar-text">Inasistencias</span>
                </a>
            </li>

            <li>
                <a href="#" 
                   class="flex items-center space-x-2 hover:text-bosque rounded-lg hover:bg-white/10 hover:shadow-md px-3 py-2 transition">
                    <i class="fas fa-chart-simple"></i>
                    <span class="sidebar-text">Estadísticas</span>
                </a>
            </li>

            {{-- Submenú --}}
            <li x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        class="flex items-center justify-between w-full hover:text-bosque rounded-lg hover:bg-white/10 hover:shadow-md px-3 py-2 transition">
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-cog"></i>
                        <span class="sidebar-text">Configuración</span>
                    </span>                    
                </button>

                <ul x-show="open" x-transition class="sidebar-text mt-2 ml-6 space-y-1 text-sm">
                    <li><a href="#" class="block hover:text-bosque px-2 py-1 hover:bg-white/10 hover:shadow rounded transition">Usuarios</a></li>
                    <li><a href="#" class="block hover:text-bosque px-2 py-1 hover:bg-white/10 hover:shadow rounded transition">Permisos</a></li>
                </ul>
            </li>
        </ul>
    </div>

    {{-- 🔽 Panel inferior  --}}
    
        <div class="mt-auto bg-dorado border-t border-white/20 pt-2">
            <div class="bg-white/10 text-white rounded-lg px-2 py-2 text-sm flex items-center justify-center space-x-2 mx-5 mb-2 transition-all duration-300">
                <i class="fas fa-user-circle text-lg"></i>
                <!-- Texto oculto al colapsar -->
                <div class="sidebar-user-info">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-300">Conectado</p>
                </div>
            </div>

            <div class="text-white text-xs text-center opacity-60 pb-2">
                v1.0.3 - © {{ date('Y') }}
            </div>
        </div>
</aside>