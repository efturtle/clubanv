<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
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
        ->with('message', 'usuario ha ');
    }

    public function show(User $user) {
        return view('user.show', compact('user'));
    }

    public function index() {
        return view('user.index');
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
