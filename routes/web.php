<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowedUsersFeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login');
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup'])->middleware('throttle:signup');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [AuthController::class, 'verificationNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware('signed')
        ->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/feed/email/preview', [FollowedUsersFeedController::class, 'preview'])->name('feed.email.preview');
    Route::get('/feed/email/send', [FollowedUsersFeedController::class, 'send'])
        ->name('feed.email.send');
});

Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationController::class, 'open'])->name('notifications.open');
});

// Show User Profile
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}/network', [UserController::class, 'network'])->name('user.network');
Route::post('/user/{id}/follow', [UserController::class, 'follow'])->middleware(['auth', 'verified'])->name('user.follow');
Route::delete('/user/{id}/follow', [UserController::class, 'unfollow'])->middleware(['auth', 'verified'])->name('user.unfollow');

// Current User
Route::middleware('auth')->group(function () {
    Route::get('/me', [UserController::class, 'index'])->name('me');
    Route::get('/me/network', [UserController::class, 'network'])->name('me.network');
    Route::get('/me/edit', [UserController::class, 'edit'])->name('me.edit');
    Route::put('/me', [UserController::class, 'update'])->name('me.update');
    Route::get('/me/password', [UserController::class, 'editPassword'])->name('password.edit');
    Route::put('/me/password', [UserController::class, 'updatePassword'])->name('password.update');
});

// Post
Route::group(['prefix' => 'post', 'controller' => PostController::class], function () {
    Route::get('/', 'index')->name('post');
    Route::get('/create', 'create')->middleware(['auth', 'verified'])->name('post.create');
    Route::post('/', 'store')->middleware(['auth', 'verified', 'throttle:post'])->name('post.store');
    Route::get('/{id}', 'show')->name('post.show');
    Route::post('/{id}/comments', 'storeComment')->middleware(['auth', 'verified', 'throttle:comment'])->name('post.comments.store');
    Route::post('/{id}/like', 'toggleLike')->middleware(['auth', 'verified'])->name('post.like');
    Route::delete('/{id}/comments/{commentId}', 'destroyComment')->middleware(['auth', 'verified'])->name('post.comments.destroy');
    Route::get('/{id}/edit', 'edit')->middleware(['auth', 'verified'])->name('post.edit');
    Route::put('/{id}', 'update')->middleware(['auth', 'verified'])->name('post.update');
    Route::delete('/{id}', 'destroy')->middleware(['auth', 'verified'])->name('post.destroy');
});
