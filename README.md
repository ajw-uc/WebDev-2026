# Sesi 3.A. Blade Template
Berikut ini adalah aktivitas yang dilakukan pada bagian ini:
- Mengubah view dari sesi sebelumnya menjadi Blade template dengan extension `.blade.php`.
- Menggunakan Blade directive seperti `@foreach` dan ekspresi `{{ }}` untuk menampilkan data secara lebih ringkas dan aman.
- Menggunakan helper `asset()` untuk memuat stylesheet dan gambar dari folder `public`.
- Menambahkan stylesheet dan avatar default untuk memperbarui tampilan halaman home, post, dan profil user.

## File terkait
- `public/css/style.css` - Stylesheet untuk halaman aplikasi
- `public/images/profile-avatar.svg` - Avatar default untuk profil dan post
- `resources/views/home.blade.php` - Halaman home dengan loop post, route link, dan asset Blade
- `resources/views/post/form.blade.php` - Form pembuatan post dengan syntax Blade
- `resources/views/post/show.blade.php` - Detail post dan daftar komentar dengan `@foreach`
- `resources/views/user/index.blade.php` - Profil user saat ini dengan data Blade
- `resources/views/user/show.blade.php` - Profil user lain beserta daftar postnya

## Referensi
- Blade Template: https://laravel.com/docs/13.x/blade
- Asset URL: https://laravel.com/docs/13.x/helpers#method-asset
