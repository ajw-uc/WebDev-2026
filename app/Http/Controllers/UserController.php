<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user = [
            'name' => 'John Doe',
            'username' => '@john.doe',
            'picture' => '/profile-avatar.svg',
            'caption' => 'A little space for your thoughts, moments, and everything in between.',
            'followers' => 0,
            'following' => 0,
            'posts' => [],
        ];

        return view('user.index', ['user' => $user]);
    }

    public function show(string $id): View
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
                'comments' => 2,
            ],
            [
                'id' => 2,
                'author_id' => 2,
                'author' => 'Raka Wijaya',
                'picture' => '/profile-avatar.svg',
                'username' => '@rakawijaya',
                'time' => '10 menit lalu',
                'content' => 'Keren! Selamat untuk landing page pertamanya. Semangat terus belajarnya!',
                'likes' => 12,
                'comments' => 2,
            ],
            [
                'id' => 3,
                'author_id' => 3,
                'author' => 'Nadia Salsabila',
                'picture' => '/profile-avatar.svg',
                'username' => '@nadiasalsabila',
                'time' => '5 menit lalu',
                'content' => 'Setuju, mulai dari yang sederhana dulu. Ditunggu karya berikutnya 🌱',
                'likes' => 8,
                'comments' => 1,
            ],
        ];

        $authors = [
            1 => ['name' => 'Alya Putri', 'picture' => '/profile-avatar.svg', 'username' => '@alyaputri', 'initials' => 'AP'],
            2 => ['name' => 'Raka Wijaya', 'picture' => '/profile-avatar.svg', 'username' => '@rakawijaya', 'initials' => 'RW'],
            3 => ['name' => 'Nadia Salsabila', 'picture' => '/profile-avatar.svg', 'username' => '@nadiasalsabila', 'initials' => 'NS'],
        ];

        abort_unless(isset($authors[$id]), 404);

        $user = [
            ...$authors[$id],
            'caption' => 'A little space for your thoughts, moments, and everything in between.',
            'followers' => 0,
            'following' => 0,
            'posts' => array_filter($posts, fn (array $post): bool => (string) $post['author_id'] === $id),
        ];

        return view('user.show', ['user' => $user]);
    }

    public function edit(): View
    {
        return view('user.edit');
    }

    public function update(Request $request): RedirectResponse
    {
        return redirect()->route('user.index');
    }
}
