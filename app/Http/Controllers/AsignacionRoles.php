<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\DirectorInfo;

class AsignacionRoles extends Controller
{
    public function usuario()
    {
        return 'usuario';
    }

    public function pastor(Club $clubs)
    {
        $pastors = DirectorInfo::all()->where('rol', '=', 4)
        ->where('asignado', '=', 0);
        return $pastors->user->name;
        return view('asignar.index', [
            'clubs' => $clubs,
            'pastors' => DirectorInfo::all()
        ]);
    }

    public function director(Club $clubs)
    {
        return 'director';
    }
}