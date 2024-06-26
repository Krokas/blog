<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CategoryController;



Route::get('login', [UserController::class, 'index'])->name('admin.login');
Route::post('login', [UserController::class, 'login']);
Route::get('user/verify/{hash}', [UserController::class, 'verify'])->name('admin.user.verify');
Route::post('user/verify/{hash}', [UserController::class, 'create']);




Route::middleware('auth')->group(function() {
    Route::get('logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('email')->group(function() {
        Route::get('preview/{template}', [EmailController::class, 'preview']);
    });

    Route::prefix('post')->group(function() {
        Route::get('list', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('new', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('new', [PostController::class, 'saveNew']);
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('admin.post.update');
        Route::post('{post}/edit', [PostController::class, 'update']);
        Route::get('{post}/delete', [PostController::class, 'delete'])->name('admin.post.delete');
    });

    Route::prefix('image')->group(function() {
        Route::get('list', [ImageController::class, 'index'])->name('admin.image.index');
        Route::get('new', [ImageController::class, 'create'])->name('admin.image.create');
        Route::post('new', [ImageController::class, 'saveNew']);
        Route::get('{image}', [ImageController::class, 'edit'])->name('admin.image.update');
        Route::post('{image}', [ImageController::class, 'update']);
    });

    Route::prefix('settings')->group(function() {
        Route::get('/', [SettingsController::class, 'index'])->name('admin.settings');
        Route::post('consent', [SettingsController::class, 'saveConsentModal'])->name('admin.settings.consent_modal');
        Route::post('privacy', [SettingsController::class, 'savePrivacy'])->name('admin.settings.privacy');
    });

    Route::prefix('category')->group(function() {
        Route::get('list', [CategoryController::class, 'index'])->name('admin.category.list');
        Route::get('new', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('new', [CategoryController::class, 'saveNew']);
        Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.update');
        Route::post('{category}/edit', [CategoryController::class, 'update']);
        Route::get('{category}/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });
});
