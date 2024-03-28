<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GoogleAuthController;

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

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::get('category/{slug}', [WelcomeController::class, 'category'])->name('category');

Route::get('news-details/{slug}', [WelcomeController::class, 'newsDetails'])->name('news-details');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('news', NewsController::class);
});

// Google
Route::get('auth/google', [GoogleAuthController::class, 'redirect']);

Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);
