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



/* Clubs */
    Route::get('/club', [ClubsController::class, 'index']);
    Route::post('/club', [ClubsController::class, 'store']);
    Route::get('club/{club}', [ClubsController::class, 'show'])->name('club.show');
    


