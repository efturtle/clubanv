<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\MiembrosInfoController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DirectorInfoController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\AsignacionRoles;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DirectorInfo;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('loginscreen');
Route::get('/index', function(){
    return view('index');
})->middleware('auth');

Route::get('/dash', function(){
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/* Clubs */
Route::get('/club', [ClubsController::class, 'index'])->middleware(['auth', 'pastor'])->name('club');
Route::get('club/{clubs}', [ClubsController::class, 'show'])->middleware(['auth', 'pastor'])->name('club.show');
Route::get('clubcrear', [ClubsController::class, 'create'])->middleware(['auth', 'pastor'])->name('clubes.crear');
Route::post('/club', [ClubsController::class, 'store'])->middleware(['auth', 'pastor'])->name('club.store');
Route::get('/club/edit/{clubs}', [ClubsController::class, 'edit'])->middleware(['auth', 'pastor'])->name('club.edit');
Route::put('/club/{clubs}', [ClubsController::class, 'update'])->middleware(['auth', 'pastor'])->name('club.update');
Route::delete('/club/soft/{clubs}', [ClubsController::class, 'softDelete'])->middleware(['auth', 'pastor'])->name('club.delete');
Route::delete('/club/{clubs}', [ClubsController::class, 'destroy'])->middleware(['auth', 'chief'])->name('club.destroy');


/* Users */
Route::get('/user', [DirectorInfoController::class, 'index'])->middleware(['auth', 'pastor'])->name('user.index');
Route::get('/user/directors', [DirectorInfoController::class, 'indexDirector'])->middleware(['auth', 'director'])->name('directors.index');
Route::get('/director/create/{type}', [DirectorInfoController::class, 'newDirector'])->middleware(['auth','pastor'])->name('director.create');
Route::get('/directivos/create/{type}', [DirectorInfoController::class, 'newDirective'])->middleware(['auth','chief'])->name('directive.create');
Route::post('/user/directive', [DirectorInfoController::class, 'storeDirective'])->middleware(['auth', 'chief']);
Route::post('/user/director', [DirectorInfoController::class, 'storeDirector'])->middleware(['auth', 'pastor']);
Route::get('/user/{user}', [DirectorInfoController::class, 'show'])->middleware(['auth', 'chief'])->name('user.show');
Route::delete('/user/soft/{user}', [DirectorInfoController::class, 'delete'])->middleware(['auth', 'chief'])->name('user.delete');
Route::delete('/user/{user}', [DirectorInfoController::class, 'destroy'])->middleware(['auth', 'chief'])->name('user.destroy'); 
Route::get('/user/edit/{user}', [DirectorInfoController::class, 'edit'])->middleware(['auth', 'chief'])->name('user.edit');
Route::put('user/{user}', [DirectorInfoController::class, 'update'])->middleware(['auth', 'chief'])->name('user.update');


/* Distritos */
Route::get('/distrito', [DistritoController::class, 'index'])->middleware(['auth', 'pastor'])->name('distritos.index');
Route::get('/distrito/create', [DistritoController::class, 'create'])->middleware(['auth', 'chief'])->name('distritos.create');
Route::get('/distrito/{distrito}', [DistritoController::class, 'show'])->middleware(['auth', 'pastor'])->name('distrito.show');
Route::post('/distrito', [DistritoController::class, 'store'])->middleware(['auth', 'chief'])->name('distrito.store');
Route::get('distrito/edit/{distrito}', [DistritoController::class, 'edit'])->middleware(['auth', 'chief'])->name('distrito.edit');
Route::delete('distrito/delete/{distrito}', [DistritoController::class, 'delete'])->middleware(['auth', 'chief'])->name('distrito.delete');
Route::delete('distrito/destroy/{distrito}', [DistritoController::class, 'destroy'])->middleware(['auth', 'chief'])->name('distrito.destroy');
Route::put('distrito/{distrito}', [DistritoController::class, 'update'])->middleware(['auth', 'chief'])->name('distrito.update');


/* Miembros */

/* Posts */


/* store Directive*/ 
/* store Director*/ 
/* Clubs */
    Route::get('dashboard', function(){
        return redirect('/club');
    })->middleware(['auth']);

/* Maintanence */
    Route::get('maintenance', function(){
        return view('maintenance');
    });

    /* Directiva */
    //  /directivos/create/0   /directivos/create/1   /directivos/create/2
    
    

/* Miembros */
    Route::get('/miembros', [MiembrosInfoController::class, 'index'])->middleware('auth');
    Route::post('/miembro', [MiembrosInfoController::class, 'store'])->middleware(['auth', 'isCreator']);
    Route::get('/miembros/{miembrosinfo}', [MiembrosInfoController::class, 'show'])->middleware(['auth', 'isCreator'])->name('miembro.show');

    Route::get('/miembros/edit/{miembrosinfo}', [MiembrosInfoController::class, 'edit'])->middleware('auth');
    Route::put('/miembro/{miembros}', [MiembrosInfoController::class, 'update'])->middleware('auth');
    Route::delete('/miembro/soft/{miembros}', [MiembrosInfoController::class, 'softDelete'])->middleware('auth');
    Route::delete('/miembro/{miembros}', [MiembrosInfoController::class, 'destroy'])->middleware('auth');  

/* Posts */
    /* index */Route::get('/posts', [PostsController::class, 'index'])->middleware('auth');
    /* store */Route::post('/posts', [PostsController::class, 'store'])->middleware(['auth', 'director']);
    /* delete */Route::get('/posts/soft/{post}', [PostsController::class, 'delete'])->middleware(['auth', 'director']);

    Route::get('/test', [PostsController::class, 'info'])->middleware('auth');


/* Asignacion */
    /* Directivos */ Route::get('/asignar/pastor/{district}', [AsignacionRoles::class, 'asignarPastor'])->middleware(['auth','chief']);
    /* Directores */ Route::get('/asignar/coordinador/{district}', [AsignacionRoles::class, 'asignarCoordinador'])->middleware(['auth','chief']);


require __DIR__.'/auth.php';