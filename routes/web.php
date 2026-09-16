<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup']);
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Show User Profile
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

// Current User
Route::middleware('auth')->group(function () {
    Route::get('/me', [UserController::class, 'index'])->name('me');
    Route::get('/me/edit', [UserController::class, 'edit'])->name('me.edit');
    Route::put('/me', [UserController::class, 'update'])->name('me.update');
    Route::get('/me/password', [UserController::class, 'editPassword'])->name('password.edit');
    Route::put('/me/password', [UserController::class, 'updatePassword'])->name('password.update');
});

// Post
Route::group(['prefix' => 'post', 'controller' => PostController::class], function () {
    Route::get('/', 'index')->name('post');
    Route::get('/create', 'create')->middleware('auth')->name('post.create');
    Route::post('/', 'store')->middleware('auth')->name('post.store');
    Route::get('/{id}', 'show')->name('post.show');
    Route::post('/{id}/comments', 'storeComment')->middleware('auth')->name('post.comments.store');
    Route::delete('/{id}/comments/{commentId}', 'destroyComment')->middleware('auth')->name('post.comments.destroy');
    Route::get('/{id}/edit', 'edit')->middleware('auth')->name('post.edit');
    Route::put('/{id}', 'update')->middleware('auth')->name('post.update');
    Route::delete('/{id}', 'destroy')->middleware('auth')->name('post.destroy');
});
