<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ConfigController;
use App\Http\Controllers\Back\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/post/{slug}', [FrontArticleController::class, 'show']);
Route::get('/articles', [FrontArticleController::class, 'index']);
Route::post('/articles/search', [FrontArticleController::class, 'index'])->name('search');
Route::get('category/{slug}', [FrontCategoryController::class, 'index']);


Route::middleware('auth')->group(function () {
    // Dashboard - semua user bisa akses
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Article - semua user bisa CRUD (controller handle ownership untuk non-admin)
    Route::resource('/article', ArticleController::class);

    // Users - semua user bisa lihat list dan edit profil sendiri
    Route::resource('/users', UserController::class)->only(['index', 'update']);

    // Admin only routes - kategori, config, user create/delete
    Route::middleware('adminMiddleware')->group(function () {
        Route::resource('/categories', CategoryController::class)->only([
            'index', 'store', 'update', 'destroy'
        ]);
        Route::resource('/config', ConfigController::class)->only([
            'index', 'update'
        ]);
        Route::resource('/users', UserController::class)->only(['store', 'destroy']);
    });

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

