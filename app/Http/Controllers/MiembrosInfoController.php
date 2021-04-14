<?php

namespace App\Http\Controllers;

use App\Models\miembrosinfo;
use Illuminate\Http\Request;

class MiembrosInfoController extends Controller
{
    public function index()
    {
        return view('miembros.index', [
            'miembroslist' => miembrosinfo::all()
        ]);
    }

    public function store()
    {
        
        /* miembrosinfo::create($this->validarMiembroInfo());
        return redirect('/miembros')
        ->with('message', 'miembro registrado'); */
    }

    public function show(miembrosinfo $miembros)
    {
        return view('miembros.show', compact('miembros'));
    }

    public function edit(miembrosinfo $miembros)
    {
        return view('miembros.edit', compact('miembros'));
    }

    public function update(miembrosinfo $miembros)
    {
        $miembros->update($this->validarMiembroInfo());
        return redirect (route('miembro.show', $miembros));
    }

    public function destroy(miembrosinfo $miembros)
    {
        $miembros->forceDelete();
        return redirect('/miembros')
        ->with('message', 'Se ha eliminado un miembro');
    }

    public function softDelete(miembrosinfo $miembros){
        $miembros->delete();
        return redirect('/miembros')
        ->with('message', 'un miembro fue dado de baja');
    }

    protected function validarUser(){
        return request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',    
        ]);
    }


    protected function validarMiembroInfo(){
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
