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
    //create is done with a modal.

    public function store(Request $request)
    {
        Miembros::create($request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'usuario' => '',
            'clave' => '',
            'fechaNacimiento' => 'required',
            'direccion' => 'required',
            'provincia_colonia' => 'required',
            'codigoPostal' => 'required',
            'nacionalidad' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'tipoSangre' => 'required',
            'confirmaAlergias' => 'required',
            'alergia' => '',
            'sexo' => 'required',
            'nombrePadre' => '',
            'apellidosPadre' => '',
            'contactoPadre' => '',
            'nombreMadre' => '',
            'apellidosMadre' => '',
            'contactoMadre' => ''
            ]));
            return redirect('/miembros')
            ->with('message', 'miembro registrado');
    }

    public function show(Miembros $miembros)
    {
        return view('miembros.show', compact('miembros'));
    }

    public function edit(Miembros $miembros)
    {
        
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
