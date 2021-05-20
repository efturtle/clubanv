<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

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
}
