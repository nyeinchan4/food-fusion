<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('core.home');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('recipes', RecipeController::class)->only(['index', 'show', 'create']);

Route::middleware('auth')->group(function () {
    Route::resource('recipes', RecipeController::class)->except(['index', 'show']);
});
