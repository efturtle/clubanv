<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\DirectorInfo;
use App\Models\Distrito;

class AsignacionRoles extends Controller
{
    public function usuario(DirectorInfo $director)
    {
        return $director;
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
        $club = Club::find($request->club);
        $club->update([
            'directorAventurero_id' => $request->aventuras
        ]);

        $directorinfo = DirectorInfo::find($request->aventuras);
        $directorinfo->update([
            'asignado' => 1
        ]);

        return redirect(route('club.show', $club))
        ->with('message', 'director de categoria aventuras actualizado!');
    }

    public function storeConquistadores(Request $request)
    {
        $club = Club::find($request->club);
        $club->update([
            'directorConquistador_id' => $request->conquistadores
        ]);

        $directorinfo = DirectorInfo::find($request->conquistadores);
        $directorinfo->update([
            'asignado' => 1
        ]);

        return redirect(route('club.show', $club))
        ->with('message', 'director de categoria conquistadores actualizado!');
    }

    public function storeGuias(Request $request)
    {
        $club = Club::find($request->club);
        $club->update([
            'directorGuiasMayores_id' => $request->guias
        ]);

        $directorinfo = DirectorInfo::find($request->guias);
        $directorinfo->update([
            'asignado' => 1
        ]);

        return redirect(route('club.show', $club))
        ->with('message', 'director de categoria guias actualizado!');
    }

    public function categoria($type, Club $clubs)
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

    public function asignarDistrito($type, Distrito $distrito)
    {
        switch ($type) {
            case 1:
                    return view('asignar.distrito', [
                        'distrito' => $distrito,
                        'users' => DirectorInfo::where('rol', '=', 4)
                        ->where('asignado', '=', 0)->get(),
                        'type' => 1
                    ]);
                break;
            case 2:
                    return view('asignar.distrito', [
                        'distrito' => $distrito,
                        'users' => DirectorInfo::where('rol', '=', 5)
                        ->where('asignado', '=', 0)->get(),
                        'type' => 2
                    ]);
                break;
            default:
                return redirect(route('club'))
                ->with('message', 'esta accion no es reconocida');
                break;
        }
    }


    public function storePastorDistrito()
    {
        return 'hello store pastor method';
    }

    public function storeCoordinadorDistrito()
    {
        return 'hello store coordinador method';
    }
    
}