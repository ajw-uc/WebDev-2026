# Sesi 3.B. Layout dan Component
Memindahkan boilerplate HTML yang semula ada di setiap view ke layout template agar dapat digunakan kembali. Menambahkan Blade component untuk membuat tampilan card post yang konsisten di halaman home, detail post, dan profil user.

## File terkait
- `resources/views/layout/default.blade.php` - Layout utama berisi boilerplate HTML, navigasi, asset, dan section content
- `resources/views/components/post-card.blade.php` - Blade component untuk menampilkan card post dan data terkait
- `resources/views/home.blade.php` - Menggunakan layout dan memanggil component post-card untuk feed
- `resources/views/post/show.blade.php` - Menggunakan layout dan component post-card pada detail post
- `resources/views/post/form.blade.php` - Menggunakan layout untuk form post
- `resources/views/user/index.blade.php` - Menggunakan layout untuk halaman profil user
- `resources/views/user/show.blade.php` - Menggunakan layout dan component post-card untuk profil publik

## Referensi
- Layout: https://laravel.com/docs/13.x/blade#layouts-using-template-inheritance
- Components: https://laravel.com/docs/13.x/blade#components
