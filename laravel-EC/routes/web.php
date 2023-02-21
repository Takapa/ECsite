<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [ItemController::class, 'index'])->name('index');
    Route::get('/show', [ItemController::class, 'show'])->name('show');
    Route::post('/store', [ItemController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('edit');
    Route::patch('/{id}/update', [ItemController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [ItemController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/detail', [ItemController::class, 'detail'])->name('detail');

    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::patch('/{id}/user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/{id}/cart/index', [CartController::class, 'index'])->name('cart.index');
    Route::post('/{item_id}/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/{item_id}/cart/store_direct', [CartController::class, 'store_direct'])->name('cart.store_direct');
    Route::delete('/{id}/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/{id}/cart/show', [CartController::class, 'show'])->name('cart.show');
    Route::get('/{id}/cart/show_pay', [CartController::class, 'show_pay'])->name('cart.show_pay');
    Route::post('/buy/cart',[CartController::class,'buyCartItems'])->name('cart.buy');

    Route::resource('/history',HistoryController::class);
});
