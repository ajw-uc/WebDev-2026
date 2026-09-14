# Sesi 2.B. Controller
Sesi ini mempelajari cara membuat controller di Laravel dan menghubungkannya dengan route dan view, memberi nama route, dan melakukan pengelompokan route berdasarkan prefix URL dan controller.

## Membuat controller
```
php artisan make:controller HomeController
php artisan make:controller PostController
php artisan make:controller UserController
```

## File terkait
- `routes/web.php` - mengubah format route dan mendefinisikan route baru
- `app/Http/Controllers/HomeController.php` - controller untuk halaman home
- `app/Http/Controllers/PostController.php` - controller untuk halaman post
- `app/Http/Controllers/UserController.php` - controller untuk halaman user
- `resources/views/post/show.php` - halaman post satuan
- `resources/views/post/form.php` - form untuk menambahkan dan mengubah post
- `resources/views/user/index.php` - halaman profil user saat ini
- `resources/views/user/show.php` - halaman profil user lain
- `database/dummyusers.php` - data dummy untuk user
- `database/dummyposts.php` - data dummy untuk post
