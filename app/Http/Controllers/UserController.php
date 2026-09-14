<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    // Menampilkan halaman profil pengguna
    public function index(): View
    {
        $user = [
            'name' => 'John Doe',
            'username' => '@john.doe',
            'picture' => '/profile-avatar.svg',
            'caption' => 'A little space for your thoughts, moments, and everything in between.',
            'followers' => 0,
            'following' => 0
        ];

        return view('user.index', ['user' => $user, 'posts' => []]);
    }

    // Menampilkan profil pengguna berdasarkan ID
    public function show(string $id): View
    {
        $posts = include app_path('../database/dummyposts.php');
        $users = include app_path('../database/dummyusers.php');

        $users = array_filter($users, fn (array $user): bool => (string) $user['id'] === $id);
        $user = array_pop($users);

        // Check if user exists
        if (!isset($user)) {
            abort(404);
        }

        $userPosts = array_filter($posts, fn (array $post): bool => (string) $post['author_id'] === $id);

        return view('user.show', ['user' => $user, 'posts' => $userPosts]);
    }

    // Menampilkan form untuk mengedit profil
    public function edit(): View
    {
        return view('user.edit');
    }

    // Memperbarui profil pengguna
    public function update(Request $request): RedirectResponse
    {
        return redirect()->route('user.index');
    }
}

