<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);      // GET /api/posts
    Route::get('/posts/{id}', [PostController::class, 'show']);  // GET /api/posts/{id}
    Route::post('/posts', [PostController::class, 'store']);     // POST /api/posts
});
    Route::post('/logout', [AuthController::class, 'logout']);