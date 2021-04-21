<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DirectorInfo;

class DirectorInfoController extends Controller
{
    public function index()
    {
        return view('user.index', ['directors' => DirectorInfo::all()]);
    }

    public function new($rol)
    {
        return view('directivos.create', ['rol' => $rol]);
    }

    public function asignar($type)
    {
        return view('directivos.asignar', ['type' => $type]);
    }

    public function asignacion()
    {
        
    }

    public function store(Request $request)
    {
        //request info
        $this->validarUser();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($request->rol < 4){
            $this->storeDirectivoAlto($request->rol, $user);
            return redirect('/user')
            ->with('message', 'Nuevo usuario directivo creado!');    
        }
        $this->storeDirectivo($request->rol, $user);
        return redirect('/user')
        ->with('message', 'Nuevo usuario creado!');
    }

    protected function storeDirectorCategory($request, $user)
    {
        /* director creation */
        //$this->validarDirectorInfo();

        /* DirectorInfo::create([
            'rol' => 3,
            'email' => $user->email,
            'club' => $request->club,
            'categoria' => $request->category,
            'direccion' => $request->direccion,
            'codigoPostal' => $request->codigoPostal,
            'sexo' => $request->sexo,
            'tipoSangre' => $request->tipoSangre,
            'nacionalidad' => $request->nacionalidad,
            'estado' => $request->estado,
            'ciudad' => $request->ciudad,
            'user_id' => $user->id
        ]); */
        DirectorInfo::create([
            'rol' => $request->rol,
            'user_id' => $user->id
        ]);

    }
    
    protected function storeDirectivo($rol, $user)
    {
        DirectorInfo::create([
            'rol' => $rol,
            'user_id' => $user->id
        ]);
    }
    protected function storeDirectivoAlto($rol, $user)
    {
        $director = DirectorInfo::create([
            'rol' => $rol,
            'user_id' => $user->id
        ]);
        $director->update([
            'asignado' => true
        ]);
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
