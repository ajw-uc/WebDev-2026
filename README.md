# Sesi 10 Authentication & Profile
Menambahkan fitur login, signup, logout, change password, dan edit profile. Menerapkan authorization sederhana dengan middleware auth dan guest untuk membatasi akses berdasarkan status login. Menampilkan data profil dan post sesuai data user di database, termasuk upload foto profil.

## File terkait
- `app/Http/Controllers/AuthController.php` - Proses login, signup, dan logout
- `app/Http/Controllers/PostController.php` - Membatasi aksi post dan komentar untuk user yang sudah login
- `app/Http/Controllers/UserController.php` - Mengambil data profil dari database, update profil, upload foto, dan change password
- `public/css/style.css` - Tambah style untuk halaman authentication, profil, guest placeholder, dan image
- `resources/views/auth/login.blade.php` - Halaman login
- `resources/views/auth/signup.blade.php` - Halaman signup
- `resources/views/components/post-card.blade.php` - Menampilkan gambar dan popup preview
- `resources/views/components/post-comment.blade.php` - Menyesuaikan tampilan komentar berdasarkan user
- `resources/views/home.blade.php` - Menampilkan form post untuk user login dan CTA login/signup untuk guest
- `resources/views/layout/default.blade.php` - Menyesuaikan navigasi, avatar user, dan menu authentication
- `resources/views/post/show.blade.php` - Membatasi form komentar dan menampilkan CTA untuk guest
- `resources/views/user/index.blade.php` - Menampilkan profil user, post, menu pengaturan, dan pagination
- `resources/views/user/show.blade.php` - Menampilkan data profil publik dari database
- `resources/views/user/edit.blade.php` - Form edit profil dengan upload foto
- `resources/views/user/password.blade.php` - Form change password
- `routes/web.php` - Menambahkan route authentication dan middleware authorization

## Referensi
- Authentication: https://laravel.com/docs/13.x/authentication
- Middleware: https://laravel.com/docs/13.x/middleware
- Validation: https://laravel.com/docs/13.x/validation
- Hashing password: https://laravel.com/docs/13.x/hashing
- Upload file: https://laravel.com/docs/13.x/filesystem#file-uploads
- Delete file: https://laravel.com/docs/13.x/filesystem#file-deletion
- Pagination: https://laravel.com/docs/13.x/pagination
