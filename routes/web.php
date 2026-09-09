<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    return 'Ini halaman post';
});

Route::get('/user', function () {
    return 'Ini halaman user';
});
