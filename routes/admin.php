<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\DashboardController;



Route::get('login', [UserController::class, 'index'])->name('admin.login');
Route::post('login', [UserController::class, 'login']);
Route::get('user/verify/{hash}', [UserController::class, 'verify'])->name('admin.user.verify');
Route::post('user/verify/{hash}', [UserController::class, 'create']);




Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('email')->group(function() {
        Route::get('preview/{template}', [EmailController::class, 'preview']);
    });
});
