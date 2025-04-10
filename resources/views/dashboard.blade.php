@extends('layouts.app')

@section('content')
<div class="bg-fondo min-h-screen py-8 px-4">
    <h2 class="text-3xl font-bold text-white mb-8 text-center">Dashboard Principal</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Tarjeta 1 -->
        <div class="bg-vino text-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Ventas</h3>
            <p class="text-4xl font-bold">1,200</p>
        </div>

        <!-- Tarjeta 2 -->
        <div class="bg-verde text-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Usuarios</h3>
            <p class="text-4xl font-bold">50</p>
        </div>

        <!-- Tarjeta 3 -->
        <div class="bg-gris text-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-2">Reportes</h3>
            <p class="text-4xl font-bold">12</p>
        </div>
    </div>
</div>
@endsection
