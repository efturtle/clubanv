<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DirectorInfo;

class DirectorInfoController extends Controller
{
    public function create()
    {
        return view('user.create', ['clubs' => DB::table('clubs')->get()]);
    }

    public function store()
    {
        $user = User::create($this->validarUser());

        $temp = $this->validarDirectorInfo();

        $temp += [
            'user_id' => $user->id,
            'email' => $user->email
        ];
        
        

        return [
            'asd' => DirectorInfo::create($temp),
            'qwe' => $user 
        ];
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
            'rol' => 'required',
            'club' => 'required',
            'categoria' => 'required',
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
