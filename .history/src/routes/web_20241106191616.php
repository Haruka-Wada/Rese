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
Route::post('/detail', [ReseController::class, 'detail']);
Route::middleware('auth')->group(function() {
    Route::get('/mypage', [ReseController::class, 'myPage']);
    Route::post('/favorite', [ReseController::class, 'favorite']);
    Route::post('/reservation', [ReseController::class, 'reservation']);
    Route::post('/reservation_delete',[<ReseCo></ReseCo>])
});
