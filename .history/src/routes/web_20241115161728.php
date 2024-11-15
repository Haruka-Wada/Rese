<?php

use App\Http\Controllers\ReseController;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\GlobalState\Restorer;

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

Route::get('/', [ReseController::class, 'index']);
Route::get('/thanks', [ReseController::class, 'thanks']);
Route::get('/done', [ReseController::class, 'done']);
Route::get('/detail/{shop', [ReseController::class, 'detail']);
Route::get('/search', [ReseController::class, 'search']);
Route::middleware('auth')->group(function() {
    Route::get('/mypage', [ReseController::class, 'myPage']);
    Route::post('/favorite', [ReseController::class, 'favorite']);
    Route::post('/reservation', [ReseController::class, 'reservation']);
    Route::post('/delete',[ReseController::class, 'reservationDelete']);
    Route::post('/edit', [ReseController::class, 'reservationEdit']);
    Route::post('update', [ReseController::class, 'reservationUpdate']);
});
