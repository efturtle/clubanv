<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioAdminController extends Controller
{
     public function index()
    {
        return view('user.index', [
            'users' => User::all()
        ]);
    }

    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    public function update(User $user){
        $user->update($this->validarUsuario());

        return redirect(route('user.show', $user))
        ->with('message', 'usuario ha sido actualizado');
    }

    public function destroy(User $user) {
        $user->forceDelete();
        return redirect('/user')
        ->with('message', 'usuari@ eliminad@');
    }

    public function show(User $user) {
        return view('user.show', compact('user'));
    }


    public function softDelete(User $user) {
        $user->delete();
        return redirect('/user')
        ->with('message', 'Se ha dado de baja un usuario');
    }

    protected function validarUsuario(){
        return request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);
    }
}
