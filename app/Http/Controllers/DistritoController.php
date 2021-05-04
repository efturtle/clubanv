<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Distrito;

class DistritoController extends Controller
{
    
    public function index()
    {
        return view('distritos.index', ['distritos' => DB::table('distritos')->get()]);
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
        return 'delete method district';
        $distrito->delete();
        return redirect('/distrito')
        ->with('message', 'Se dio de baja un distrito');
    }

    public function destroy(Distrito $distrito)
    {
        return 'destroy method district';
        $distrito->forceDelete();
        return redirect('/distrito')
        ->with('message', 'Se elimino un distrito');
    }

    protected function validarDistrito($request){
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'estado' => 'required'
        ]);
    }
}
