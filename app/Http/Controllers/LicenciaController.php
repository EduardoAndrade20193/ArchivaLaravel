<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licencia;

class LicenciaController extends Controller
{
    public function index()
    {
        return view('licencias.index');
    }

    public function listar(Request $request)
    {
        $registros = Licencia::all();
        return response()->json([
            'Result' => 'OK',
            'Records' => $registros
        ]);
    }
}
