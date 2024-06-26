<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function() {
    Route::prefix('post')->group(function() {
        Route::post('{post}/toggle', [PostController::class, 'apiToggle'])->name('api.admin.post.toggle');
    });

    Route::prefix('image')->group(function() {
        Route::delete('{image}', [ImageController::class, 'delete'])->name('api.admin.image.delete');
        Route::get('all', [ImageController::class, 'getAll']);
    });
});
