<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Miembro;
use App\Models\User;

class BusquedaController extends Controller
{
    public function miembro(Request $request)
    {
        //request->busqueda is in search
        //this could be either category, club or nombre
        //separeted by different types of search, the end result will be several collections (3 in total)

        /* First collection */
        //search club name for id
        //club is eloquent, so would have to use club->id
        $club = DB::table('clubs')->where('nombreClub', 'LIKE', "%{$request->busqueda}%")->first();
        
        /* Second Collection */
        //category, switch to translate to words
        //cases for each category
        //in each case we can return the result of members being in this category
        //$category = $this->switchCategory($request->busqueda);

        /* Third Collection */
        //this is users, using like term we search for there name in the users table
        //$names = DB::table('users')->where('name', 'LIKE', "%{$request->busqueda}%")->get();


        //return $this->switchCategory('aven');
        //return User::where('name', 'LIKE', "%a%")->get();
        //return Miembro::where('category', '=', 1)->get();



        //end result
        if(is_null($club)){
            return view('miembros.search', [
                'clubs' => 'name',
                'categories' => $this->switchCategory($request->busqueda),
                'miembros' => User::where('name', 'LIKE', "%{$request->busqueda}%")->get()
            ]);    
        }
        if(is_null($this->switchCategory($request->busqueda))){
            return view('miembros.search', [
                'clubs' => Miembro::where('club_id','=', $club->id)->get(),
                'categories' => 'name',
                'miembros' => User::where('name', 'LIKE', "%{$request->busqueda}%")->get()
            ]);    
        }
        /* if(is_null($club) && is_null($this->switchCategory($request->busqueda))){
            return view('miembros.search', [
                'clubs' => 'name',
                'categories' => 'name',
                'miembros' => User::where('name', 'LIKE', "%{$request->busqueda}%")->get()
            ]);    
        } */

        return view('miembros.search', [
            'clubs' => Miembro::where('club_id','=', $club->id)->get(),
            'categories' => $this->switchCategory($request->busqueda),
            'miembros' => User::where('name', 'LIKE', "%{$request->busqueda}%")->get()
        ]);

        
    }

    protected function switchCategory($busqueda)
    {
        //depending on what the person is searching, return collection of results
        switch ($busqueda) {
            case 'aventureros':
                return Miembro::where('category', 1)->get();
                break;
            case 'aven':
                return Miembro::where('category','=', 1)->get();
                break;
            case 'aventura':
                return Miembro::where('category','=', 1)->get();
                break;
            case 'conquistadores':
                return Miembro::where('category','=', 2)->get();
                break;
            case 'con':
                return Miembro::where('category','=', 2)->get();
                break;
            case 'conquistador':
                return Miembro::where('category','=', 2)->get();
                break;
            case 'guias':
                return Miembro::where('category','=', 3)->get();
                break;
            case 'guias mayores':
                return Miembro::where('category','=', 3)->get();
                break;
            case 'mayores':
                return Miembro::where('category','=', 3)->get();
                break;
        }
    }
}