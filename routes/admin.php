<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;



Route::get('login', [UserController::class, 'login'])->name('admin.login');
Route::middleware('auth')->group(function() {
    Route::get('/', function() {
        return view('welcome');
    });
});
