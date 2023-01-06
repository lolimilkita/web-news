<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'logout']);
    Route::post('/posts', [PostController::class, 'store'])->middleware('is_admin');
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('is_admin');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('is_admin');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);
