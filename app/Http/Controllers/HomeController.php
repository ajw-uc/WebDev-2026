<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    // Menampilkan halaman utama dengan daftar post
    public function index(): View
    {
        $posts = Post::limit(10)->latest()->get();
        return view('home', ['posts' => $posts]);
    }
}

