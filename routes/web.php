<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AccountController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AccountController::class, 'register'])->name('account.register');
Route::post('/register', [AccountController::class, 'postRegister'])->name('account.register');

Route::get('/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/login', [AccountController::class, 'postLogin'])->name('account.login');

Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});
