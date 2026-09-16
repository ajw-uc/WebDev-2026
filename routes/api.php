<?php

use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/{post}', [PostController::class, 'show']);
    Route::get('posts/{post}/comments', [PostController::class, 'comments']);
    Route::middleware(['auth:sanctum', 'verified'])->group(function (): void {
        Route::post('posts', [PostController::class, 'store']);
        Route::put('posts/{post}', [PostController::class, 'update']);
        Route::post('posts/{post}/comments', [PostController::class, 'comment']);
        Route::delete('posts/{post}/comments/{comment}', [PostController::class, 'destroyComment']);
        Route::post('posts/{post}/like', [PostController::class, 'like']);
        Route::delete('posts/{post}', [PostController::class, 'destroy']);
    });
});
