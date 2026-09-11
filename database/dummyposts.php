
<?php

return [
    [
        'id' => 1,
        'author_id' => 1,
        'author_name' => 'Alya Putri',
        'author_image' => '/profile-avatar.svg',
        'author_username' => '@alyaputri',
        'time' => '2026-09-11 14:29:19',
        'content' => 'Hari ini akhirnya selesai bikin landing page pertama pakai Laravel! Ternyata yang paling seru itu melihat ide sederhana berubah jadi sesuatu yang bisa dipakai. Pelan-pelan, yang penting terus belajar 🌱',
        'likes' => 24,
        'comments' => [
            [
                'author_id' => 2,
                'author_name' => 'Raka Wijaya',
                'author_image' => '/profile-avatar.svg',
                'author_username' => '@rakawijaya',
                'time' => '2026-09-11 14:29:25',
                'content' => 'Keren! Selamat untuk landing page pertamanya. Semangat terus belajarnya!',
            ],
            [
                'author_id' => 3,
                'author_name' => 'Nadia Salsabila',
                'author_image' => '/profile-avatar.svg',
                'author_username' => '@nadiasalsabila',
                'time' => '2026-09-11 14:29:30',
                'content' => 'Setuju, mulai dari yang sederhana dulu. Ditunggu karya berikutnya 🌱',
            ],
        ],
    ],
    [
        'id' => 2,
        'author_id' => 2,
        'author_name' => 'Raka Wijaya',
        'author_image' => '/profile-avatar.svg',
        'author_username' => '@rakawijaya',
        'time' => '2026-09-11 14:29:25',
        'content' => 'Keren! Selamat untuk landing page pertamanya. Semangat terus belajarnya!',
        'likes' => 12,
        'comments' => [
            [
                'author_id' => 1,
                'author_name' => 'Alya Putri',
                'author_image' => '/profile-avatar.svg',
                'author_username' => '@alyaputri',
                'time' => '2026-09-11 14:29:30',
                'content' => 'Terima kasih! Senang bisa bantu dengan komentar ini 🌟',
            ],
            [
                'author_id' => 3,
                'author_name' => 'Nadia Salsabila',
                'author_image' => '/profile-avatar.svg',
                'author_username' => '@nadiasalsabila',
                'time' => '2026-09-11 14:29:35',
                'content' => 'Sama-sama, semangat terus belajarnya! 🌟',
            ],
        ],
    ],
    [
        'id' => 3,
        'author_id' => 3,
        'author_name' => 'Nadia Salsabila',
        'author_image' => '/profile-avatar.svg',
        'author_username' => '@nadiasalsabila',
        'time' => '2026-09-11 14:29:30',
        'content' => 'Setuju, mulai dari yang sederhana dulu. Ditunggu karya berikutnya 🌱',
        'initials' => 'NS',
        'likes' => 8,
        'comments' => [
            [
                'author_id' => 1,
                'author_name' => 'Alya Putri',
                'author_image' => '/profile-avatar.svg',
                'author_username' => '@alyaputri',
                'time' => '2026-09-11 14:29:33',
                'content' => 'Terima kasih! Senang bisa bantu dengan komentar ini 🌟',
            ],
        ],
    ],
];
