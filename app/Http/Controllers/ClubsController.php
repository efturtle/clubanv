<?php

namespace App\Http\Controllers;

use App\Models\clubs;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    public function index()
    {
    return view('clubes.main', [
            'clublist' => clubs::all()
        ]);
    }

    public function store()
    {
        clubs::create($this->validarClub());
        return redirect('/club')
        ->with('message', '¡club registrado!');
    }

    
    public function show(clubs $clubs)
    {
        return view('clubes.show', compact('clubs'));
    }

    public function edit(clubs $clubs)
    {
        return view('clubes.edit', compact('clubs'));
    }

    
    public function update(clubs $clubs)
    {
        $clubs->update($this->validarClub());
        return redirect(route('club.show', $clubs))
        ->with('message', '¡Club ha sido actualizado!');
    }

    
    public function destroy(clubs $clubs)
    {
        $clubs->forceDelete();
        return redirect('/club')
        ->with('message', 'Se ha eliminado un club');
    }

    public function softDelete(clubs $clubs){
        $clubs->delete();
        return redirect('/club')
        ->with('message', 'Se ha dado de baja un club');
    }

    protected function validarClub(){
        return request()->validate([
            'nombreClub' => 'required',
            'significado' => 'required',
            'iglesia' => 'required',
            'director' => 'required',
            'subdirector' => '',
            'subdirectora' => '',
            'tesorero' => '',
            'secretario' => '',
            'pastor' => '',
            'anciano' => '',
            'fechaAprobacion' => '',
            'numeroVoto' => ''
        ]);
    }
}
