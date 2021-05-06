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
        return view('asignar.index', [
            'clubs' => $clubs,
            'users' => DirectorInfo::where('rol', '=', 4)                
                ->where('asignado', '=', 0)->get(),
            'type' => 1
        ]);
    }

    public function director(Club $clubs)
    {
        return view('asignar.index', [
            'clubs' => $clubs,
            'users' => DirectorInfo::where('rol', '=', 6)                
                ->where('asignado', '=', 0)->get(),
            'type' => 2
        ]);
    }

    public function storePastor(Request $request) 
    {
        //store this id inside the club pastor_id
        $club = Club::find($request->club);
        $club->update([
            'pastor_id' => $request->pastor,
        ]);
        //put assign 1 on directorinfo
        $directorinfo = DirectorInfo::find($request->pastor);
        $directorinfo->update([
            'asignado' => 1
        ]);
        //redirect
        return redirect(route('club'))
        ->with('message', 'pastor actualizado!');
    }

    public function storeDirector(Request $request)
    {
        //store this id inside the club director_id
        $club = Club::find($request->club);
        $club->update([
            'director_id' => $request->director,
        ]);
        //put assign 1 on directorinfo
        $directorinfo = DirectorInfo::find($request->director);
        $directorinfo->update([
            'asignado' => 1
        ]);
        //redirect
        return redirect(route('club'))
        ->with('message', 'pastor actualizado!');
    }

    public function storeAventuras(Request $request)
    {
        return $request;
    }

    public function storeConquistadores(Request $request)
    {
        return 'store conquistadores';
    }
    public function storeGuias(Request $request)
    {
        return 'store guias';
    }




    public function categoria(Club $clubs, $type)
    {
        switch ($type) {
            case 1:
                return view('asignar.categoria', [
                    'clubs' => $clubs,
                    'users' => DirectorInfo::where('rol', '=', 7)                
                        ->where('asignado', '=', 0)->get(),
                    'type' => 1
                ]);
                break;
            case 2:
                return view('asignar.categoria', [
                    'clubs' => $clubs,
                    'users' => DirectorInfo::where('rol', '=', 7)                
                        ->where('asignado', '=', 0)->get(),
                    'type' => 2
                ]);
                break;
            case 3:
                return view('asignar.categoria', [
                    'clubs' => $clubs,
                    'users' => DirectorInfo::where('rol', '=', 7)                
                        ->where('asignado', '=', 0)->get(),
                    'type' => 3
                ]);
                break;
            
            default:
                return redirect(route('club'))
                ->with('message', 'Hubo algun error, intentar de nuevo');
                break;
        }
    }

    
}