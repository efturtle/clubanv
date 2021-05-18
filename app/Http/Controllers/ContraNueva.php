<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $user = Auth::user();
        $use = User::find($user->id);
        
        //update
        $use->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('user.show', $use))
        ->with('message', 'clave actualizada!');
    }

    public function resetPassword(User $user)
    {
        $password = strtok($user->name, ' ');
        //generate random password
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
        return redirect(route('user.show', $user))
        ->with('message', 'nueva contraseña: '.$password);
    }
}
