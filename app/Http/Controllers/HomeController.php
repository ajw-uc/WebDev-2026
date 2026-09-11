<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    // Menampilkan halaman utama dengan daftar post
    public function index(): View
    {
        $posts = include app_path('../database/dummyposts.php');
        return view('home', ['posts' => $posts]);
    }
}

