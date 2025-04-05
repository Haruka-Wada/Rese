<?php

use App\Http\Controllers\ReseController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Owner;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\GlobalState\Restorer;
use Illuminate\Http\Request;

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
Route::get('/detail/{shop_id?}', [ReseController::class, 'detail'])->name('rese.detail');
Route::get('/search', [ReseController::class, 'search']);
Route::get('/test', [QrCodeController::class, 'test']);
Route::post('review/delete', [ReseController::class, 'reviewDelete']);

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
        Route::get('/review/edit', [ReseController::class, 'reviewEdit']);
        Route::post('/score/update', [ReseController::class, 'reviewUpdate']);
        Route::get('/success', [StripeController::class, 'success'])->name('success');
        Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
        Route::get('/checkout-payment', [StripeController::class, 'checkout'])->name('checkout.session');
    });
});

Route::prefix('admin')->group(function(){
    Route::middleware('auth:administrators')->group(function(){
        Route::get('/', [Admin\LoginController::class, 'index']);
        Route::post('/logout', [Admin\LoginController::class, 'logout']);
    });
    Route::get('/login', [Admin\LoginController::class, 'loginView'])->name('admin.loginView');
    Route::post('/login', [Admin\LoginController::class, 'login']);
});

Route::prefix('owner')->group(function () {
    Route::middleware('auth:administrators')->group(function () {
        Route::post('/register', [Owner\RegisterController::class, 'store']);
        Route::get('/mail', [Admin\MailableController::class, 'index']);
        Route::post('/send', [Admin\MailableController::class, 'send']);
    });
});

Route::prefix('owner')->group(function(){
    Route::middleware('auth:owners')->group(function() {
        Route::get('/', [Owner\OwnerController::class, 'index']);
        Route::post('/logout', [Owner\LoginController::class, 'logout']);
        Route::get('/edit', [Owner\OwnerController::class, 'edit']);
        Route::patch('/update', [Owner\OwnerController::class, 'update']);
        Route::get('/create', [Owner\OwnerController::class, 'create']);
        Route::post('/store', [Owner\OwnerController::class, 'store']);
        Route::delete('/delete', [Owner\OwnerController::class, 'destroy']);
    });
    Route::get('/login', [Owner\LoginController::class, 'loginView'])->name('owner.loginView');
    Route::post('/login', [Owner\LoginController::class, 'login']);
});