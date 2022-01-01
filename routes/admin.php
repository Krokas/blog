<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;



Route::get('login', [UserController::class, 'index'])->name('admin.login');
Route::post('login', [UserController::class, 'login']);
Route::get('user/verify/{hash}', [UserController::class, 'verify'])->name('admin.user.verify');


//TODO: will be moved to auth part
Route::prefix('email')->group(function() {
    Route::get('preview/{template}', [EmailController::class, 'preview']);
});

Route::middleware('auth')->group(function() {
    Route::get('/', function() {
        return view('welcome');
    });
});
