<?php

namespace App\Http\Controllers;

use App\Models\FichaTecnica;
use Illuminate\Http\Request;

class FichaTecnicaController extends Controller
{    
    public function index()
    {
        //
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(FichaTecnica $fichaTecnica)
    {
        //
    }

    public function edit(FichaTecnica $fichaTecnica)
    {
        //
    }

    public function update(Request $request, FichaTecnica $fichaTecnica)
    {
        //
    }

    public function destroy(FichaTecnica $fichaTecnica)
    {
        //
    }

    public function cambiarCurso()
    {
        
    }

    /* 
    Para cambiar el curso de alguien, estaria cool que no solo se pueda cambiar el curso individualmente, pero tambien grupalmente.
     Menos trabajo para el que este cambiando el curso en el momento

    Podria mostrar los miembros de la categoria y el club deseado, mostrar sus nombres solamente y su identificador de escuela si tienen,
    y que muestre un boton que diga cambiar curso individualmente o cambiar para todos.
    

    */
}
