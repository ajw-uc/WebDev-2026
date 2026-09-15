# Sesi 7.B. Pagination
Menambahkan pagination pada daftar post agar data ditampilkan secara bertahap dalam beberapa halaman. Pagination diterapkan pada feed home dan halaman daftar post, menggunakan tampilan Bootstrap 5 serta custom styling agar sesuai dengan desain aplikasi.

## File terkait
- `app/Providers/AppServiceProvider.php` - Mengaktifkan renderer pagination Bootstrap 5 melalui `Paginator::useBootstrapFive()`
- `app/Http/Controllers/HomeController.php` - Mengambil post terbaru menggunakan `paginate(10)` dan mengatur path pagination ke route post
- `app/Http/Controllers/PostController.php` - Menambahkan method `index()` untuk menampilkan daftar post terpisah dengan pagination
- `public/css/style.css` - Menambahkan styling custom untuk link, state active, disabled, hover, dan focus pagination
- `resources/views/home.blade.php` - Menampilkan link pagination pada feed home
- `resources/views/post/index.blade.php` - Halaman daftar post terbaru dengan card post dan link pagination

## Referensi
- Pagination: https://laravel.com/docs/13.x/pagination
- Bootstrap Pagination: https://getbootstrap.com/docs/5.3/components/pagination/
