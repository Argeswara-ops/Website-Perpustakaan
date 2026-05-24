<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Article;

Route::get('/', function () {
    $books = \App\Models\Book::latest()->take(6)->get();
    $articles = \App\Models\Article::latest()->take(3)->get();
    $banners = \App\Models\Banner::all();
    return view('welcome', compact('books', 'articles', 'banners'));
});

Route::get('/articles', function () {
    $articles = Article::latest()->get();
    return view('articles.index', compact('articles'));
});

Route::get('/articles/{id}', function ($id) {
    $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
});

Route::get('/about', [\App\Http\Controllers\PageController::class, 'about']);
Route::get('/authors', [\App\Http\Controllers\PageController::class, 'authors']);

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index']);
Route::get('/books/{id}', [\App\Http\Controllers\BookController::class, 'show']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/forgot-password', [\App\Http\Controllers\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [\App\Http\Controllers\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [\App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [\App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    // User routes
    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard']);
        Route::post('/favorite', [UserController::class, 'addFavorite']);
        Route::post('/favorite/remove', [UserController::class, 'removeFavorite']);
        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/profile', [UserController::class, 'updateProfile']);
        Route::post('/send-password-code', [UserController::class, 'sendPasswordCode']);
    });
    
    // Admin routes
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::resource('/banners', \App\Http\Controllers\Admin\BannerController::class);
        Route::resource('/articles', \App\Http\Controllers\Admin\ArticleController::class);
        Route::resource('/books', \App\Http\Controllers\Admin\BookController::class);
    });
});
