<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [InventarisController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login.submit');