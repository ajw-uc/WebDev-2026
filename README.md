# 8. Redesign
Melakukan redesign UI/UX Mini Social dengan tetap menggunakan Bootstrap sebagai dasar layout. Tampilan dibuat lebih modern, konsisten, dan responsif melalui custom CSS, struktur halaman yang lebih jelas, serta komponen profil, post, komentar, navigasi, dan notifikasi yang diperbarui.

## File terkait
- `app/Http/Controllers/UserController.php` - menyediakan data post pada profil user saat ini
- `database/dummyusers.php` - menambahkan jumlah followers dan following pada setiap user
- `public/css/style.css` - menambahkan custom styling untuk layout, navigasi, card, feed, profil, form, komentar, dan responsive breakpoint
- `resources/views/layout/default.blade.php` - memperbarui brand, navbar, ikon notifikasi, avatar profil, dan container halaman
- `resources/views/home.blade.php` - memperbarui intro, composer post, feed, dan empty state
- `resources/views/components/post-card.blade.php` - memperbarui struktur card, metadata, aksi post, dan preview image
- `resources/views/components/post-comment.blade.php` - memperbarui tampilan komentar dan metadata author
- `resources/views/post/show.blade.php` - memperbarui detail post, header, komentar, dan form komentar
- `resources/views/post/form.blade.php` - memperbarui form create/edit post dengan layout dan field yang konsisten
- `resources/views/user/edit.blade.php` - memperbarui form edit profil dan preview avatar
- `resources/views/user/index.blade.php` - memperbarui profil user, statistik, daftar post, dan empty state
- `resources/views/user/show.blade.php` - memperbarui profil publik, statistik, daftar post, dan empty state

## Referensi
- Bootstrap: https://getbootstrap.com/docs/5.3/getting-started/introduction/
- CSS media queries: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_media_queries/Using_media_queries
