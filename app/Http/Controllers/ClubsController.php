<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ClubsController extends Controller
{
    public function index()
    {
        return view('clubes.index', [
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
        //looks for directors that have not yet been assigned for assign process in creation
        $users = User::whereHas('director', function(Builder $query){
            $query
            ->where('rol', '>', 3)
            ->where('asignado', '=', 0);
        })->get();
        //returns the view with the query and the districts for assignment aswell
        return view('clubes.create', [
            'users' => $users,
            'distritos' => DB::table('distritos')->get()
        ]);
    }

    public function show(Club $clubs)
    {
        return view('clubes.show', compact('clubs'));
    }

    public function edit(Club $clubs)
    {
        return view('clubes.edit', compact('clubs'));
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
        $this->eliminarUsuarios($clubs);
        $clubs->forceDelete();
        return redirect('/club')
        ->with('message', 'Se ha eliminado un club');
    }

    public function delete(Club $clubs){
        $this->removerUsuarios($clubs);
        $clubs->delete();
        return redirect('/club')
        ->with('message', 'Se ha dado de baja un club');
    }

    private function removerUsuarios(Club $clubs)
    {
        for ($i=1; $i < 6; $i++) {
            switch ($i) {
                case 1:
                    if ($clubs->director_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->director_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'director_id' => null,
                    ]);
                    break;
                case 2:
                    if ($clubs->pastor_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->pastor_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'pastor_id' => null,
                    ]);
                    break;
                case 3:
                    if ($clubs->directorAventurero_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->directorAventurero_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorAventurero_id' => null,
                    ]);
                    break;
                case 4:
                    if ($clubs->directorConquistador_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->directorConquistador_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorConquistador_id' => null,
                    ]);
                    break;
                case 5:
                    if ($clubs->directorGuiasMayores_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->directorGuiasMayores_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorGuiasMayores_id' => null,
                    ]);
                    break;
            }
        }
    }

    protected function eliminarUsuarios(Club $clubs)
    {
        for ($i=1; $i < 6; $i++) { 
            switch ($i) {
                case 1:
                    if ($clubs->director_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->director_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    break;
                case 2:
                    if ($clubs->pastor_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->pastor_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    break;
                case 3:
                    if ($clubs->directorAventurero_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->directorAventurero_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    break;
                case 4:
                    if ($clubs->directorConquistador_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->directorConquistador_id);
                    $user->directorinfo->update([
                        'asignado' => 0,
                    ]);
                    break;
                case 5:
                    if ($clubs->directorGuiasMayores_id == 0) {
                        break;
                    }
                    $user = User::find($clubs->directorGuiasMayores_id);
                    $user->directorinfo->update([
                        'asignado' => 0
                    ]);
                    break;
            }
        }
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
