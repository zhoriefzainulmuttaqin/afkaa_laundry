<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register']);


// Pages Routes
Route::middleware('auth')->group(function () {
});
// Home
Route::get('/', [TransactionController::class, 'index']);
Route::get('/transaction', [TransactionController::class, 'index']);
Route::post('/add-to-cart', [TransactionController::class, 'store'])->name('add-to-cart');
Route::post('/transaction', [TransactionController::class, 'edit']);
Route::get('/transaction/{id}', [TransactionController::class, 'delete']);

// Cart
Route::get('/cart', [CartController::class, 'index']);
Route::post('/history', [CartController::class, 'store']);
Route::get('/cart/transfer', [CartController::class, 'transfer']);
Route::get('/delete-cart/{id_cart}', [CartController::class, 'deleteCart'])->name('delete-cart');

// History
Route::get('/history', [HistoryController::class, 'index']);
// Route::post('/history', [HistoryController::class, 'store']);
