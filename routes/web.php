<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubsController;
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

/* Route::get('/clubes', function(){
    return view('clubes');
});
 */
Route::get('/', function(){
    return view('index');
});


/* Clubs */
    Route::get('/club', [ClubsController::class, 'index']);
    Route::post('/club', [ClubsController::class, 'store']);
    Route::get('club/{clubs}', [ClubsController::class, 'show'])->name('club.show');
    Route::get('/club/edit/{clubs}', [ClubsController::class, 'edit']);
    Route::put('/club/{clubs}', [ClubsController::class, 'update']);
    Route::delete('/club/soft/{clubs}', [ClubsController::class, 'softDelete']);
    Route::delete('/club/{clubs}', [ClubsController::class, 'destroy']);
    


