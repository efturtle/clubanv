<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DirectorInfo;
use Illuminate\Auth\Events\Registered;

class DirectorInfoController extends Controller
{
    public function create()
    {
        return view('user.create', ['clubs' => DB::table('clubs')->get()]);
    }

    public function store(Request $request)
    {
        //request info // ask for the validation of unique email address
        //hash password
        $this->validarUser();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        
        /* director creation */
        $this->validarDirectorInfo();

        $director = DirectorInfo::create([
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
        ]);
        
        return redirect(route('user.show', ['user'=>$director]))
        ->with('message', 'Usuario Director Registrado');
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
