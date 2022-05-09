<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrivacyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get(config('settings.privacy.route'), [PrivacyController::class, 'index'])->name('privacy');
Route::get('{post:slug}', [PostController::class, 'index'])->name('post');
