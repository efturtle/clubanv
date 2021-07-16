<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use App\Models\User;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MiembroController extends Controller
{
    public function index()
    {
        return view('miembros.index', [
            'miembros' => Miembro::paginate(7),
        ]);
    }

    public function create()
    {
        //if rol is under coordinador or if club id is empty show all clubs for this member.
        if (Auth::user()->director->rol < 6) {
            //these users do not have a club assigned since they are higher level, display all
            //i can display in order
            return view('miembros.create', [
                'clubs' => Club::all()->sortBy('distrito_id')
            ]);
        }
        //else show the club from where the user belongs and this will be assigned to the member.
        else{
            //get the distrito
            //get the clubs inside this district
            //return view with this data
            if(is_null(Auth::user()->director->club_id)){
                return view('miembros.create', [
                    'clubs' => Club::all()->sortBy('distrito_id')->select('id', 'nombreClub')
                ]); 
            }
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
            'email' => str_replace(' ', '', $request->nombre).random_int(1,4).'@clubanv.com',
            'password' => Hash::make($password),
        ]);

        //validate request member info
        $this->validarMiembroInfo();
        //create memberinfo
        $miembrosinfo = Miembro::create([
            'club_id' => $request->club_id,
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
        return redirect(route('miembro.show', ['miembro' => $miembrosinfo]))
        ->with('message', 'miembro registrado satisfactoriamente');
    }

    public function show(Miembro $miembro)
    {
        return view('miembros.show', ['miembro'=> $miembro]);
    }

    public function showUser(User $user)
    {
        //this is a separate method, because it shows the login info for this user.
        return view('miembros.showUser', ['user'=> $user]);
    }

    public function edit(Miembro $miembro)
    {
        //return view with member and clubs if they want to edit the members club
        return view('miembros.edit', [
            'miembro' => $miembro,
            'clubs' => DB::table('clubs')->select('id','nombreClub')->get()
        ]);
    }

    public function update(Miembro $miembro, Request $request)
    {
        //if there is no change on the name, we just update member info
        //get the previous name and compare to name in the request
        $name = $miembro->user->name;
        if($name == $request->nombre){
            //no change in name, just update member info
            $miembro->update($this->validarMiembroInfo());
            return redirect (route('miembro.show', $miembro))
            ->with('message', 'Miembro Actualizado!');
        }
        //there is a change in the name
        //search user and update name
        $user = User::find($miembro->user_id);
        $user->update([
            'name' => $request->nombre,
        ]);
        //update member info
        $miembro->update($this->validarMiembroInfo());
        return redirect (route('miembro.show', $miembro))
        ->with('message', 'Miembro Actualizado!');
    }

    public function destroy(Miembro $miembro)
    {
        $miembro->forceDelete();
        return redirect(route('miembros.index'))
        ->with('message', 'Se ha eliminado un miembro');
    }

    public function delete(Miembro $miembro){
        $miembro->delete();
        return redirect(route('miembros.index'))
        ->with('message', 'un miembro fue dado de baja');
    }

    protected function validarUser(){
        return request()->validate([
            'nombre' => 'required|string|max:255',
        ]);
    }


    protected function validarMiembroInfo(){
        return request()->validate([
            'club_id' => 'required',
            'category' => 'required',
            'fechaNacimiento' => 'required',
            'edad' => '',
            'direccion' => 'required',
            'provincia_colonia' => 'required',
            'codigoPostal' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'nacionalidad' => 'required',
            'tipoSangre' => 'required',
            'confirmaAlergias' => 'required',
            'alergia' => '',
            'sexo' => 'required',

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
