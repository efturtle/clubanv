<?php

namespace App\Http\Controllers;

use App\Models\Miembros;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    public function index()
    {
        return view('miembros.index', [
            'miembroslist' => Miembros::all()
        ]);
    }

    public function store()
    {
        Miembros::create($this->validarMiembro());
            return redirect('/miembros')
            ->with('message', 'miembro registrado');
    }

    public function show(Miembros $miembros)
    {
        return view('miembros.show', compact('miembros'));
    }

    public function edit(Miembros $miembros)
    {
        return view('miembros.edit', compact('miembros'));
    }

    public function update(Miembros $miembros)
    {
        $miembros->update($this->validarMiembro());
        return redirect (route('miembro.show', $miembros));
    }

    public function destroy(Miembros $miembros)
    {
        $miembros->forceDelete();
        return redirect('/miembros')
        ->with('message', 'Se ha eliminado un miembro');
    }

    public function softDelete(Miembros $miembros){
        $miembros->delete();
        return redirect('/miembros')
        ->with('message', 'un miembro fue dado de baja');
    }


    protected function validarMiembro(){
        return request()->validate([
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
        ]);
    }
}
