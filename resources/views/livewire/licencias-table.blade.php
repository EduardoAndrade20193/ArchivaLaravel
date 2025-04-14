<div>
    <!-- Contenido principal -->
    <div class="p-4 space-y-4">
        {{-- Buscador --}}
        <div>
            <input
                type="text"
                wire:model.live.debounce.500ms="search"
                placeholder="Buscar..."
                class="w-full border p-2 rounded mb-4"
            />
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
                            <td class="px-4 py-2 text-center">
                                <button
                                    wire:click="$set('selectedLicenciaId', {{ $licencia->Id }})"
                                    class="bg-primary hover:bg-primary-dark text-white font-semibold px-3 py-1 rounded transition"
                                >
                                    Ver
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
        <div>
            {{ $licencias->links() }}
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
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
                <button 
                    @click="show = false; $wire.set('selectedLicenciaId', null)"
                    class="absolute top-3 right-3 text-gray-600 hover:text-red-600 text-2xl font-bold"
                >
                    &times;
                </button>
                
                <h2 class="text-xl font-bold mb-4 text-primary">Detalles de la Licencia</h2>

                <ul class="text-sm space-y-2">
                    <li><strong>Nombre:</strong> {{ $selectedLicencia->Nombre }}</li>
                    <li><strong>Diagnóstico:</strong> {{ $selectedLicencia->Diagnostico }}</li>
                    <li><strong>Fecha:</strong> {{ $selectedLicencia->Fecha }}</li>
                    <li><strong>Días Incapacidad:</strong> {{ $selectedLicencia->DiasInc }}</li>
                    <li><strong>Municipio:</strong> {{ $selectedLicencia->Municipio }}</li>
                    <li><strong>Nivel:</strong> {{ $selectedLicencia->Nivel }}</li>
                    <li><strong>Serie:</strong> {{ $selectedLicencia->Serie }}</li>
                    <li><strong>Fecha Captura:</strong> {{ $selectedLicencia->fecha_captura }}</li>
                </ul>
            </div>
        </div>
    @endif
</div>