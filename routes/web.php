<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('auth.login');})->name('login.form');
Route::middleware('guest')->group(function (){
    //Auth
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register.form');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
});
Route::middleware('auth')->group(function (){
    //Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //User panels
    Route::get('/panel', [PanelController::class, 'mainPanel'])->name('user.panel');
});
