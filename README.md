# 2. Routing Dasar dan Penggunaan View
Menambahkan routing dasar Laravel untuk halaman utama, post, dan profil user. Menerapkan route yang mengembalikan string, route yang menampilkan view, serta route dengan parameter dan data user.

## File terkait
- `routes/web.php` - Mendefinisikan route `/`, `/post`, `/post/{id}`, dan `/me`, termasuk pengiriman parameter post serta data user ke view
- `resources/views/post/show.php` - Menampilkan halaman post berdasarkan id dari route
- `resources/views/user/index.php` - Menampilkan nama dan username user dari data yang dikirim route

## Reference
- Routing: https://laravel.com/docs/13.x/routing
- Views: https://laravel.com/docs/13.x/views
