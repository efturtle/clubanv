<?php

namespace App\Http\Controllers;

use App\Models\clubs;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    public function index()
    {
        return view('clubes.main', [
            'clublist' => clubs::latest()->get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        clubs::create($request->validate([
            'nombreClub' => 'required',
            'significado' => 'required',
            'iglesia' => 'required',
            'director' => 'required',
            'subdirector' => '',
            'subdirectora' => '',
            'tesorero' => '',
            'secretario' => '',
            'pastor' => '',
            'anciano' => '',
            'fechaAprobacion' => '',
            'numeroVoto' => ''
        ]));
        return redirect('/club')
        ->with('message', '¡club registrado!');
    }

    
    public function show(clubs $clubs)
    {
        return view('clubes.show');
    }

    public function edit(clubs $clubs)
    {
        //
    }

    
    public function update(Request $request, clubs $clubs)
    {
        //
    }

    
    public function destroy(clubs $clubs)
    {
        //
    }
}
