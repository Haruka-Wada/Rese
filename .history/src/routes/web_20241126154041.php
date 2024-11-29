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
Route::get('/detail/{shop_id?}', [ReseController::class, 'detail']);
Route::get('/search', [ReseController::class, 'search']);

Route::middleware(['verified'])->group(function(){
    Route::middleware('auth')->group(function () {
        Route::get('/thanks', [ReseController::class, 'thanks']);
        Route::get('/mypage', [ReseController::class, 'myPage']);
        Route::post('/favorite', [ReseController::class, 'favorite']);
        Route::post('/reservation', [ReseController::class, 'reservation']);
        Route::get('/done', [ReseController::class, 'done']);
        Route::delete('/delete',[ReseController::class, 'reservationDelete']);
        Route::get('/edit', [ReseController::class, 'reservationEdit']);
        Route::patch('/edit/update', [ReseController::class, 'reservationUpdate']);
        Route::get('/review', [ReseController::class, 'review']);
        Route::post('/score', [ReseController::class, 'score']);
    });
});

Route::prefix('admin')->group(function(){
    Route::get('login', [Admin\loginController::class, 'index']);
    Route::post('login', [Admin\loginController::class, 'login']);
    Route::get('logout', [Admin\loginController::class, 'logout']);
    Route::get('/',)
})