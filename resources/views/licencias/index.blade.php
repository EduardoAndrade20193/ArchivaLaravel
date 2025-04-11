@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Licencias Médicas</h1>
    <div id="tablaLicencias"></div>
</div>
@endsection

@section('scripts')
    {{-- Cargar jQuery y jTable solo en esta vista --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jtable@2.6.0/lib/jquery.jtable.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/jtable@2.6.0/lib/themes/metro/blue/jtable.min.css" rel="stylesheet">

    {{-- Tu script con Vite --}}
    @vite('resources/js/licencias.js')
@endsection
