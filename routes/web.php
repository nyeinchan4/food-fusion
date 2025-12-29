<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResourceController;
use App\Models\Recipe;

Route::get('/', function () {
    return view('core.home');
});
Route::middleware('auth')->group(function () {
    Route::resource('recipes', RecipeController::class)->except(['index', 'show']);
    Route::resource('posts', CommunityPostController::class)->except(['index', 'show']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class)->except(['create', 'store'])
        ->names('admin.contacts');
});

$recipeCount = Recipe::count();
Route::view('/about', 'about.index', compact('recipeCount'));

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::resource('posts', CommunityPostController::class)->only(['index', 'show']);

Route::resource('recipes', RecipeController::class)->only(['index', 'show']);

Route::resource('resource', ResourceController::class)->only(['index', 'show']);




