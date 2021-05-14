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
        /* dd($request->hasFile('foto'));
        Storage::disk('local')->put($request->foto, 'contents'); */
        
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
        $users = User::whereHas('directorinfo', function(Builder $query){
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
        $clubs->forceDelete();
        return redirect('/club')
        ->with('message', 'Se ha eliminado un club');
    }

    public function delete(Club $clubs){
        return $this->removerUsuarios($clubs);
        $clubs->delete();
        return redirect('/club')
        ->with('message', 'Se ha dado de baja un club');
    }

    protected function removerUsuarios($clubs)
    {
        for ($i=0; $i < 5; $i++) { 
            switch ($i) {
                case 1:
                    $user = User::find($clubs->director_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'director_id' => null,
                    ]);
                    break;
                case 2:
                    $user = User::find($clubs->pastor_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'pastor_id' => null,
                    ]);
                    break;
                case 3:
                    $user = User::find($clubs->directorAventurero_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorAventurero_id' => null,
                    ]);
                    break;
                case 4:
                    $user = User::find($clubs->directorConquistador_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorConquistador_id' => null,
                    ]);
                    break;
                case 5:
                    $user = User::find($clubs->directorGuiasMayores_id);
                    $user->update([
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
        return $clubs;
        for ($i=0; $i < 5; $i++) { 
            switch ($i) {
                case 1:
                    $user = User::find($clubs->director_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'director_id' => null,
                    ]);
                    break;
                case 2:
                    $user = User::find($clubs->pastor_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'pastor_id' => null,
                    ]);
                    break;
                case 3:
                    $user = User::find($clubs->directorAventurero_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorAventurero_id' => null,
                    ]);
                    break;
                case 4:
                    $user = User::find($clubs->directorConquistador_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorConquistador_id' => null,
                    ]);
                    break;
                case 5:
                    $user = User::find($clubs->directorGuiasMayores_id);
                    $user->update([
                        'asignado' => 0,
                    ]);
                    $clubs->update([
                        'directorGuiasMayores_id' => null,
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
