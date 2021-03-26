<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\MiembrosController;

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
    Route::get('/dashboard', [ClubsController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('/club', [ClubsController::class, 'index'])->middleware(['auth']);
    Route::post('/club', [ClubsController::class, 'store']);
    Route::get('club/{clubs}', [ClubsController::class, 'show'])->name('club.show');
    Route::get('/club/edit/{clubs}', [ClubsController::class, 'edit']);
    Route::put('/club/{clubs}', [ClubsController::class, 'update']);
    Route::delete('/club/soft/{clubs}', [ClubsController::class, 'softDelete']);
    Route::delete('/club/{clubs}', [ClubsController::class, 'destroy']);

/* Miembros */
    Route::get('/miembros', [MiembrosController::class, 'index']);


require __DIR__.'/auth.php';
