# Sesi 10 Authentication & Profile
Menambahkan autentikasi pengguna lengkap berupa login, signup, logout, dan remember me. Akses ke fitur yang membutuhkan akun dibatasi dengan middleware `auth`, sedangkan halaman login dan signup hanya tersedia untuk guest. Profil user kini menggunakan data database dan mendukung edit profil, upload foto, change password, serta daftar post milik user.

## File terkait
- `app/Http/Controllers/AuthController.php` - Menangani tampilan dan proses login, signup, logout, validasi credentials, regenerasi session, dan remember me
- `app/Http/Controllers/PostController.php` - Membatasi create, update, delete post, serta komentar agar hanya dapat dilakukan user login
- `app/Http/Controllers/UserController.php` - Mengambil profil/post user yang sedang login, update data profil, upload foto, dan update password
- `public/css/style.css` - Menambahkan style halaman auth, profil, guest placeholder, avatar, form, dan navigation state
- `resources/views/auth/login.blade.php` - Form login dengan email, password, remember me, dan link signup
- `resources/views/auth/signup.blade.php` - Form registrasi name, username, email, password, dan konfirmasi password
- `resources/views/components/post-card.blade.php` - Menampilkan avatar user yang login dari storage jika tersedia
- `resources/views/components/post-comment.blade.php` - Menyesuaikan tampilan komentar dan status akses user
- `resources/views/home.blade.php` - Menampilkan composer post untuk user login dan CTA login/signup untuk guest
- `resources/views/layout/default.blade.php` - Menyesuaikan navigasi, avatar user login, serta tombol login/signup untuk guest
- `resources/views/post/show.blade.php` - Menampilkan form komentar untuk user login atau CTA login/signup untuk guest
- `resources/views/user/index.blade.php` - Menampilkan profil user dari database, post terpaginasikan, menu edit/password/logout
- `resources/views/user/show.blade.php` - Menampilkan profil publik dan foto profil dari storage
- `resources/views/user/edit.blade.php` - Form edit profil dengan data lama dan upload foto
- `resources/views/user/password.blade.php` - Form verifikasi password lama dan update password baru
- `routes/web.php` - Menambahkan route login/signup/logout serta group middleware `auth` dan `guest`

## Referensi
- Authentication: https://laravel.com/docs/13.x/authentication
- Middleware: https://laravel.com/docs/13.x/middleware
- Validation: https://laravel.com/docs/13.x/validation
- Hashing password: https://laravel.com/docs/13.x/hashing
- Upload file: https://laravel.com/docs/13.x/filesystem#file-uploads
- Delete file: https://laravel.com/docs/13.x/filesystem#file-deletion
- Pagination: https://laravel.com/docs/13.x/pagination
- Session: https://laravel.com/docs/13.x/session
