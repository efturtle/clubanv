<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Director;
use App\Models\Distrito;

class DirectorController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'directors' => Director::where('rol', '<', 7)->latest()->paginate(7),
        ]); 
    }

    public function indexDirector()
    {
        return view('users.index', ['directors' => Director::where('rol', '>', 6)->where('rol', '!=', 0)->paginate(7)]);
    }

    public function newDirective($rol)
    {
        return view('users.createDirective', ['rol' => $rol]);
    }

    public function newDirector($rol)
    {
        return view('users.createDirector', ['rol' => $rol]);
    }


    public function storeDirector(Request $request)
    {
        //request info
        $this->validarUser();
        //generate password
        $password = $this->generatePassword($request->name);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password)
        ]);
        
        Director::create([
            'rol' => $request->rol,
            'user_id' => $user->id,
        ]);
        return redirect(route('user.index'))
        ->with('message', 'Nuevo usuario Director Creado! Contraseña = '.$password);
    }

    protected function generatePassword($name)
    {
        $name = strtok($name, ' ');
        if (strlen($name) > 6) {
            return $name.random_int(100,999);
        }
        return $name.random_int(10000, 99999);
    }


    public function storeDirective(Request $request)
    {
        //request info
        $this->validarUser();
        $password = $this->generatePassword($request->name);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        //if it is a pastor or coordinator, start off not being assigned
        if($request->rol == 5 || $request->rol == 4){
            Director::create([
                'rol' => $request->rol,
                'user_id' => $user->id
            ]);
            return redirect('/user')
            ->with('message', 'Nuevo usuario directivo creado! contraseña = '.$password);
        }
        //directive with assigned set to true, they don't belong to a specific club or district
        Director::create([
            'rol' => $request->rol,
            'asignado' => 1,
            'user_id' => $user->id
        ]);
        return redirect('/user')
        ->with('message', 'Nuevo usuario directivo creado! contraseña = '.$password);
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
        switch ($user->director->rol) {
            case 4:
                return view('users.show', [
                    'user' => $user,
                    'clubs' => Club::where('pastor_id', '=', null)->get(),
                    'distritos' => Distrito::where('coordinador_id', '=', null)
                    ->orWhere('pastor_id', '=', null)->get()
                ]);
                break;
            case 5:
                return view('users.show', [
                    'user' => $user,
                    'distritos' => Distrito::where('coordinador_id', '=', null)
                    ->orWhere('pastor_id', '=', null)->get()
                ]);
                break;
            case 6:
                return view('users.show', [
                    'user' => $user,
                    'clubs' => Club::where('director_id', '=', null)->get(),
                ]);
                break;
            case 7:
                return view('users.show', [
                    'user' => $user,
                    'clubs' => Club::where('directorAventurero_id', '=', null)
                    ->orWhere('directorConquistador_id', '=', null)
                    ->orWhere('directorGuiasMayores_id', '=', null)
                    ->get(),                    
                ]);
                break;
            
            default:
                return view('users.show', [
                    'user' => $user,
                ]);
                break;
        }
        /* return view('users.show', [
        'user' => $user,
        'clubs' => Club::where('director_id', '=', null)
        ->orWhere('pastor_id', '=', null)
        ->orWhere('directorAventurero_id', '=', null)
        ->orWhere('directorConquistador_id', '=', null)
        ->orWhere('directorGuiasMayores_id', '=', null)
        ->get(), */
        
    }

    public function delete(User $user)
    {
        //if user not assigned, just delete
        $director = Director::find($user->id);
        if($director->asignado == 0){
            $director->delete();
            $user->delete();
            return redirect(route('user.index'))
            ->with('message', 'Se ha dado de baja un usuario');
        }

        /* Assigned user */
        //searches in clubs and district models for the userid making sure it is now assigned
        $this->assignedUserRemoval($director);

        //delete after removing any attached info in other models
        $director->delete();
        $user->delete();
        return redirect(route('user.index'))
        ->with('message', 'Se ha dado de baja un usuario');
    }

    public function destroy(User $user)
    {        
        //if user not assigned, just delete
        $director = Director::find($user->id);
        if($director->asignado == 0){
            $director->forceDelete();
            $user->forceDelete();
            return redirect(route('user.index'))
            ->with('message', 'Se ha eliminado un usuario');
        }

        /* Assigned user */
        //searches in clubs and district models for the userid making sure it is now assigned
        $this->assignedUserRemoval($director);

        //destroy after removing any attached info in other models
        $director->forceDelete();
        $user->forceDelete();
        return redirect(route('distritos.index'))
        ->with('message', 'Se ha eliminado un usuario');
    }


    protected function assignedUserRemoval($director)
    {
        //search this id in clubs and districts
        //switch case, depending on what role he/she is in
        //update that row
        //remove user
        switch ($director->rol) {
            case 4:
                if (DB::table('clubs')->where('coordinador_id', $director->id)->exists()) {
                    $this->unlinkUser('clubs', 'pastor_id', $director->id, 1); 
                }
                if (DB::table('distritos')->where('coordinador_id', $director->id)->exists()) {
                    $this->unlinkUser('distritos', 'pastor_id', $director->id, 1); 
                }
                break;
            case 5:
                if(DB::table('clubs')->where('coordinador_id', $director->id)->exists()){
                    $this->unlinkUser('clubs', 'coordinador_id', $director->id, 1);
                }
                if (DB::table('distritos')->where('coordinador_id', $director->id)->exists()) {
                    $this->unlinkUser('distritos', 'coordinador_id', $director->id, 1);
                }
                break;
            case 6:
                $this->unlinkUser('clubs', 'director_id', $director->id, 0);
                break;
            case 7:
                if(DB::table('clubs')->where('directorAventurero_id', $director->id)->exists()){
                    $this->unlinkUser('clubs', 'directorAventurero_id', $director->id, 1);
                }
                if(DB::table('clubs')->where('directorConquistador_id', $director->id)->exists()){
                    $this->unlinkUser('clubs', 'directorConquistador_id', $director->id, 1);
                }
                if(DB::table('clubs')->where('directorGuiasMayores_id', $director->id)->exists()){
                    $this->unlinkUser('clubs', 'directorGuiasMayores_id', $director->id, 1);
                }
                break;
            
            default:
                //user is either: admin, director, secretary or encargado
                //consult these users on how they can be eliminated
                return redirect(route('home'))->with('message', 'usuarios directivos aun no se pueden eliminar');


                /* $director->forceDelete();
                $user->forceDelete();
                return redirect(route('user.index'))
                ->with('message', 'Se ha eliminado un usuario y se des-asigno un usuario'); */
                break;
        }
    }

    /* This method, receives the model it is going to update, the rol of the user,
     the id and if this role is named the same in the 2 different models (this to avoid double query, as seen in case 2) */
    protected function unlinkUser($model, $rol, $directorId, $multiple)
    {
        switch ($multiple) {
            case 1:
                if ($model == 'clubs') {
                    $temp = Club::where($rol, $directorId)->first();
                    $temp->update([
                        $rol => null,
                    ]);
                }
                if ($model == 'distritos') {
                    $temp = Distrito::where($rol, $directorId)->first();
                    $temp->update([
                        $rol => null,
                    ]);
                }
                break;
            case 2:
                if(DB::table($model)->where($rol, $directorId)->exists()){
                    if ($model == 'clubs') {
                        $temp = Club::where($rol, $directorId)->first();
                        $temp->update([
                            $rol => null,
                        ]);
                    }
                    if ($model == 'distritos') {
                        $temp = Distrito::where($rol, $directorId)->first();
                        $temp->update([
                            $rol => null,
                        ]);
                    }
                }
                break;
            default:
                break;
        }
        
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //2 variables to check if either the name or email where changed or both
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
