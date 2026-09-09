<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    return 'Ini halaman post';
});

Route::get('/post/{id}', function ($id) {
    return view('post.show', ['id' => $id]);
});

Route::get('/me', function () {
    $user = [
        'name' => 'John Doe',
        'username' => '@john.doe'
    ];

    return view('user.index', [
        'user' => $user
    ]);
});
