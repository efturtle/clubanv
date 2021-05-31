<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Distrito;
use App\Models\User;

class DistritoController extends Controller
{
    
    public function index()
    {
        return view('distritos.index', ['distritos' => Distrito::paginate(7)]);
    }

    public function create()
    {
        return view('distritos.create');
    }

    public function store(Request $request)
    {
        //verify request
        $this->validarDistrito($request);
        //create district
        Distrito::create([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
        ]);
        //redirect
        return redirect(route('distritos.index'));
    }

    public function show(Distrito $distrito)
    {
        return view('distritos.show', compact('distrito'));
    }
    

    public function edit(Distrito $distrito)
    {
        return view('distritos.edit', compact('distrito'));
    }

    public function update(Request $request, Distrito $distrito)
    {
        //request info
        $this->validarDistrito($request);
        //update 
        $distrito->update([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
        ]);
        //redirect
        return redirect(route('distrito.show', $distrito))
        ->with('message', 'Informacion de distrito actualizada!');
    }

    public function delete(Distrito $distrito)
    {
        if($this->readyForDelete($distrito)){
            $distrito->delete();
            return redirect('/distrito')
            ->with('message', 'Se dio de baja un distrito');
        }else{
            return redirect(route('distrito.show', $distrito))
            ->with('message', 'Hay clubes bajo este distrito, eliminar tales clubes antes de dar de baja a este distrito');
        }
        
    }        

    public function destroy(Distrito $distrito)
    {
        //same as delete but with forceDelete method.
        if($this->readyForDelete($distrito)){
            $distrito->forceDelete();
            return redirect('/distrito')
            ->with('message', 'Se elimino un distrito');
        }else{
            return redirect(route('distrito.show', $distrito))
            ->with('message', 'Hay clubes bajo este distrito, eliminar tales clubes antes de dar de baja a este distrito');
        }
    }

    protected function readyForDelete(Distrito $distrito)
    {
        //check for this id on clubs tables
        $count = DB::table('clubs')->where('distrito_id', '=', $distrito->id)->count();
        if($count != 0){
            //return false if there is clubs in this district
            return false;
        }
        //check for coordinador and set asignado to 0 if was assigned to this district
        if($distrito->coordinador_id != 0){
            $user = User::find($distrito->coordinador_id);
            $user->directorinfo->update([
                'asignado' => 0,
            ]);
        }
        //same goes for pastor
        if($distrito->pastor_id != 0){
            $user = User::find($distrito->pastor_id);
            $user->directorinfo->update([
                'asignado' => 0,
            ]);
        }
        //exits with true if no clubs where in this district
        return true;
    }

    protected function validarDistrito($request){
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'estado' => 'required'
        ]);
    }
}
