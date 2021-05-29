<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        /* //aventureros
        $aventureros = DB::table('miembros')->where('category', 1)->count();
        //conquistadores
        $conquistadores = DB::table('miembros')->where('category', 2)->count();
        //guias mayores
        $guias = DB::table('miembros')->where('category', 3)->count();
        //pastores
        $pastores = DB::table('directors')->where('rol', 4)->count();
        //bautizados
        $bautizados = DB::table('miembros')->where('bautizados', 1)->count(); */
        return view('estadisticas.index', [
            'aventureros' => DB::table('miembros')->where('category', 1)->count(),
            'conquistadores' => DB::table('miembros')->where('category', 2)->count(),
            'guias' => DB::table('miembros')->where('category', 3)->count(),
            'pastores' => DB::table('directors')->where('rol', 4)->count(),
            'bautizados' => DB::table('miembros')->where('bautizado', 1)->count()
        ]);
    }
}
