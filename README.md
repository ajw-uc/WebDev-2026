# Sesi 11 Authorization dengan Policy & Gate
Menambahkan authorization berbasis kepemilikan resource. Hanya user yang membuat post yang dapat mengedit atau menghapus post tersebut, dan hanya user yang membuat komentar yang dapat menghapus komentarnya. Pemeriksaan dilakukan di server melalui Policy dan Gate, sedangkan tombol serta modal aksi pada Blade hanya ditampilkan kepada user yang memiliki izin.

## Policy dan Gate
- **Policy** adalah class yang berisi aturan authorization untuk model tertentu. `PostPolicy` memeriksa apakah user adalah pemilik post untuk aksi `update` dan `delete`, sedangkan `CommentPolicy` memeriksa kepemilikan komentar untuk aksi `delete`.
- **Gate** adalah mekanisme Laravel untuk menjalankan pemeriksaan authorization. Pada project ini, Policy didaftarkan melalui `Gate::policy()`, dipanggil di controller dengan `Gate::authorize()`, dan digunakan di Blade dengan `@can` serta `@canany`.
- Pengecekan di Blade hanya mengatur tampilan UI. Pengecekan `Gate::authorize()` di controller tetap diperlukan agar request langsung ke endpoint tidak dapat melewati aturan kepemilikan.

## File terkait
- `app/Http/Controllers/AuthController.php` - Menangani tampilan dan proses login, signup, logout, validasi credentials, regenerasi session, dan remember me
- `app/Http/Controllers/PostController.php` - Membatasi create, update, delete post, serta komentar agar hanya dapat dilakukan user login
- `app/Policies/PostPolicy.php` - Memastikan hanya pemilik post yang dapat melakukan update dan delete
- `app/Policies/CommentPolicy.php` - Memastikan hanya pemilik komentar yang dapat melakukan delete
- `app/Providers/AppServiceProvider.php` - Mendaftarkan Policy secara eksplisit ke model melalui Gate
- `app/Http/Controllers/UserController.php` - Mengambil profil/post user yang sedang login, update data profil, upload foto, dan update password
- `public/css/style.css` - Menambahkan style halaman auth, profil, guest placeholder, avatar, form, dan navigation state
- `resources/views/auth/login.blade.php` - Form login dengan email, password, remember me, dan link signup
- `resources/views/auth/signup.blade.php` - Form registrasi name, username, email, password, dan konfirmasi password
- `resources/views/components/post-card.blade.php` - Menampilkan avatar user yang login dari storage jika tersedia
- `resources/views/components/post-comment.blade.php` - Menyesuaikan tampilan komentar dan menampilkan tombol/modal delete hanya kepada pemilik komentar
- `resources/views/home.blade.php` - Menampilkan composer post untuk user login dan CTA login/signup untuk guest
- `resources/views/layout/default.blade.php` - Menyesuaikan navigasi, avatar user login, serta tombol login/signup untuk guest
- `resources/views/post/show.blade.php` - Menampilkan form komentar untuk user login atau CTA login/signup untuk guest, serta tombol/modal edit/delete hanya kepada pemilik post
- `resources/views/user/index.blade.php` - Menampilkan profil user dari database, post terpaginasikan, menu edit/password/logout
- `resources/views/user/show.blade.php` - Menampilkan profil publik dan foto profil dari storage
- `resources/views/user/edit.blade.php` - Form edit profil dengan data lama dan upload foto
- `resources/views/user/password.blade.php` - Form verifikasi password lama dan update password baru
- `routes/web.php` - Menambahkan route login/signup/logout serta group middleware `auth` dan `guest`

## Referensi
- Authorization: https://laravel.com/docs/13.x/authorization
- Gates: https://laravel.com/docs/13.x/authorization#gates
- Policies: https://laravel.com/docs/13.x/authorization#creating-policies
