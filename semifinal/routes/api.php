<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// 1. Authentication Routes (Public)
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

// 2. Protected Routes (Must have a valid Bearer Token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);   
    Route::post('/posts', [PostController::class, 'store']); 
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});