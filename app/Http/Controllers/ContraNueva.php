<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ContraNueva extends Controller
{
    public function barra()
    {
        return view('contra.cambiar');
    }

    public function storeCambio(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);
        $user = User::find(Auth::user()->id);
        
        //update
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('home'))
        ->with('message', 'Su clave ha sido actualizada!');
    }

    public function resetPassword(User $user)
    {
        //generate password
        $password = strtok($user->name, ' ');
        //generate random number
        if(strlen($user->name) < 4){
            $number = random_int(10000, 20000);
        }else{
            $number = random_int(1000, 2000);
        }
        //update
        $user->update([
            'password' => Hash::make($password.=$number),
        ]);
        //redirect screen with new password
        //same method for member and director, just redirect differently
        if(!is_null($user->miembro)){
            return redirect(route('user.miembro.show', $user))
            ->with('message', 'nueva contraseña: '.$password);
        }else if(!is_null($user->director)){
            return redirect(route('user.show', $user))
            ->with('message', 'nueva contraseña: '.$password);
        }
    }
}
