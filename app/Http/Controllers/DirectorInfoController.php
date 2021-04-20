<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\clubs;
use App\Models\DirectorInfo;
use Illuminate\Auth\Events\Registered;

class DirectorInfoController extends Controller
{
    public function index()
    {
        return view('user.index', ['users' => DirectorInfo::all()]);
    }

    public function create()
    {
        return view('user.create', ['clubs' => DB::table('clubs')->get()]);
    }

    public function new($rol)
    {
        return view('directivos.create', ['rol' => $rol]);
    }

    public function store(Request $request)
    {
        switch ($request->rol) {
            case 1:
                //create director
                break;
            case 2:
                //create secretario/encargado
                $this->storeSecretaria($request);
                break;
            case 3:
                //create director
                break;
            
            default:
                return redirect('/home');
                break;
        }
        //validar user info
        //create the user
        //create the director
    }
    
    protected function storeSecretaria($request)
    {
        //validate user info
        $this->validarUser();
        //create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);       
        //create the director
        DirectorInfo::create([
            'rol' => $request->rol,
            'user_id' => $user->id
        ]);
    }

    public function storeDirectorCategory(Request $request)
    {
        //request info // ask for the validation of unique email address
        //hash password
        $this->validarUser();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //event(new Registered($user));

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
            //under maintenance!!
        //$this->updateCategoryDirector($request->category);
        
        return redirect(route('user.show', ['user'=>$director]))
        ->with('message', 'Usuario Director Registrado');
    }

    

    public function storeEncargado()
    {
        
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

    //unfinished, change the club category director as a new director is created.
    //must do a join here to make it dynamic
    protected function updateCategoryDirector($category){
        $club = new clubs;
        switch ($club) {
            case 1:
                $club->category;
                break;
            case 2:
                # code...
                break;
            case 3:
                # code...
                break;
            default:
                # code...
                break;
        }
    }
}
