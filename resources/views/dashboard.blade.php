@extends('layouts.app')

@section('content')
<div class="bg-fondo min-h-screen py-2 px-4">
    <h2 class="text-2xl font-bold mb-6">Histórico de Licencias Médicas</h2>

    <!-- Primera fila - Panel Comparativa (más compacto) -->
    <div class="grid grid-cols-1 gap-6 mb-6 max-w-8xl mx-auto"> <!-- Added max-w-4xl and mx-auto -->
        <div class="bg-white rounded-lg p-3 shadow"> <!-- Reduced padding from p-4 to p-3 -->
            <h3 class="text-lg font-semibold mb-2">Comparativa Año 2024 vs Año 2025</h3>
            <canvas id="graficaComparativa" class="max-h-96"></canvas> <!-- Added max height -->
        </div>
    </div>

    <!-- Segunda fila - Gráficas individuales -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-6x2 mx-auto"> <!-- Same max width for alignment -->
        <!-- Gráfica Año 2024 -->
        <div class="bg-white rounded-lg p-3 shadow"> <!-- Reduced padding here too -->
            <h3 class="text-lg font-semibold mb-2">Año 2024</h3>
            <canvas id="grafica2024" class="max-h-80"></canvas> <!-- Slightly smaller -->
        </div>

        <!-- Gráfica Año 2025 -->
        <div class="bg-white rounded-lg p-3 shadow">
            <h3 class="text-lg font-semibold mb-2">Año 2025</h3>
            <canvas id="grafica2025" class="max-h-80"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script>
    window._datos2024 = @json($licencias2024);
    window._datos2025 = @json($licencias2025);
</script>
@endpush
@endsection