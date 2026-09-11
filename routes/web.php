<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Show User Profile
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

// Current User
Route::get('/me', [UserController::class, 'index'])->name('me');
Route::get('/me/edit', [UserController::class, 'edit'])->name('me.edit');
Route::put('/me', [UserController::class, 'update'])->name('me.update');

// Post
Route::group(['prefix' => 'post', 'controller' => PostController::class], function () {
    Route::get('/', 'index')->name('post');
    Route::get('/create', 'create')->name('post.create');
    Route::post('/', 'store')->name('post.store');
    Route::get('/{id}', 'show')->name('post.show');
    Route::post('/{id}/comments', 'storeComment')->name('post.comments.store');
    Route::get('/{id}/edit', 'edit')->name('post.edit');
    Route::put('/{id}', 'update')->name('post.update');
    Route::delete('/{id}', 'destroy')->name('post.destroy');
});
