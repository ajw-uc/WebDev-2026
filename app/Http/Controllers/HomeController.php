<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
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

        return view('home', ['posts' => $posts]);
    }
}
