<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommunityPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CookieConsentController;
use App\Http\Controllers\EventController;
use App\Models\Recipe;
use App\Models\Post;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $featuredRecipes = Recipe::with(['user', 'cuisineType', 'dietaryType', 'difficulty'])
        ->latest('id')
        ->take(3)
        ->get();
    
    $recentPosts = Post::with(['user'])
        ->withCount(['likes', 'comments'])
        ->latest()
        ->take(3)
        ->get();
    
    $events = Event::active()
        ->ordered()
        ->take(5)
        ->get();
    
    $stats = [
        'recipes' => Recipe::count(),
        'posts' => Post::count(),
        'users' => DB::table('users')->count(),
    ];
    
    return view('core.home', compact('featuredRecipes', 'recentPosts', 'events', 'stats'));
});
Route::middleware('auth')->group(function () {
    Route::resource('recipes', RecipeController::class)->except(['index', 'show']);
    Route::resource('posts', CommunityPostController::class)->except(['index', 'show']);
    Route::post('posts/{post}/likes', [CommunityPostController::class, 'like'])->name('posts.like');
    Route::delete('posts/{post}/likes', [CommunityPostController::class, 'unlike'])->name('posts.unlike');
    Route::post('posts/{post}/comments', [CommunityPostController::class, 'comment'])->name('posts.comment');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class)->except(['create', 'store'])
        ->names('admin.contacts');
    Route::resource('events', EventController::class)
        ->names('admin.events');
});

$recipeCount = 0;
if (Schema::hasTable('recipes')) {
    $recipeCount = Recipe::count();
}
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

Route::post('/cookie-consent', [CookieConsentController::class, 'store'])
    ->name('cookie-consent.store');

Route::view('/privacy', 'legal.privacy')->name('privacy');
