<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Club;
use App\Models\Miembro;

class FiltrosUsuarios extends Controller
{
    public function usuarios($type)
    {
        switch ($type) {
            case 1:
                //sin asignar
                return view('users.index', [
                    'directors' => Director::where('asignado', '=', 0)->get()
                ]);
                break;
            case 2:
                //asignados
                return view('users.index', [
                    'directors' => Director::where('asignado', '=', 1)->get()
                ]);
                break;
            case 3:
                //directivos
                return view('users.index', [
                    'directors' => Director::where('rol', '<', 5)->get()
                ]);
                break;
            
            default:
                return redirect(route('user.index'));
                break;
        }
    }

    public function miembros($categoria, Club $club)
    {
        switch ($categoria) {
            case 1:
                return view('miembros.index', [
                    'miembros' => Miembro::where('category', '=', 1)->get()
                ]);
                break;
            case 2:
                return view('miembros.index', [
                    'miembros' => Miembro::where('category', '=', 2)->get()
                ]);
                break;
            case 3:
                return view('miembros.index', [
                    'miembros' => Miembro::where('category', '=', 3)->get()
                ]);
                break;
            case 4:
                return 'not working yet';
                break;
            
            default:
                return redirect(route('miembros.index'));
                break;
        }
    }
}
