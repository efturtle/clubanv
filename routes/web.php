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
use App\Http\Controllers\FichaTecnicaController;
use App\Http\Controllers\BusquedaController;


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

Route::get('/home', function(){
    return view('home');
})->middleware(['auth'])->name('home');

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
Route::get('user', [DirectorController::class, 'index'])->middleware(['auth', 'pastor'])->name('user.index');
Route::get('user/directors', [DirectorController::class, 'indexDirector'])->middleware(['auth', 'director'])->name('directors.index');
Route::get('director/create/{type}', [DirectorController::class, 'newDirector'])->middleware(['auth','pastor'])->name('director.create');
Route::get('directivos/create/{type}', [DirectorController::class, 'newDirective'])->middleware(['auth','chief'])->name('directive.create');
Route::post('user/directive', [DirectorController::class, 'storeDirective'])->middleware(['auth', 'chief'])->name('new.directive');
Route::post('user/director', [DirectorController::class, 'storeDirector'])->middleware(['auth', 'pastor'])->name('new.director');
Route::get('user/{user}', [DirectorController::class, 'show'])->middleware(['auth', 'chief'])->name('user.show');
Route::get('user/miembro/{user}', [MiembroController::class, 'showUser'])->middleware(['auth', 'chief'])->name('user.miembro.show');

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
Route::get('miembro-create', [MiembroController::class, 'create'])->middleware(['auth', 'director'])->name('miembro.create');
Route::post('miembro-store', [MiembroController::class, 'store'])->middleware(['auth', 'director'])->name('miembro.store');
Route::get('miembro/{miembro}', [MiembroController::class, 'show'])->middleware(['auth', 'director'])->name('miembro.show');
Route::delete('baja-miembro/{miembro}', [MiembroController::class, 'delete'])->middleware(['auth', 'pastor'])->name('miembro.delete');
Route::delete('eliminar-miembro/{miembro}', [MiembroController::class, 'destroy'])->middleware(['auth', 'pastor'])->name('miembro.destroy');
/* Pending work on the courses, can change individualy and also by category and club */
Route::get('miembro/edit/{miembro}', [MiembroController::class, 'edit'])->middleware(['auth', 'director'])->name('miembro.edit');
Route::put('miembro/{miembro}', [MiembroController::class, 'update'])->middleware(['auth', 'director'])->name('miembro.update');

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


/* Cursos */
Route::get('crear-curso', [FichaTecnicaController::class, 'create'])->middleware(['auth', 'director'])->name('curso.create');
Route::get('curso-store', [FichaTecnicaController::class, 'store'])->middleware(['auth', 'director'])->name('curso.store');
Route::get('cambiar-curso', [FichaTecnicaController::class, 'cambiarCurso'])->middleware(['auth', 'director'])->name('curso.cambiar');

/* Reset Password */
Route::get('cambiar-contrasena', [ContraNueva::class, 'barra'])->middleware(['auth'])->name('cambiar.contra');
Route::post('cambiar-c', [ContraNueva::class, 'storeCambio'])->middleware(['auth'])->name('store.cambio');
Route::put('resetClave/{user}', [ContraNueva::class, 'resetPassword'])->middleware(['auth', 'pastor'])->name('store.reset');

/* Filtros */
Route::get('filtros/{type}', [FiltrosUsuarios::class, 'usuarios'])->middleware(['auth', 'chief'])->name('filtro.usuario');
Route::get('filtro-miembros/{categoria}/club/{club?}', [FiltrosUsuarios::class, 'miembros'])->middleware(['auth', 'director'])->name('filtro.miembros');

/* Estadisticas */
Route::get('estadisticas', [EstadisticasController::class, 'index'])->middleware(['auth', 'director'])->name('estadisticas.index');



/* Search */
Route::post('busqueda-miembro', [BusquedaController::class, 'miembro'])->middleware(['auth', 'director'])->name('busqueda.miembro');
Route::post('busqueda-usuarios', [BusquedaController::class, 'usuarios'])->middleware(['auth', 'director'])->name('busqueda.usuario');
Route::post('busqueda-club', [BusquedaController::class, 'club'])->middleware(['auth', 'pastor'])->name('busqueda.club');
Route::post('busqueda-distrito', [BusquedaController::class, 'distrito'])->middleware(['auth', 'pastor'])->name('busqueda.distrito');


Route::post('busqueda/usuario', function(){
    return "Esto aun esta bajo mantenimiento Su busqueda: ".request()->busqueda;
})->name('buscar.usuario');



/* Posts */
    /* index */Route::get('/posts', [PostsController::class, 'index'])->middleware('auth');
    /* store */Route::post('/posts', [PostsController::class, 'store'])->middleware(['auth', 'director']);
    /* delete */Route::get('/posts/soft/{post}', [PostsController::class, 'delete'])->middleware(['auth', 'director']);

require __DIR__.'/auth.php';