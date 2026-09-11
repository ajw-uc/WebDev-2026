<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('me');
    }

    public function create(): View
    {
        return view('post.form');
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('post.index');
    }

    public function show(Request $request, string $id): View
    {
        $posts = [
            [
                'id' => 1,
                'author_id' => 1,
                'author' => 'Alya Putri',
                'picture' => '/profile-avatar.svg',
                'username' => '@alyaputri',
                'time' => '15 menit lalu',
                'content' => 'Hari ini akhirnya selesai bikin landing page pertama pakai Laravel! Ternyata yang paling seru itu melihat ide sederhana berubah jadi sesuatu yang bisa dipakai. Pelan-pelan, yang penting terus belajar 🌱',
                'likes' => 24,
                'comments' => [
                    [
                        'author_id' => 2,
                        'author' => 'Raka Wijaya',
                        'picture' => '/profile-avatar.svg',
                        'initials' => 'RW',
                        'time' => '10 menit lalu',
                        'content' => 'Keren! Selamat untuk landing page pertamanya. Semangat terus belajarnya!',
                    ],
                    [
                        'author_id' => 3,
                        'author' => 'Nadia Salsabila',
                        'picture' => '/profile-avatar.svg',
                        'initials' => 'NS',
                        'time' => '5 menit lalu',
                        'content' => 'Setuju, mulai dari yang sederhana dulu. Ditunggu karya berikutnya 🌱',
                    ],
                ],
            ],
            [
                'id' => 2,
                'author_id' => 2,
                'author' => 'Raka Wijaya',
                'picture' => '/profile-avatar.svg',
                'username' => '@rakawijaya',
                'time' => '10 menit lalu',
                'content' => 'Keren! Selamat untuk landing page pertamanya. Semangat terus belajarnya!',
                'initials' => 'RW',
                'likes' => 12,
                'comments' => [
                    [
                        'author_id' => 1,
                        'author' => 'Alya Putri',
                        'picture' => '/profile-avatar.svg',
                        'initials' => 'AP',
                        'time' => '5 menit lalu',
                        'content' => 'Terima kasih! Senang bisa bantu dengan komentar ini 🌟',
                    ],
                    [
                        'author_id' => 3,
                        'author' => 'Nadia Salsabila',
                        'picture' => '/profile-avatar.svg',
                        'initials' => 'NS',
                        'time' => '3 menit lalu',
                        'content' => 'Sama-sama, semangat terus belajarnya! 🌟',
                    ],
                ],
            ],
            [
                'id' => 3,
                'author_id' => 3,
                'author' => 'Nadia Salsabila',
                'picture' => '/profile-avatar.svg',
                'username' => '@nadiasalsabila',
                'time' => '5 menit lalu',
                'content' => 'Setuju, mulai dari yang sederhana dulu. Ditunggu karya berikutnya 🌱',
                'initials' => 'NS',
                'likes' => 8,
                'comments' => [
                    [
                        'author_id' => 1,
                        'author' => 'Alya Putri',
                        'picture' => '/profile-avatar.svg',
                        'initials' => 'AP',
                        'time' => '3 menit lalu',
                        'content' => 'Terima kasih! Senang bisa bantu dengan komentar ini 🌟',
                    ],
                ],
            ],
        ];

        $posts = array_filter($posts, fn (array $post): bool => (string) $post['id'] === $id);
        $post = array_pop($posts);
        abort_if($post === null, 404);

        return view('post.show', ['post' => $post]);
    }

    public function storeComment(Request $request, string $id): RedirectResponse
    {
        return redirect()->route('post.show', $id);
    }

    public function edit(string $id): View
    {
        return view('post.edit', ['id' => $id]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        return redirect()->route('post.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        return redirect()->route('post.index');
    }
}
