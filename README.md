# Sesi 3.B. Layout dan Component
Boilerplate html yang semula ada di semua view, akan dipindahkan ke layout template agar tidak perlu ditulis berulang-ulang. Untuk membuat design post yang konsisten, Blade component akan digunakan.

## File terkait
- `resources/views/layout/default.blade.php` - pindah boilerplate ke layout
- `resources/views/components/post-card.blade.php` - komponen untuk menampilkan card post
- `resources/views/home.blade.php` - menggunakan layout dan memanggil komponen post-card
- `resources/views/post/show.blade.php` - menggunakan layout dan memanggil komponen post-card
- `resources/views/post/form.blade.php` - menggunakan layout
- `resources/views/user/index.blade.php` - menggunakan layout
- `resources/views/user/show.blade.php` - menggunakan layout dan memanggil komponen post-card

## Reference
- Layout: https://laravel.com/framework/docs/13.x/blade#layouts-using-template-inheritance
- Components: https://laravel.com/framework/docs/13.x/blade#components