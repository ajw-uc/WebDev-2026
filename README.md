# 3. Controller
Menambahkan controller untuk halaman home, post, dan profil user, lalu menghubungkannya dengan route dan view. Route diberi nama serta dikelompokkan berdasarkan prefix URL dan controller. Menambahkan data dummy user dan post untuk menampilkan feed, detail post, komentar, serta profil pengguna.

## Membuat controller
```
php artisan make:controller HomeController
php artisan make:controller PostController
php artisan make:controller UserController
```

## File terkait
- `routes/web.php` - Menghubungkan route dengan controller, memberi nama route, serta mengelompokkan route post dengan prefix dan controller
- `app/Http/Controllers/HomeController.php` - Mengambil data post dan menampilkan halaman home
- `app/Http/Controllers/PostController.php` - Menangani halaman list, create, detail, edit, update, delete post, dan komentar
- `app/Http/Controllers/UserController.php` - Menampilkan profil user saat ini dan profil user berdasarkan id
- `resources/views/home.php` - Halaman home dengan daftar post
- `resources/views/post/form.php` - Form untuk membuat post
- `resources/views/post/show.php` - Halaman detail post dan komentar
- `resources/views/user/index.php` - Halaman profil user saat ini
- `resources/views/user/show.php` - Halaman profil user lain beserta postnya
- `database/dummyusers.php` - Data dummy untuk user
- `database/dummyposts.php` - Data dummy untuk post dan komentar

## Referensi
- Controller: https://laravel.com/docs/13.x/controllers
- Routing: https://laravel.com/docs/13.x/routing
- Views: https://laravel.com/docs/13.x/views
