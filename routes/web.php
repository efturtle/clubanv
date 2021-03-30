<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\MiembrosController;
use App\Http\Controllers\UsuarioAdminController;


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
});

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

require __DIR__.'/auth.php';
