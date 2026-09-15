<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'following' => 0,
        ];

        return view('user.index', ['user' => $user, 'posts' => []]);
    }

    // Menampilkan profil pengguna berdasarkan ID
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->latest()->paginate(10);

        return view('user.show', ['user' => $user, 'posts' => $posts]);
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
