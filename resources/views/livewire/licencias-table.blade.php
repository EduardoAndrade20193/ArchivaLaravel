<div class="p-4">
    <input type="text" wire:model="search" placeholder="Buscar..." class="border p-2 mb-4 w-full rounded">

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="p-2">Código</th>
                <th class="p-2">Nombre</th>
                <th class="p-2">Fecha</th>
                <th class="p-2">Municipio</th>
                <th class="p-2">Nivel</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($licencias as $licencia)
            <tr class="border-t">
                <td class="p-2">{{ $licencia->Codigo }}</td>
                <td class="p-2">{{ $licencia->Nombre }}</td>
                <td class="p-2">{{ $licencia->Fecha }}</td>
                <td class="p-2">{{ $licencia->Municipio }}</td>
                <td class="p-2">{{ $licencia->Nivel }}</td>
                <td class="p-2">
                    <button wire:click="selectLicencia({{ $licencia->Id }})" class="bg-blue-600 text-white px-3 py-1 rounded">
                        Ver
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $licencias->links() }}
    </div>

    {{-- Modal --}}
    @if($selectedLicencia)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded w-full max-w-lg relative">
                <button wire:click="$set('selectedLicencia', null)" class="absolute top-2 right-3 text-gray-600 hover:text-red-600">&times;</button>
                <h2 class="text-lg font-bold mb-4">Detalles de Licencia</h2>
                <ul class="text-sm">
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
