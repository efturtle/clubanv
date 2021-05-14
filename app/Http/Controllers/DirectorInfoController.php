<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DirectorInfo;
use App\Models\Distrito;

class DirectorInfoController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'directors' => DirectorInfo::where('rol', '<', 7)->get(),
        ]); 
    }

    public function indexDirector()
    {
        return view('users.index', ['directors' => DirectorInfo::where('rol', '>', 6)->where('rol', '!=', 0)->get()]);
    }

    public function newDirective($rol)
    {
        return view('users.createDirective', ['rol' => $rol]);
    }

    public function newDirector($rol)
    {
        return view('users.createDirector', ['rol' => $rol, 'clubs' => DB::table('clubs')->get()]);
    }


    public function storeDirector(Request $request)
    {
        //request info
        $this->validarUser();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        DirectorInfo::create([
            'rol' => $request->rol,
            'user_id' => $user->id
        ]);
        return redirect(route('user.index'))
        ->with('message', 'Nuevo usuario Director Creado!');
    }


    public function storeDirective(Request $request)
    {
        //request info
        $this->validarUser();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //if it is a pastor or coordinator, start off not being assigned
        if($request->rol == 5 || $request->rol == 4){
            DirectorInfo::create([
                'rol' => $request->rol,
                'user_id' => $user->id
            ]);
            return redirect('/user')
            ->with('message', 'Nuevo usuario directivo creado!');        
        }
        //directive with assigned set to true, they don't belong to a specific club or district
        DirectorInfo::create([
            'rol' => $request->rol,
            'asignado' => 1,
            'user_id' => $user->id
        ]);
        return redirect('/user')
        ->with('message', 'Nuevo usuario directivo creado!');    
        
    }


    public function asignarDirectivo($type)
    {
        return view('directivos.asignar', ['type' => $type]);
    }


    public function asignarDirector($type)
    {
        return view('directivos.asignarDirectores', ['type' => $type]);
    }

    public function show(User $user) {
        return view('users.show', [
        'user' => $user,
        'clubs' => Club::where('director_id', '=', null)
        ->orWhere('pastor_id', '=', null)
        ->orWhere('directorAventurero_id', '=', null)
        ->orWhere('directorConquistador_id', '=', null)
        ->orWhere('directorGuiasMayores_id', '=', null)
        ->get(),
        'distritos' => Distrito::where('coordinador_id', '=', null)
        ->orWhere('pastor_id', '=', null)->get()
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect(route('user.index'))
        ->with('message', 'Se ha dado de baja un usuario');
    }

    public function destroy(User $user)
    {
        $user->forceDelete();
        return redirect(route('user.index'))
        ->with('message', 'Se ha eliminado un usuario');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $namemod = 0;
        $emailmod = 0;

        if($user->name != $request->name){
            $namemod = 1;
        }

        if($user->email != $request->email){
            $emailmod = 1;
        }

        if($user->name != $request->name && $user->email != $request->email){
            $user->update($request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]));
        }

        if($namemod==1 && $emailmod==0){
            $user->update($request->validate([
                'name' => 'required|string|max:255',
            ]));
        }
        if($namemod==0 && $emailmod==1){
            $user->update($request->validate([
                'email' => 'required|string|email|max:255|unique:users',
            ]));
        }
        
        return redirect(route('user.show', $user))
        ->with('message', 'usuario actualizado!');
    }

    protected function validarUser(){
        return request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',    
        ]);
    }
    protected function validarDirectorInfo(){
        return request()->validate([
            'club' => 'required',
            'category' => 'required',
            'direccion' => 'required',
            'codigoPostal' => 'required',
            'sexo' => 'required',
            'tipoSangre' => 'required',
            'nacionalidad' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
        ]);
    }
}
