<?php

namespace App\Http\Controllers;

use App\Models\Miembros;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    public function index()
    {
        return view('miembros.index', [
            'miembros' => Miembros::all()
        ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Miembros $miembros)
    {
        //
    }

    public function edit(Miembros $miembros)
    {
        //
    }

    public function update(Request $request, Miembros $miembros)
    {
        //
    }

    public function destroy(Miembros $miembros)
    {
        //
    }
}
