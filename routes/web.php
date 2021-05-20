<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\AsignacionRoles;
use App\Http\Controllers\ContraNueva;
use App\Http\Controllers\FiltrosUsuarios;
use App\Http\Controllers\EstadisticasController;


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
Route::delete('/club/soft/{clubs}', [ClubsController::class, 'delete'])->middleware(['auth', 'pastor'])->name('club.delete');
Route::delete('/club/{clubs}', [ClubsController::class, 'destroy'])->middleware(['auth', 'chief'])->name('club.destroy');


/* Users */
Route::get('/user', [DirectorController::class, 'index'])->middleware(['auth', 'pastor'])->name('user.index');
Route::get('/user/directors', [DirectorController::class, 'indexDirector'])->middleware(['auth', 'director'])->name('directors.index');
Route::get('/director/create/{type}', [DirectorController::class, 'newDirector'])->middleware(['auth','pastor'])->name('director.create');
Route::get('/directivos/create/{type}', [DirectorController::class, 'newDirective'])->middleware(['auth','chief'])->name('directive.create');
Route::post('/user/directive', [DirectorController::class, 'storeDirective'])->middleware(['auth', 'chief'])->name('new.directive');
Route::post('/user/director', [DirectorController::class, 'storeDirector'])->middleware(['auth', 'pastor'])->name('new.director');
Route::get('/user/{user}', [DirectorController::class, 'show'])->middleware(['auth', 'chief'])->name('user.show');

Route::delete('/user/soft/{user}', [DirectorController::class, 'delete'])->middleware(['auth', 'chief'])->name('user.delete');


Route::delete('/user/{user}', [DirectorController::class, 'destroy'])->middleware(['auth', 'chief'])->name('user.destroy'); 
Route::get('/user/edit/{user}', [DirectorController::class, 'edit'])->middleware(['auth', 'chief'])->name('user.edit');
Route::put('user/{user}', [DirectorController::class, 'update'])->middleware(['auth', 'chief'])->name('user.update');


/* Distritos */
Route::get('/distrito', [DistritoController::class, 'index'])->middleware(['auth', 'pastor'])->name('distritos.index');
Route::get('/distrito/create', [DistritoController::class, 'create'])->middleware(['auth', 'chief'])->name('distritos.create');
Route::get('/distrito/{distrito}', [DistritoController::class, 'show'])->middleware(['auth', 'pastor'])->name('distrito.show');
Route::post('/distrito', [DistritoController::class, 'store'])->middleware(['auth', 'chief'])->name('distrito.store');
Route::get('distrito/edit/{distrito}', [DistritoController::class, 'edit'])->middleware(['auth', 'chief'])->name('distrito.edit');
Route::delete('distrito/delete/{distrito}', [DistritoController::class, 'delete'])->middleware(['auth', 'admin'])->name('distrito.delete');
Route::delete('distrito/destroy/{distrito}', [DistritoController::class, 'destroy'])->middleware(['auth', 'admin'])->name('distrito.destroy');
Route::put('distrito/{distrito}', [DistritoController::class, 'update'])->middleware(['auth', 'chief'])->name('distrito.update');


/* Miembros */
Route::get('miembros', [MiembroController::class, 'index'])->middleware(['auth', 'director'])->name('miembros.index');


Route::post('/miembro', [MiembroController::class, 'store'])->middleware(['auth', 'isCreator']);
Route::get('/miembros/{miembrosinfo}', [MiembroController::class, 'show'])->middleware(['auth', 'isCreator'])->name('miembro.show');
Route::get('/miembros/edit/{miembrosinfo}', [MiembroController::class, 'edit'])->middleware('auth');
Route::put('/miembro/{miembros}', [MiembroController::class, 'update'])->middleware('auth');
Route::delete('/miembro/soft/{miembros}', [MiembroController::class, 'softDelete'])->middleware('auth');
Route::delete('/miembro/{miembros}', [MiembroController::class, 'destroy'])->middleware('auth');  


/* Asignacion */
Route::get('asignar-usuario/{director}', [AsignacionRoles::class, 'usuario'])->middleware(['auth', 'chief'])->name('asignar.usuario');
Route::get('asignar-pastor/{clubs}', [AsignacionRoles::class, 'pastor'])->middleware(['auth', 'chief'])->name('asignar.pastor');
Route::get('asignar-director/{clubs}', [AsignacionRoles::class, 'director'])->middleware(['auth', 'chief'])->name('asignar.director');
Route::put('spastor', [AsignacionRoles::class, 'storePastor'])->middleware(['auth', 'chief'])->name('store.pastor');
Route::put('sdirector', [AsignacionRoles::class, 'storeDirector'])->middleware(['auth', 'chief'])->name('store.director');
Route::get('asignar-categoria/{type}/clubs/{clubs}', [AsignacionRoles::class, 'categoria'])->middleware(['auth', 'chief'])->name('store.categoria');
Route::put('saventuras', [AsignacionRoles::class, 'storeAventuras'])->middleware(['auth', 'chief'])->name('store.aventuras');
Route::put('sconquistadores', [AsignacionRoles::class, 'storeConquistadores'])->middleware(['auth', 'chief'])->name('store.conquistadores');
Route::put('sguias', [AsignacionRoles::class, 'storeGuias'])->middleware(['auth', 'chief'])->name('store.guias');
    /* Asignacion Distritos */
Route::get('asignar-distrito/{type}/distrito/{distrito}', [AsignacionRoles::class, 'asignarDistrito'])->middleware(['auth', 'chief'])->name('asignar.distrito');
Route::put('spastor-distrito/{distrito}', [AsignacionRoles::class, 'storePastorDistrito'])->middleware(['auth', 'chief'])->name('store.pastor.distrito');
Route::put('scoordinador-distrito/{distrito}', [AsignacionRoles::class, 'storeCoordinadorDistrito'])->middleware(['auth', 'chief'])->name('store.coordinador.distrito');


/* Reset Password */
Route::get('cambiar-contrasena', [ContraNueva::class, 'barra'])->middleware(['auth'])->name('cambiar.contra');
Route::post('cambiar-c', [ContraNueva::class, 'storeCambio'])->middleware(['auth'])->name('store.cambio');

Route::put('resetClave/{user}', [ContraNueva::class, 'resetPassword'])->middleware(['auth', 'pastor'])->name('store.reset');

/* Filtros */
Route::get('filtros/{type}', [FiltrosUsuarios::class, 'usuarios'])->middleware(['auth', 'chief'])->name('filtro.usuario');

/* Estadisticas */
Route::get('estadisticas', [EstadisticasController::class, 'index'])->middleware(['auth', 'director'])->name('estadisticas.index');



/* Search */
Route::post('busqueda/usuario', function(){
    return "Esto aun esta bajo mantenimiento Su busqueda: ".request()->busqueda;
})->name('buscar.usuario');

/* Posts */
    /* index */Route::get('/posts', [PostsController::class, 'index'])->middleware('auth');
    /* store */Route::post('/posts', [PostsController::class, 'store'])->middleware(['auth', 'director']);
    /* delete */Route::get('/posts/soft/{post}', [PostsController::class, 'delete'])->middleware(['auth', 'director']);

require __DIR__.'/auth.php';