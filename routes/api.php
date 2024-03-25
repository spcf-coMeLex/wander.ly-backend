<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post\PostController,
    App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// **User
Route::prefix('user')->group(function () {
    Route::post('/create', [UserController::class, 'createCommunityPost']);
});

// **Post
Route::prefix('post')->group(function () {
    Route::post('community-post/create', [PostController::class, 'createCommunityPost']);
    Route::post('like-post/create',      [PostController::class, 'createLikePost']);
});

