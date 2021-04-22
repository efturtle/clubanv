<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

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
        $this->validarClub();
        
        Club::create([
            'nombreClub' => $request->nombreClub,
            'significado' => $request->significado,
            'iglesia' => $request->iglesia,
            'tesorero' => $request->tesorero,
            'anciano' => $request->anciano,
            'secretario' => $request->secretario,
            'director_id' => $request->director,
            'pastor_id' => $request->pastor,
            'subdirector' => $request->subdirector,
            'subdirectora' => $request->subdirectora,            
            'fechaAprobacion' => $request->fechaAprobacion,
            'numeroVoto' => $request->numeroVoto,
            'foto' => $request->foto,
            'distrito_id' => $request->distrito,
        ]);

        //redirect with success message
        return redirect('/club')
        ->with('message', '¡club registrado!');
    }

    public function create()
    {
        $users = User::whereHas('directorinfo', function(Builder $query){
            $query
            ->where('rol', '>', 3)
            ->where('asignado', '=', 0);
        })->get();
        return view('club.create', [
            'users' => $users,
            'distritos' => DB::table('distritos')->get()
        ]);
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
            'tesorero' => '',
            'anciano' => '',
            'secretario' => '',
            'director' => '',
            'pastor' => '',
            'subdirector' => '',
            'subdirectora' => '',            
            'fechaAprobacion' => '',
            'numeroVoto' => '',
            'foto' => '',
            'distrito' => 'required',
        ]);
    }
}
