<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return redirect('home');
});

//Login//
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
//Register//
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
//Dashboard//
Route::get('/home', [HomeController::class, 'index']);


Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::get('admin/user', [DashboardController::class, 'user'])->middleware("auth");
});

Route::middleware(['user'])->group(function() {
    Route::get('/user', [UserController::class, 'index'])->middleware("auth");
});