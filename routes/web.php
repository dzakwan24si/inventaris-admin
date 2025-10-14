<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [InventarisController::class, 'index']);

// Route untuk auth
Route::get('/auth/login', [AuthController::class, 'index'])->name('auth.login.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('auth.register.form');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

// Route untuk dashboard admin
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/', function () {
    return redirect('/auth/login');
});