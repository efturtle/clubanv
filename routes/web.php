<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\MiembrosController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsuarioAdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/test', function(){
    
    User::create([
        'name'=>'tim',
        'email'=>'asdf@mail.com',
        'password'=>'trejo1234',
        'rol'=>'member',
    ]);
    return 'hi';
}); */

/* Route::get('tester', function(){
    miembrosinfo::create([
        'nombre_completo'=>'beto',
        'fecha_nacimiento'=>'2020-12-12',
        'edad'=>'23',
        'direccion'=>'salome arias 2133',
        'codigoPostal'=>'47445',
        'sexo'=>'hombre',P
        'tipoSangre'=>'b+',
        'confirmaAlergias'=>'si',
        'alergia'=>'champis',
        'nacionalidad'=>'mexicana',
        'estado'=>'Jalisco',
        'ciudad'=>'Guadalajara',
        'user_id'=> Auth::id(),
    ]);
})->middleware('auth'); */








/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */
/* Clubs */
    Route::get('dashboard', function(){
        return redirect('/club');
    })->middleware(['auth']);

    Route::get('/club', [ClubsController::class, 'index'])->middleware(['auth']);
    Route::post('/club', [ClubsController::class, 'store'])->middleware(['auth']);
    Route::get('club/{clubs}', [ClubsController::class, 'show'])->middleware(['auth'])->name('club.show');
    Route::get('/club/edit/{clubs}', [ClubsController::class, 'edit'])->middleware(['auth']);
    Route::put('/club/{clubs}', [ClubsController::class, 'update'])->middleware(['auth']);
    Route::delete('/club/soft/{clubs}', [ClubsController::class, 'softDelete'])->middleware(['auth']);
    Route::delete('/club/{clubs}', [ClubsController::class, 'destroy'])->middleware(['auth']);

/* Miembros */
    Route::get('/miembros', [MiembrosController::class, 'index'])->middleware('auth');
    Route::post('/miembro', [MiembrosController::class, 'store'])->middleware('auth');
    Route::get('/miembros/{miembros}', [MiembrosController::class, 'show'])->middleware('auth')->name('miembro.show');
    Route::get('/miembros/edit/{miembros}', [MiembrosController::class, 'edit'])->middleware('auth');
    Route::put('/miembro/{miembros}', [MiembrosController::class, 'update'])->middleware('auth');
    Route::delete('/miembro/soft/{miembros}', [MiembrosController::class, 'softDelete'])->middleware('auth');
    Route::delete('/miembro/{miembros}', [MiembrosController::class, 'destroy'])->middleware('auth');

/* Users */
    /* index */Route::get('/user', [UsuarioAdminController::class, 'index'])->middleware('auth');
    /* store is inside the /route/auth called */  ///register
    /* show */Route::get('/user/{user}', [UsuarioAdminController::class, 'show'])->middleware('auth')->name('user.show');
    /* edit */Route::get('/user/{user}/edit', [UsuarioAdminController::class, 'edit'])->middleware('auth');
    /* update */ Route::put('user/{user}', [UsuarioAdminController::class, 'update'])->middleware('auth');
    /* soft delete */ Route::delete('/user/soft/{user}', [UsuarioAdminController::class, 'softDelete'])->middleware('auth');
    /* destroy */ Route::delete('/user/{user}', [UsuarioAdminController::class, 'destroy'])->middleware('auth');

/* $director = DirectorInfo::create([
            'rol' => 'director de categoria', 
            'email' => '',
            'club' => 'tigres', 
            'categoria' => 'aventuras', 
            'direccion' => 'tonala norte 9153', 
            'codigoPostal' => '44700', 
            'sexo' => 'hombre', 
            'tipoSangre' => 'o+', 
            'nacionalidad' => 'mexicana', 
            'estado' => 'Jalisco', 
            'ciudad' => 'Zapopan', 
            'user_id' => $user->id,
        ]); */

    Route::get('/tester', function(){
        $user = DB::table('users')->where('email','=','cglover@example.net')->get();
        return view('tester', ['user' => $user]);
    });
//DB::table('users')->take(1)->latest()->get() +1


    Route::get('/test', [PostsController::class, 'info'])->middleware('auth');



require __DIR__.'/auth.php';
