<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubsController extends Controller
{
    public function index()
    {
    return view('club.index', [
            'clublist' => Club::all()
        ]);
    }

    public function store(Request $request)
    {
        //get the request info
        $validated = $this->validarClub();
        
        Club::create($validated);

        //redirect with success message
        return redirect('/club')
        ->with('message', '¡club registrado!');
    }

    public function create()
    {
        return view('club.create');
    }

    
    public function show(Club $clubs)
    {
        return view('club.show', compact('clubs'));
    }

    public function edit(Club $clubs)
    {
        return view('club.edit', compact('clubs'));
    }

    
    public function update(Club $clubs)
    {
        //get the request
        $temp = $this->validarClub();
        //user id
        $temp += ['user_id' => Auth::id()];
        //update method
        $clubs->update($temp);
        //return
        return redirect(route('club.show', $clubs))
        ->with('message', '¡Club ha sido actualizado!');
    }

    
    public function destroy(Club $clubs)
    {
        $clubs->forceDelete();
        return redirect('/club')
        ->with('message', 'Se ha eliminado un club');
    }

    public function softDelete(Club $clubs){
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
            'numeroVoto' => '',
            'foto' => ''
        ]);
    }
}
