<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\MiembrosInfoController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DirectorInfoController;
use App\Http\Controllers\DistritoController;
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

/* Clubs */
    Route::get('dashboard', function(){
        return redirect('/club');
    })->middleware(['auth']);

    /* Directiva */
    //  /directivos/create/0   /directivos/create/1   /directivos/create/2
    

    Route::get('/club', [ClubsController::class, 'index'])->middleware(['auth', 'chief']);
    Route::get('/club/create', [ClubsController::class, 'create'])->middleware(['auth', 'chief']);
    Route::get('club/{clubs}', [ClubsController::class, 'show'])->middleware(['auth', 'chief'])->name('club.show');
    Route::post('/club', [ClubsController::class, 'store'])->middleware(['auth', 'chief']);
    Route::get('/club/edit/{clubs}', [ClubsController::class, 'edit'])->middleware(['auth', 'chief']);
    Route::put('/club/{clubs}', [ClubsController::class, 'update'])->middleware(['auth', 'chief']);
    //Route::delete('/club/soft/{clubs}', [ClubsController::class, 'softDelete'])->middleware(['auth']);
    //Route::delete('/club/{clubs}', [ClubsController::class, 'destroy'])->middleware(['auth']);

/* Miembros */
    Route::get('/miembros', [MiembrosInfoController::class, 'index'])->middleware('auth');
    Route::post('/miembro', [MiembrosInfoController::class, 'store'])->middleware(['auth', 'isCreator']);
    Route::get('/miembros/{miembrosinfo}', [MiembrosInfoController::class, 'show'])->middleware(['auth', 'isCreator'])->name('miembro.show');

    Route::get('/miembros/edit/{miembrosinfo}', [MiembrosInfoController::class, 'edit'])->middleware('auth');
    Route::put('/miembro/{miembros}', [MiembrosInfoController::class, 'update'])->middleware('auth');
    Route::delete('/miembro/soft/{miembros}', [MiembrosInfoController::class, 'softDelete'])->middleware('auth');
    Route::delete('/miembro/{miembros}', [MiembrosInfoController::class, 'destroy'])->middleware('auth');

/* Users */
    /* Create */ Route::get('/user/create', [DirectorInfoController::class, 'create'])->middleware(['auth', 'chief']);
    /* Create V2 */ Route::get('/directivos/create/{type}', [DirectorInfoController::class, 'new'])->middleware(['auth']);
    /* store */ Route::post('/user', [DirectorInfoController::class, 'store'])->middleware(['auth', 'chief']);
    /* show */ Route::get('/user/{user}', [DirectorInfoController::class, 'show'])->middleware(['auth', 'chief'])->name('user.show');
    /* index */ Route::get('/user', [DirectorInfoController::class, 'index'])->middleware(['auth', 'chief']);
    /* Asignar */ Route::get('/directivos/asignar/{type}', [DirectorInfoController::class, 'asignar'])->middleware(['auth','chief']);

    /* 
    Route::get('/user/{user}/edit', [UsuarioAdminController::class, 'edit'])->middleware('auth');
    
    Route::put('user/{user}', [UsuarioAdminController::class, 'update'])->middleware('auth');
    
    Route::delete('/user/soft/{user}', [UsuarioAdminController::class, 'softDelete'])->middleware('auth');
    
    Route::delete('/user/{user}', [UsuarioAdminController::class, 'destroy'])->middleware('auth');
 */

 /* Distritos */
    Route::get('/distrito/create', [DistritoController::class, 'create']);
    Route::post('/distrito', [DistritoController::class, 'store']);

/* Posts */
    /* index */Route::get('/posts', [PostsController::class, 'index'])->middleware('auth');
    /* store */Route::post('/posts', [PostsController::class, 'store'])->middleware(['auth', 'director']);
    /* delete */Route::get('/posts/soft/{post}', [PostsController::class, 'delete'])->middleware(['auth', 'director']);


    Route::get('restart', function(){
        //create the user
        Auth::login($user = User::create([
            'name' => 'Beto Cuevas',
            'email' => 'asd@mail.com',
            'password' => Hash::make('happycode'),
        ]));
        //create club
        Club::create([
            'nombreClub' => 'Centinelas',
            'significado' => 'guardianes',
            'iglesia' => 'tajin',
            'director' => 'beto',
            'subdirector' => 'manny',
            'subdirectora' => 'kevin',
            'tesorero' => 'roger',
            'secretario' => 'tom gun',
            'pastor' => 'jimy',
            'anciano' => 'gordo',
            'fechaAprobacion' => '2021-12-12',
            'numeroVoto' => '123',
            'foto' => 'ola.png',
            'user_id' => Auth::user()->id
        ]);
        //create director
        DirectorInfo::create([
            'rol' => 1, 
            'club' => 'Centinelas', 
            'category' => 2, 
            'direccion' => 'tonala norte 9153', 
            'codigoPostal' => '44700', 
            'sexo' => 'hombre', 
            'tipoSangre' => 'o+', 
            'nacionalidad' => 'mexicana', 
            'estado' => 'Jalisco', 
            'ciudad' => 'Zapopan', 
            'user_id' => Auth::user()->id,
        ]);
    });

    Route::get('/test', [PostsController::class, 'info'])->middleware('auth');

require __DIR__.'/auth.php';
