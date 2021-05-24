<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use App\Models\User;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MiembroController extends Controller
{
    public function index()
    {
        return view('miembros.index', [
            'miembros' => Miembro::take(3)->get()
        ]);
    }

    public function create()
    {
        if (Auth::user()->director->rol < 6) {
            //these users do not have a club assigned since they are higher level, display all
            //i can display in order
            return view('miembros.create', [
                'clubs' => Club::all()->sortByDesc('distrito_id')
            ]);
        }else{
            //get the distrito
            //get the clubs inside this district
            //return view with this data
            return view('miembros.create', [
                'clubs' => Club::where('distrito_id', '=', Auth::user()->director->club->distrito_id)->get()
            ]);
        }
        
    }

    public function store(Request $request)
    {
        //return str_replace(' ', '', $request->nombre);
        //get request info
        $this->validarUser();
        //generate password
        $password = $this->generatePassword($request->nombre);
        //create user
        $user = User::create([
            'name' => $request->nombre,
            'email' => str_replace(' ', '', $request->nombre).'@clubanv.com',
            'password' => Hash::make($password),
        ]);

        //validate request member info
        $this->validarMiembroInfo();
        //create memberinfo
        $miembrosinfo = Miembro::create([
            'nombre' => $request->nombre,
            'club_id' => $request->club,
            'category' => $request->category,
            'fechaNacimiento' => $request->fechaNacimiento,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'provincia_colonia' => $request->provincia_colonia,
            'codigoPostal' => $request->codigoPostal,
            'nacionalidad' => $request->nacionalidad,
            'estado' => $request->estado,
            'ciudad' => $request->ciudad,
            'tipoSangre' => $request->tipoSangre,
            'confirmaAlergias' => $request->confirmaAlergias,
            'alergia' => $request->alergia,
            'sexo' => $request->sexo,
            'user_id' => $user->id
        ]);

        //return view with member info (show method)
        return redirect(route('miembro.show', ['miembro', $miembrosinfo]))
        ->with('message', 'miembro registrado satisfactoriamente');
    }

    public function show(Miembro $miembro)
    {   
        return view('miembros.show', ['miembro'=> $miembro]);
    }

    public function edit(Miembro $miembros)
    {
        return view('miembros.edit', compact('miembros'));
    }

    public function update(Miembro $miembros)
    {
        $miembros->update($this->validarMiembroInfo());
        return redirect (route('miembro.show', $miembros));
    }

    public function destroy(Miembro $miembros)
    {
        $miembros->forceDelete();
        return redirect('/miembros')
        ->with('message', 'Se ha eliminado un miembro');
    }

    public function softDelete(Miembro $miembros){
        $miembros->delete();
        return redirect('/miembros')
        ->with('message', 'un miembro fue dado de baja');
    }

    protected function validarUser(){
        return request()->validate([
            'nombre' => 'required|string|max:255',
        ]);
    }


    protected function validarMiembroInfo(){
        return request()->validate([
            'nombre' => 'required|min:2',
            'club' => 'required',
            'category' => 'required',
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
            'user_id' => '',


            'nombrePadre' => '',
            'apellidosPadre' => '',
            'contactoPadre' => '',
            'nombreMadre' => '',
            'apellidosMadre' => '',
            'contactoMadre' => '',


            
            'iglesia' => '', 
            'distrito' => '',
            'clase_por_cursar' => '',
            'ultima_clase_cursada' => '',
            'investido_en_la_ultima_clase' => '',

            'bautizado' => '',
            'investido' => '',
            'tipo_aspirante_consejero' => '',
            'fecha_investidura' => '',
            'tiempo_de_servicio' => '',
            
            'nombre_c' => '',
            'curso_actual' => '',
            'libros' => '',
            'especialidad' => '',
            'estatus' => ''
        ]);
    }

    protected function generatePassword($name)
    {
        $name = strtok($name, ' ');
        if (strlen($name) > 6) {
            return $name.random_int(100,999);
        }
        return $name.random_int(10000, 99999);
    }
}
