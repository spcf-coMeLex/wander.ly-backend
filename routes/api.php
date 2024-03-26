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
    Route::post('/create', [UserController::class, 'create']);
});

// **Post
Route::prefix('post')->group(function () {
    // *Community Post
    Route::post('community-post/create',                   [PostController::class, 'createCommunityPost']);
    Route::get('community-post/{userPrincipalId}',         [PostController::class, 'showCommunityPost']);

    // *Award Post
    Route::post('award-post/create',                       [PostController::class, 'createAwardPost']);
    Route::get('award-post/{userPrincipalId}',             [PostController::class, 'showAwardPost']);

    // *Liked Post
    Route::post('like-post/create',                        [PostController::class, 'createLikePost']);
    Route::get('liked-post/{userPrincipalId}',             [PostController::class, 'showLikedPost']);

    // *Dislike Post
    Route::post('dislike-post/create',                     [PostController::class, 'createDislikePost']);
    Route::get('dislike-post/{userPrincipalId}',             [PostController::class, 'showDislikePost']);
});

