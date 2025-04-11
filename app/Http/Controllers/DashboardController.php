<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    

    public function index()
{
    $licencias2024 = DB::select("CALL GetLicenciasPorMesPorAnio(2024)");
    $licencias2025 = DB::select("CALL GetLicenciasPorMesPorAnio(2025)");

    return view('dashboard', compact('licencias2024', 'licencias2025'));
}


}
