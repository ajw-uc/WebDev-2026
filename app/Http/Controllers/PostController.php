<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    // Menampilkan form untuk membuat post baru
    public function create(): View
    {
        return view('post.form');
    }

    // Menyimpan post baru
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255'
        ]);
        $post = Post::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $validated['content']
        ]);
        return redirect()->route('post.show', ['id' => $post->id]);
    }

    // Menampilkan detail post
    public function show(Request $request, string $id): View
    {
        $post = Post::findOrFail($id);
        
        return view('post.show', ['post' => $post]);
    }

    // Menyimpan komentar pada post
    public function storeComment(Request $request, string $id): RedirectResponse
    {
        return redirect()->route('post.show', $id);
    }

    // Menampilkan form untuk mengedit post
    public function edit(string $id): View
    {
        return view('post.edit', ['id' => $id]);
    }

    // Mengubah post
    public function update(Request $request, string $id): RedirectResponse
    {
        return redirect()->route('post.index');
    }

    // Menghapus post
    public function destroy(string $id): RedirectResponse
    {
        return redirect()->route('post.index');
    }
}
