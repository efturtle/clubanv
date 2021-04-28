<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DirectorInfo;

class DirectorInfoController extends Controller
{
    public function index()
    {
        return view('users.index', ['directors' => DirectorInfo::all()]);
    }

    public function indexDirector()
    {
        return view('users.index', ['directors' => DirectorInfo::where('rol', '>', 3)->where('rol', '!=', 0)->get()]);
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
        return redirect('/index')
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
        return view('user.show', compact('user'));
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
