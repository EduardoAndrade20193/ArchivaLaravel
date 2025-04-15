<div>
    <!-- Contenido principal -->
    <div class="p-4 space-y-4">       

     <!-- Panel contenedor -->
<div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 transition-all duration-300 ease-in-out">
    <!-- Header del panel -->
    <div class="mb-4 pb-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-wide">📋 Listado de Licencias Médicas</h2>
    </div>


        {{-- Filtros y buscador --}}
    <div class="flex flex-wrap items-end gap-4 mb-4">
    {{-- 🔍 Buscador con ícono --}}
    <div class="relative w-full md:w-1/3">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                </svg>
            </span>
            <input
                id="search"
                type="text"
                wire:model.live.debounce.500ms="search"
                placeholder="Buscar por nombre, municipio, nivel..."
                class="w-full pl-10 pr-4 py-2 border rounded"
            />
        </div>
    </div>

    {{-- 📅 Filtro Fecha Desde --}}
    <div class="w-full md:w-auto">
        <label for="fechaDesde" class="block text-sm font-medium text-gray-700 mb-1">Desde</label>
        <input
            id="fechaDesde"
            type="date"
            wire:model="fechaDesde"
            class="border p-2 rounded w-full"
        />
    </div>

    {{-- 📅 Filtro Fecha Hasta --}}
    <div class="w-full md:w-auto">
        <label for="fechaHasta" class="block text-sm font-medium text-gray-700 mb-1">Hasta</label>
        <input
            id="fechaHasta"
            type="date"
            wire:model="fechaHasta"
            class="border p-2 rounded w-full"
        />
    </div>


        {{-- 🔍 Botón de aplicar filtro --}}
    <div class="w-full md:w-auto">
        <button
            wire:click="$set('filtrar', true)"
            class="bg-verde hover:bg-bosque text-white px-4 py-2 rounded"
        >
            Filtrar
        </button>
    </div>


    {{-- ♻️ Botón para limpiar filtros --}}
    <div class="w-full md:w-auto">
        <button
            wire:click="resetFiltros"
            class="bg-vino hover:bg-vinoOscuro text-white px-4 py-2 rounded"
        >
            Limpiar Filtros
        </button>
    </div>
</div>



        {{-- Tabla --}}
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Código</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Fecha</th>
                        <th class="px-4 py-2">Municipio</th>
                        <th class="px-4 py-2">Diagnóstico</th>
                        <th class="px-4 py-2">Días Incapacidad</th>
                        <th class="px-4 py-2">Nivel</th>
                        <th class="px-4 py-2">Serie</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($licencias as $licencia)
                        <tr class="hover:bg-gray-50 transition" wire:key="row-{{ $licencia->Id }}">
                            <td class="px-4 py-2">{{ $licencia->Id }}</td>
                            <td class="px-4 py-2">{{ $licencia->Codigo }}</td>
                            <td class="px-4 py-2">{{ $licencia->Nombre }}</td>
                            <td class="px-4 py-2">{{ $licencia->Fecha }}</td>
                            <td class="px-4 py-2">{{ $licencia->Municipio }}</td>
                            <td class="px-4 py-2">{{ $licencia->Diagnostico }}</td>
                            <td class="px-4 py-2">{{ $licencia->DiasInc }}</td>
                            <td class="px-4 py-2">{{ $licencia->Nivel }}</td>
                            <td class="px-4 py-2">{{ $licencia->Serie }}</td>
                            <td class="px-4 py-2 text-center space-y-2">
                                <button
                                    wire:click="$set('selectedLicenciaId', {{ $licencia->Id }})"
                                    class="bg-primary hover:bg-primary-dark text-white font-semibold px-3 py-1 rounded transition mr-2"
                                >
                                    Ver
                                </button>

                                <button
                                    wire:click="editar({{ $licencia->Id }})"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-3 py-1 rounded transition ml-2"
                                >
                                    Editar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4 text-gray-500">No se encontraron resultados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="mt-6 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
            {{ $licencias->links() }}
        </div>
    </div>

    </div>

    

    {{-- Modal --}}
@if($selectedLicencia)
    <div 
        x-data="{ show: true }" 
        x-show="show"
        x-transition
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <!-- Aumenté max-w-lg a max-w-2xl para hacer el modal más ancho -->
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl relative">
            <button 
                @click="show = false; $wire.set('selectedLicenciaId', null)"
                class="absolute top-4 right-4 text-gray-600 hover:text-red-600 text-3xl font-bold"
            >
                &times;
            </button>
            
            <!-- Aumenté text-xl a text-2xl para el título -->
            <h2 class="text-2xl font-bold mb-6 text-primary">Detalles de la Licencia</h2>

            <!-- Cambié text-sm por text-base y aumenté el espacio-y-2 a space-y-3 -->
            <ul class="text-base space-y-3">
                <!-- Añadí clases text-lg a cada item -->
                <li class="text-lg"><strong class="font-semibold">Nombre:</strong> {{ $selectedLicencia->Nombre }}</li>
                <li class="text-lg"><strong class="font-semibold">Diagnóstico:</strong> {{ $selectedLicencia->Diagnostico }}</li>
                <li class="text-lg"><strong class="font-semibold">Fecha:</strong> {{ $selectedLicencia->Fecha }}</li>
                <li class="text-lg"><strong class="font-semibold">Días Incapacidad:</strong> {{ $selectedLicencia->DiasInc }}</li>
                <li class="text-lg"><strong class="font-semibold">Municipio:</strong> {{ $selectedLicencia->Municipio }}</li>
                <li class="text-lg"><strong class="font-semibold">Nivel:</strong> {{ $selectedLicencia->Nivel }}</li>
                <li class="text-lg"><strong class="font-semibold">Serie:</strong> {{ $selectedLicencia->Serie }}</li>
                <li class="text-lg"><strong class="font-semibold">Fecha Captura:</strong> {{ $selectedLicencia->fecha_captura }}</li>
            </ul>
        </div>
    </div>
@endif



@if($editando && $licenciaEditable)
    <div 
        x-data="{ show: true }" 
        x-show="show"
        x-transition
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl relative">
            <button 
                @click="show = false; $wire.set('editando', false)"
                class="absolute top-4 right-4 text-gray-600 hover:text-red-600 text-3xl font-bold"
            >
                &times;
            </button>

            <h2 class="text-2xl font-bold mb-4 text-primary">Editar Licencia</h2>

            <div class="space-y-4">
                <div>
                    <label class="font-semibold">Nombre</label>
                    <input type="text" wire:model.defer="licenciaEditable.Nombre" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="font-semibold">Fecha</label>
                    <input type="text" wire:model.defer="licenciaEditable.Fecha" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="font-semibold">Municipio</label>
                    <input type="text" wire:model.defer="licenciaEditable.Municipio" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="font-semibold">Diagnóstico</label>
                    <input type="text" wire:model.defer="licenciaEditable.Diagnostico" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="font-semibold">Días Incapacidad</label>
                    <input type="number" wire:model.defer="licenciaEditable.DiasInc" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="font-semibold">Nivel</label>
                    <input type="text" wire:model.defer="licenciaEditable.Nivel" class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="font-semibold">Serie</label>
                    <input type="text" wire:model.defer="licenciaEditable.Serie" class="w-full border p-2 rounded">
                </div>

                <div class="flex justify-end pt-4 space-x-2">
                    <button 
                        wire:click="actualizar"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"
                    >
                        Guardar Cambios
                    </button>
                    <button 
                        @click="show = false; $wire.set('editando', false)"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded"
                    >
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif





</div>