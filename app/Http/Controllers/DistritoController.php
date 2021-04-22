<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Distrito;

class DistritoController extends Controller
{
    
    public function index()
    {
        return view('distrito.index', ['list' => DB::table('distritos')->get()]);
    }

    public function create()
    {
        return view('distrito.create');
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
        return redirect('/index');
    }

    public function show($id)
    {
        $distrito = Distrito::findOrFail($id);
        return view('distrito.show', [
            'distrito'=> $distrito
        ]);
    }
    

    public function edit(Distrito $distrito)
    {
        return view('distrito.edit', compact('distrito'));
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
    }

    /* public function softDelete(Distrito $distrito)
    {
        $distrito->delete();
        return redirect('/distrito')
        ->with('message', 'Se dio de baja un distrito');
    }

    public function destroy(Distrito $distrito)
    {
        $distrito->forceDelete();
        return redirect('/distrito')
        ->with('message', 'Se elimino un distrito');
    } */

    protected function validarDistrito($request){
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'estado' => 'required'
        ]);
    }
}
